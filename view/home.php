<main>
    <div class="main-menu">
        <div class="content">
            <section class="delivery-address">
                <p>
                    <span>Đặt Ngay</span> 
                    <img src="https://img.icons8.com/color/48/motorcycle.png" alt="motorcycle" />
                    <span>Giao Hàng</span>
                    <img src="https://img.icons8.com/color/48/food-receiver.png" alt="food-receiver" />
                    <span>hoặc Mang đi</span>
                    <button><a href="index.php?act=home">Bắt đầu đặt hàng</a></button>
                </p>
            </section>

            <!-- Thanh tìm kiếm -->
            <section class="search-bar">
                <form action="index.php?act=search" method="post">
                    <input type="text" name="keyword" placeholder="Tìm kiếm sản phẩm..." required>
                    <button type="submit">Tìm kiếm</button>
                </form>
            </section>

            <section class="banner">
                <div class="swiper mySwiper">
                    <div class="swiper-wrapper">
                        <div class="swiper-slide"><img src="../asset/img/buatruavuive.png" alt=""></div>
                        <div class="swiper-slide"><img src="../asset/img/gahoangkim.png" alt=""></div>
                    </div>
                    <div class="swiper-button-next"></div>
                    <div class="swiper-button-prev"></div>
                </div>
            </section>

            <div class="option-menu">
                <ul>
                    <?php
                    foreach ($listdm as $danhmuc) {
                        extract($danhmuc);
                        $linkdm = "index.php?act=home&iddm=" . $id;
                        echo '<li><a href="' . $linkdm . '#sale">' . $name . ' </a></li>';
                    }
                    ?>
                </ul>
            </div>
        </div>
    </div>

    <!-- Món ưu đãi -->
    <div id="sale" class="container">
        <div class="menu-sale">
            <?php
            $i = 0;
            foreach ($listsp as $sp) {
                extract($sp);
                $hinh =  $img_path . $img;
                $linksp = "index.php?act=chitietsp&idsp=" . $id;
                $mr = (($i == 2) || ($i == 5) || ($i == 8)) ? "mr" : "";
                echo '<div class="item-menu ' . $mr . '">
                    <a href="' . $linksp . '"><img width="100%" src="' . $hinh . '" alt="">
                    <p>' . $name . '</p>
                    <p>' . $price . '.000₫<del>60.000₫</del></p>
                    <p>' . $mota . '</p></a>
                    <form action="index.php?act=addtocart" method="post">
                        <input type="hidden" name="id" value="' . $id . '">
                        <input type="hidden" name="name" value="' . $name . '">
                        <input type="hidden" name="img" value="' . $img . '">
                        <input type="hidden" name="price" value="' . $price . '">
                        <input type="submit" name="addtocart" value="THÊM">
                    </form>
                </div>';
                $i += 1;
            }
            ?>
        </div>
    </div>
</main>

<style>
    .search-bar {
        text-align: center;
        margin: 20px 0;
    }

    .search-bar form {
        display: flex;
        justify-content: center;
        align-items: center;
        gap: 10px;
    }

    .search-bar input {
        width: 300px;
        padding: 10px;
        border: 2px solid #a73a3a;
        border-radius: 5px;
        font-size: 16px;
    }

    .search-bar button {
        padding: 10px 15px;
        background-color: #a73a3a;
        color: white;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        transition: 0.3s;
    }

    .search-bar button:hover {
        background-color: #892828;
    }

    .item-menu input {
        width: 80%;
        padding: 15px;
        margin: 30px 0 20px;
        border: none;
        background-color: #a73a3a;
        color: #fff;
        border-radius: 20px;
        box-shadow: 0 2px 5px rgb(88, 88, 88);
    }
</style>
