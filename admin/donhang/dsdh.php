<div class="breadcome-area">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="breadcome-list">
                                <div class="row">
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                        <div class="breadcomb-wp">
											<div class="breadcomb-icon">
												<i class="icon nalika-home"></i>
											</div>
											<div class="breadcomb-ctn">
												<h2>Product Cart</h2>
												<p>Welcome to Eko Eats <span class="bread-ntd">Admin Eko Eats</span></p>
											</div>
										</div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                        <div class="breadcomb-report">
											<button data-toggle="tooltip" data-placement="left" title="Download Report" class="btn"><i class="icon nalika-download"></i></button>
										</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="product-cart-area mg-b-30">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="product-cart-inner">
                            <div id="example-basic">
                                <h3 style="color:#fff">Đơn Hàng</h3>
                                <section>
                                    <h3 class="product-cart-dn">Shopping</h3>
                                    <div class="product-list-cart">
                                        <div class="product-status-wrap border-pdt-ct">
                                            <table>
                                                <tr>
                                                <form role="search" action="index.php?act=dsdh" method="POST" class="">
                                                <th>
													<input type="text" name="kyw" placeholder="Tìm Kiếm..." class="form-control">
												</th>
                                                <th><input type="submit" name="listok" class="form-control"></th>
                                                </form>
                                                </tr>
                                                <tr>
                                                    <th>MÃ ĐƠN HÀNG</th>
                                                    <th>KHÁCH HÀNG</th>
                                                    <th>SỐ LƯỢNG HÀNG</th>
                                                    <th>GIÁ TRỊ ĐƠN HÀNG</th>
                                                    <th>NGÀY ĐẶT HÀNG</th>
                                                    <th>TÌNH TRANG ĐƠN HÀNG</th>
                                                    <th>Trạng Thái Thanh Toán</th>
                                                    <th>Chi TIẾT ĐƠN HÀNG</th>
                                                    <th>THAO TÁC</th>
                                                </tr>
                                                <?php 
                                                    foreach ($listbill as $bill) {
                                                        extract($bill);
                                                        $billtong=number_format($bill['tongthanhtoan'],3);
                                                        $kh=$bill["user"].'
                                                        <br> '.$bill["email"].'
                                                        <br> '.$bill["tel"].'
                                                        <br> '.$bill["diachi"];
                
                                                        $countsp=loadall_cart_count($bill["id"]);
                                                        $ttdh=get_ttdh($bill["bill_status"]);
                                                        $paybill=get_tt($bill["tinhtrangtt"]);
                                                        $suadh="index.php?act=suadh&id=".$id;
                                                        $xoadh="index.php?act=xoadh&id=".$id;
                                                        $chitietdh="index.php?act=chitietdh&id=".$id;
                                                        echo '<tr>
                                                        <td>EKO-'.$bill['id'].'</td>
                                                        <td>'.$kh.'</td>
                                                        <td>'.$countsp.'</td>
                                                        <td>'.$billtong.'</td>
                                                        <td>'.$bill['ngaydathang'].'</td>
                                                        <td>'.$ttdh.'</td>
                                                        <td>'.$paybill.'</td>
                                                        <td><a href="'.$chitietdh.'"><input type="button" value="Chi tiết đơn hàng"></a></td>
                                                        <td><a href="'.$suadh.'"><input type="button" value="Sửa"></a> <a href="'.$xoadh.'">   <input type="button" value="Xóa"></a></td>
                                                        </td>
                                                    </tr>';
                                                    }
                                                ?>
                                                </table>
                                        </div>
                                    </div>
                                </section>
                                </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <style>
            .form-label{
                color:#fff;
            }
            h3{
                color:#fff;
            }
            .control-label{
                color:#fff;
            }
        </style>