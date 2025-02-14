<?php
ob_start();
session_start();

include "../model/sanpham.php";
include "../model/danhmuc.php";
include "../model/taikhoan.php";
include "../model/cart.php";
include "../model/donhang.php";
include "../model/binhluan.php";

include "header.php";
// include "chitietsp.php";
include "../global.php";
if (!isset($_SESSION['mycart'])) $_SESSION['mycart'] = [];
$listsp = loadall_sp();
$listdm = loadall_dm();
if (isset($_GET['act']) && ($_GET['act'] != "")) {
    $act = $_GET['act'];
    switch ($act) {
        case "home":
            if (isset($_POST['keyword']) &&  $_POST['keyword'] != 0) {
                $kyw = $_POST['keyword'];
            } else {
                $kyw = "";
            }
            if (isset($_GET['iddm']) && ($_GET['iddm'] > 0)) {
                $iddm = $_GET['iddm'];
            } else {
                $iddm = 0;
            }
            $listsp = loadall_sp($kyw, $iddm);
            $name = load_tendm($iddm);
            include "home.php";
            break;

        case 'chitietsp':
            if (isset($_GET['idsp']) && ($_GET['idsp'] > 0)) {
                $id = $_GET['idsp'];
                $onesp = loadone_sp($id);
                 $sp_cungloai = loadone_spcl($id, $onesp['iddm']);
                 include "chitietsp.php";
            } else {
                include "home.php";
            }
            break;
        case 'dangky':
            $erroruser= $erroremail = $errorpass = $errortel = ""; 
                if(isset($_POST['dangky'])){
                    $countError = 0;
                    if (strlen($_POST['email']) === 0) { 
                        $erroremail = "email không được để trống";
                        $countError += 1;
                    }
                    if (strlen($_POST['user']) <3) {
                        $erroruser = "user không được it hon 3";
                        $countError += 1;
                    }
                    if ($_POST['pass'] <=6) { 
                        $errorpass = "pass không được ít hơn 6";
                        $countError += 1;
                    }
                    if (strlen($_POST['tel']) >11) { 
                        $errortel = "số điện thoại không đúng";
                        $countError += 1;
                    }
                    if ($countError === 0) {
                    $user = $_POST['user'];
                    $pass = $_POST['pass'];
                    $email = $_POST['email'];
                    $tel = $_POST['tel'];
                    $address = $_POST['address'];
                    insert_taikhoan($user, $pass, $email,$tel, $address);
                    $thongbao = "Đã đăng ký thành công. Vui lòng đăng nhập.";
                    }
                }
            include "taikhoan/dangky.php";
            break;
            case 'login':
                if (isset($_POST['dangnhap'])){
                    $email=$_POST['email'];
                    $pass=$_POST['pass'];
                    $checkuser=checkuser($email,$pass);
                    if (is_array($checkuser)) {
                        $_SESSION['email']=$checkuser;//CLICK ĐNHAP TỪ BL.
                        if (   $_SESSION['trang']=="chitietsp") {
                            header('location:index.php?act=chitietsp&idsp='.$_SESSION['idpro'].'#binhluan');
                        }else 
                        if ( $_SESSION['giohang']="giohang") {
                            header('location:index.php?act=addtocart'); 
                            
                        }else
                        header('Location: index.php');
                    }else {
                        $thongbao="Tài khoản không tồn tại. Vui lòng kiểm tra hoặc đăng ký.";
                    }
                   
                }
               include "login.php";
               break;
            case 'info':
               if (isset($_POST['capnhat'])&&($_POST['capnhat'])){
                   $user=$_POST['user'];
                   $email=$_POST['email'];
                   $address=$_POST['address'];
                   $tel=$_POST['tel'];
                   $id=$_POST['id'];
                   update_taikhoan($id,$user,$email,$address,$tel);
                   $_SESSION['email']=checkuser($email,$pass); 
                   header('Location: index.php');
               }
                include "taikhoan/info.php";
                break;
             case 'quenmk':
                if (isset($_POST['guiemail'])&&($_POST['guiemail'])){
                    $email=$_POST['email'];
                    $sendMailMess=sendMail($email);
                    if(is_array($checkemail)){
                        $thongbao="Mật khẩu của bạn là: ".$checkemail['pass'];
                    }else{
                        $thongbao="Email này không tồn tại";
                    }
                }
                 include "taikhoan/quenmk.php";
                 break;
        case 'about':
            include "about-us.php";
            break;
        case 'contact':
            include "contact.php";
            break;
        case 'dangxuat':
            session_unset();
            header('Location: index.php?act=home');
            break;
            case "addtocart":
                if (isset($_POST['addtocart']) && ($_POST['addtocart'])) {
                    $id = $_POST['id'];
                    $name = $_POST['name'];
                    $img = $_POST['img'];
                    $price = $_POST['price'];
                    $soluong = 1;
                    $ttien = $price * $soluong;
            
                    // Kiểm tra sản phẩm đã có trong giỏ hàng chưa
                    $index = array_search($id, array_column($_SESSION['mycart'], 0));
            
                    if ($index !== false) {
                        // Nếu đã tồn tại, tăng số lượng
                        $_SESSION['mycart'][$index][4] += 1;
                        $_SESSION['mycart'][$index][5] = $_SESSION['mycart'][$index][4] * $price;
                    } else {
                        // Nếu chưa có, thêm sản phẩm mới
                        $_SESSION['mycart'][] = [$id, $name, $img, $price, $soluong, $ttien];
                    }
                }
                include "cart/viewcart.php";
                break;
            
            case "delcart": 
                    if(isset($_GET['idcart'])){
                        array_splice($_SESSION['mycart'],$_GET['idcart'],1);
                    }else{
                        $_SESSION['mycart']=[];
                    }
                    include "cart/viewcart.php";
                    // header('Location: index.php?act=addtocart');
                    break;
                    case "bill":
                        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                            $productId = $_POST['id'];
                            $soluongmoi = $_POST['soluong'];
                    
                            if (!empty($_SESSION['mycart'])) {
                                // Tìm vị trí sản phẩm trong giỏ hàng
                                $index = array_search($productId, array_column($_SESSION['mycart'], 0));
                    
                                if ($index !== false) {
                                    // Cập nhật số lượng & tổng tiền
                                    $_SESSION['mycart'][$index][4] = $soluongmoi;
                                    $_SESSION['mycart'][$index][5] = $_SESSION['mycart'][$index][4] * $_SESSION['mycart'][$index][3];
                                } else {
                                    echo 'Sản phẩm không tồn tại trong giỏ hàng';
                                }
                            }
                        } else {
                            echo 'Yêu cầu không hợp lệ';
                        }
                    
                        include "thanhtoan.php";
                        break;
                    
                        case "billconfirm":
                            if (isset($_POST['dong']) && ($_POST['dong'])) {
                                $iduser = $_SESSION['email']['id'];
                                $name = $_POST['user'];
                                $email = $_POST['email'];
                                $address = $_POST['address'];
                                $tel = $_POST['tel'];
                                $ngaydathang = date('Y-m-d H:i:s');
                                $tongdonhang = tongdonhang();
                                $pttt = $_POST['pttt'];
                        
                                // Thêm đơn hàng vào bảng bill
                                $idbill = insert_bill($iduser, $name, $email, $address, $tel, $ngaydathang, $tongdonhang, $pttt);
                                $sendMaildh = sendMaildonhang($email);
                        
                                // Chèn nhiều sản phẩm vào bảng cart bằng một câu lệnh SQL duy nhất
                                if (!empty($_SESSION['mycart'])) {
                                    $sql_cart = "INSERT INTO cart (iduser, idpro, img, name, price, soluong, thanhtien, idbill) VALUES ";
                                    $values = [];
                        
                                    foreach ($_SESSION['mycart'] as $cart) {
                                        $values[] = "('$iduser', '{$cart[0]}', '{$cart[2]}', '{$cart[1]}', '{$cart[3]}', '{$cart[4]}', '{$cart[5]}', '$idbill')";
                                    }
                        
                                    $sql_cart .= implode(',', $values);
                                    pdo_execute($sql_cart);
                                }
                        
                                // // Xóa giỏ hàng sau khi thanh toán
                                // unset($_SESSION['mycart']);
                            }
                        
                            $bill = loadone_bill($idbill);
                            include "cart/billconfirm.php";
                            break;
                        
            case "billol":
                

                if(isset($_GET['partnerCode'])&&($_GET['partnerCode'])){
                    
                    $partnerCode =$_GET['partnerCode'];
                    $requestId = $_GET['requestId'];
                    $amount =$_GET['amount'];
                    $orderId=$_GET['orderId'];
                    $orderInfo = $_GET['orderInfo'];
                    $requestType = $_GET['requestType'];
                    $signature =$_GET['signature'];

                        $momo= insert_momo($partnerCode,$requestId,$amount,$orderId,$orderInfo,$requestType,$signature);
                      
                       
                    }
                    include "thanhtoan.php";
                    break; 
             
            case "mybill";
                if(isset($_POST['huy'])&& ($_POST['huy'])){
                    $id=$_POST['id'];
                    huy($id); 
                }
                    $dsbill=loadall_dh($_SESSION['email']['id']);
                    include "cart/mybill.php";
                    break;   
        }
            
         }else{
            include "home.php";
        } 
            include "footer.php";

            ob_end_flush(); 
    ?>
