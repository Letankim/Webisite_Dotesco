        <div style="margin-top: 10px;" class="container col-lg-9 col-12 col-sm-12 col-md-7">
            <div class="title_header">
                <h2 class="title_content">
                    <span class = "background_main">Đăng nhập</span>
                </h2>
            </div>
            <div class="card-group card_header_product row m-0 mt-xl-5">
                    <div class="card border-0 col-sm-12 col-md-12 col-lg-12 col-12">           
                        <form class = "form-contact" method = "post" action="./dang-nhap">
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
                            <a style="font-size: 1.4rem; margin-left: 5px;" href="./quen-mat-khau">Quên mật khẩu</a>
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