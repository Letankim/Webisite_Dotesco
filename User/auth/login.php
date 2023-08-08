<section class = "container_banner container">
    <div class="row">
        <div class="main-left col-lg-3 col-12 col-sm-12 col-md-5">
            <div class="navigation_left col-lg-12">
                <div class="container_nav_left background_main">
                    <h2 class="title_nav_left">
                        DANH MỤC SẢN PHẨM
                    </h2>
                </div>
                 <!-- render danh muc from database -->
                 <?=showCategory($allCategoryActive)?>
            </div>
            <div class="navigation_left col-lg-12">
                <div class="container_nav_left background_main">
                    <h2 class="title_nav_left">
                        Nhà sản xuất
                    </h2>
                </div>
                <!-- render nha san xua tu database -->
                <?=showCategoryByOrigin($allOriginActive)?>
            </div>
        </div>
        <div class="container col-lg-9 col-12 col-sm-12 col-md-7">
            <div class="card-group card_header_product row m-0 mt-xl-5">
                <div class="card border-0 col-sm-12 col-md-12 col-lg-12 col-12">           
                    <form class = "form-contact" method = "post" action="index.php?act=login">
                        <div class="mb-3">
                            <label for="name" class="form-label">Tên đăng nhập: </label>
                            <input required type="text" class="form-control" name = "username" placeholder="Tên đăng nhập">
                            <span class = "message_error"></span>
                        </div>
                        <div class="mb-3">
                            <label for="phone" class="form-label">Mật khẩu: </label>
                            <input required type="password" class="form-control" name = "password"  placeholder="Mật khẩu">
                            <span class = "message_error"></span>
                        </div>
                        <button style="border: none; outline: none; font-size: 1.4rem; color: #fff;" type="submit" name="login" class="background_main btn-submit-contact">Đăng nhập</button>
                        <a style="font-size: 1.4rem; margin-left: 5px;" href="index.php?act=forget">Quên mật khẩu</a>
                        <span style = "font-size: 1.4rem;"><?=$message?></span>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
<?php
    echo "<script>
    const title = document.querySelector('title');
    title.innerHTML = 'Đăng nhập';
    </script>";
?>