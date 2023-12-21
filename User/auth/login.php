        <div style="margin-top: 10px;" class="container col-lg-9 col-12 col-sm-12 col-md-7">
            <div class="title_header">
                <h2 class="title_content">
                    <span class = "background_main">Đăng nhập</span>
                </h2>
            </div>
            <div class="card-group card_header_product row m-0 mt-xl-5">
                    <div class="card border-0 col-sm-12 col-md-12 col-lg-12 col-12">           
                        <form class = "form-contact" method = "post" action="./?act=dang-nhap">
                            <div class="form-group">
                                <label for="name" class="form-label">Tên đăng nhập: </label>
                                <input id="username" required type="text" class="form-control" name = "username" placeholder="Tên đăng nhập">
                                <span class = "message_error"></span>
                            </div>
                            <div class="form-group">
                                <label for="phone" class="form-label">Mật khẩu: </label>
                                <input id="password" required type="password" class="form-control" name = "password"  placeholder="Mật khẩu">
                                <span class = "message_error"></span>
                            </div>
                            <button id="btn-login" style="margin-top: 10px;border: none; outline: none; font-size: 1.4rem; color: #fff;" type="submit" name="login" class="background_main btn-submit-contact">Đăng nhập</button>
                            <a style="font-size: 1.4rem; margin-left: 5px;" href="./?act=quen-mat-khau">Quên mật khẩu</a>
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
<script src='./assets/js/validation.js'></script>
<script>
    let usernameL = document.querySelector('#username'),
        passwordL = document.querySelector('#password'),
        btnSubmitL = document.querySelector('#btn-login');
        const messageUsernameL = "Username không được để trống",
            messagePasswordL = "Password không được để trống";
        // array to save all input to check, message show error of each and a string regex to check 
        const inputsToValidateCheckL = [
            { element: usernameL, message: messageUsernameL, regex: /^.{1,}$/, type: "text", isEmpty: false},
            { element: passwordL, message: messagePasswordL, regex: /^.{1,}$/, type: "text", isEmpty: false},
        ];
        validation(inputsToValidateCheckL, btnSubmitL);
</script>