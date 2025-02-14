<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EKO EATS</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
        integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.css" />
    <link rel="icon" href="../asset/img/logo.png">
    <!-- Bootstrap CSS  -->
    <link rel="stylesheet" href="../bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="../app.css" type="text/css">
    <!--  -->
    <link rel="stylesheet" href="../asset/css/style.css">
    <link rel="stylesheet" href="../asset/css/login.css">
 
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <style>
        
.main-menu{
    margin-top: 100px;
}
.option-menu ul{
    display: flex;
    justify-content: space-between;
    padding: 15px;
    border-bottom: 1px solid #d8d6d6;
    margin-bottom: 30px;
}


.container{
    width: 1200px;
}
.menu-sale{
    display: grid;
    grid-template-columns: 1fr 1fr 1fr 1fr;
    column-gap: 30px;
    row-gap: 40px;
    margin-top: 30px;
}
.new-menu,.combo-alone,.combo-chicken ,.combo-team,.combo-drink {
    margin-top: 50px;
}
.combo-drink{
    margin-bottom: 100px;
}
.item-menu{
    padding: 10px;
    border-radius: 10px;
    box-shadow: 0 0 10px rgb(170, 170, 170);
    text-align: center;
    overflow: hidden;
}
.item-menu img{
    transition: .2s linear;
    width: 100%;
}
.item-menu:hover img{
    transform: scale(1.1);
    transition: .2s linear;
}
.item-menu :nth-child(2){
    color: #000;
    font-weight: bold;
    margin-top: 20px;
}
.item-menu :nth-child(3){
    font-weight: bold;
}
.item-menu :nth-child(3) del{
    color: #969696;
    margin:0 15px ;
}
.item-menu :nth-child(4){
    margin-top: 10px;
    font-size: 13px;
}
.item-menu button{
    width: 80%;
    padding: 15px;
    margin: 30px 0 20px;
    border: none;
    background-color: #cccccc;
    color: #fff;
    border-radius: 20px;
    box-shadow: 0 2px 5px  rgb(88, 88, 88);
}
    </style>
    <title>Document</title>
</head>
<body>
    <!-- Start header -->
    <div class="header">
        <div class="header-left">
            <ul>
                <li><a href="index.php">
                        <img width="100%"
                            src="../asset/img/logo.png" alt="">
                    </a>
                </li>
                <li><a href="index.php?act=home">THỰC ĐƠN</a></li>
                <li><a href="index.php?act=about">VỀ CHÚNG TÔI</a></li>
                <li><a href="index.php?act=contact">LIÊN HỆ CHÚNG TÔI</a></li>
            </ul>
        </div>
        <div class="header-right">
            <ul>
            <?php 
            if (isset($_SESSION['email'])) {
                extract($_SESSION['email']);
        ?>
            <li class="user"><?=$user?></li>   
            <li class="form_li"><a href="index.php?act=info">Thông tin tài khoản</a></li>
            <li class="form_li"><a href="index.php?act=dangxuat">Thoát</a></li>
            <li class="form_li"><a href="index.php?act=mybill">Đơn hàng của tôi</a></li>
            <li><a href="index.php?act=addtocart"><i class="fa-solid fa-cart-shopping fa-lg"></i></a></li>
            <br>    
        <?php }else { ?>
                <li><a href="index.php?act=login"><i class="fa-solid fa-user icon fa-lg"></i></a></li>
                
            <?php } ?>
            </ul>
        </div>
    </div>
    <!-- End header -->

    <style>
        .user{
            font-weight: 300;
            font-size: 25px;
        }
    </style>
<main role="main" class="container">
    
    <!-- End block content -->
    <form action="../model/congthanhtoan.php" method="post">
            <input type="hidden" name="total" value="<?=$tong?>">
            <button name="redirect" id="redirect">Thanh toán MOMO </button>
        </form>
</main>
<style>
    main{
        width: auto;
        padding: 200px;
    }
    button{
        padding: 40px;
        align-content: center;
        text-align:center ;
        font-size: x-large;
        margin-left: 300px;
        background-color: #e11b90;
        color: #fff;
        border: none;
        border-radius: 5px;
    }
    button:hover{
        
        align-content: center;
        text-align:center ;
        font-size: x-large;
        margin-left: 300px;
        background-color: green;
        color: #fff;
        border: none;
        border-radius: 5px;
    }
</style>
<div class="footer">
        <div class="footer-container">
            <div class="footer-col">
                <div class="footer-title">
                    <h3>Danh Mục Món Ăn</h3>
                    <ul>
                        <li><a href="#">Món Mới</a></li>
                        <li><a href="#">Combo 1 Người</a></li>
                        <li><a href="#">Combo Nhóm</a></li>
                        <li><a href="#">Gà Rán - Gà Quay</a></li>
                        <li><a href="#">Burger - Cơm - Mì Ý</a></li>
                        <li><a href="#">Thức Ăn Nhẹ</a></li>
                        <li><a href="#">Thức Uống & Tráng Miệng</a></li>
                    </ul>
                </div>
            </div>
            <div class="footer-col">
                <div class="footer-title">
                    <h3>Về EKO EATS</h3>
                    <ul>
                        <li><a href="#">Câu Chuyện Của Chúng Tôi</a></li>
                        <li><a href="#">Tin Khuyến Mãi</a></li>
                        <li><a href="#">Tin tức EKO EATS</a></li>
                        <li><a href="#">Gà Rán - Gà Quay</a></li>
                        <li><a href="#">Tuyển dụng</a></li>
                        <li><a href="#">Đặt tiệc Sinh nhật</a></li>
                    </ul>
                </div>
            </div>
            <div class="footer-col">
                <div class="footer-title">
                    <h3>Liên hệ EKO EATS</h3>
                    <ul>
                        <li><a href="#">Theo dõi đơn hàng</a></li>
                        <li><a href="#">Hệ Thống Nhà Hàng</a></li>
                        <li><a href="#">Combo Nhóm</a></li>
                        <li><a href="#">Liên hệ EKO EATS</a></li>
                    </ul>
                </div>
            </div>
            <div class="footer-col">
                <div class="footer-title">
                    <h3>Chính sách</h3>
                    <ul>
                        <li><a href="#">Chính sách hoạt động</a></li>
                        <li><a href="#">Chính sách và quy định</a></li>
                        <li><a href="#">Chính sách bảo mật thông tin</a></li>
                    </ul>
                </div>
            </div>
            <div class="footer-col">
                <div class="footer-title">
                    <h3>Download App</h3>
                    <div class="app-logo">
                        <a class="chplay" href="#"><img width="100%" src="../asset/img/boton-google.png" alt=""></a>
                        <a class="appstore" href="#"><img width="100%" src="../asset/img/boton-app-store.png" alt=""></a>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer-social">
            <div class=""></div>
            <div class="copyright">Copyright © 2023 EKO EATS Vietnam</div>
            <div class="social">
                <a href="#"><i class="fa-brands fa-facebook fa-2x"></i></a>
                <a href="#"><i class="fa-brands fa-instagram fa-2x"></i></a>
                <a href="#"><i class="fa-brands fa-youtube fa-2x"></i></a>
                <a href="#"><i class="fa-brands fa-twitter fa-2x"></i></a>
            </div>
        </div>
    </div>
    <!-- End footer -->
    <script src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.js"></script>
    <script>
        
    var swiper = new Swiper(".mySwiper", {
      slidesPerView: 1,
      spaceBetween: 30,
      loop: true,
      pagination: {
        el: ".swiper-pagination",
        clickable: true,
      },
      navigation: {
        nextEl: ".swiper-button-next",
        prevEl: ".swiper-button-prev",
      },
    });
  
      </script>
</body>
</html>