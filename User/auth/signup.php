        <div style="margin-top: 10px;" class="container col-lg-9 col-12 col-sm-12 col-md-7">
            <div class="title_header">
                <h2 class="title_content">
                    <span class = "background_main">Đăng kí</span>
                </h2>
            </div>
            <div class="card-group card_header_product row m-0 mt-xl-5">
                    <div class="card border-0 col-sm-12 col-md-12 col-lg-12 col-12">           
                        <form class = "form-contact" method = "post" action="./?act=dang-ki">
                            <div class="form-group">
                                <label for="email-s" class="form-label">Email:  </label>
                                <input id="email-s" required type="email" class="form-control" id="email"  name = "email"  placeholder="Email">
                                <span class = "message_error"></span>
                            </div>
                            <div class="form-group">
                                <label for="username-s" class="form-label">Tên đăng nhập:  </label>
                                <input id="username-s" required type="text" class="form-control" name = "username" placeholder="Tên đăng nhập">
                                <span class = "message_error"></span>
                            </div>
                            <div class="form-group">
                                <label for="password-s" class="form-label">Mật khẩu: </label>
                                <input id="password-s" required type="password" class="form-control" name = "password"  placeholder="Mật khẩu">
                                <span class = "message_error"></span>
                            </div>
                            <button id="btn-sign-up" style="margin-top: 5px; border: none; outline: none; font-size: 1.4rem; color: #fff;" type="submit" name="signup" class="background_main btn-submit-contact">Đăng kí</button>
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
    title.innerHTML = 'Đăng kí';
    </script>";
?>
<script src='./assets/js/validation.js'></script>
<script>
    let regexEmail = /^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|.(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    let usernameS = document.querySelector('#username-s'),
        passwordS = document.querySelector('#password-s'),
        emailS = document.querySelector('#email-s'),
        btnSubmitS = document.querySelector('#btn-sign-up');
        const messageUsernameL = "Username phải từ 6 kí tự",
            messagePasswordL = "Password phải từ 8 kí tự",
            messageEmailL = "Email không hợp lệ";
        // array to save all input to check, message show error of each and a string regex to check 
        const inputsToValidateCheckL = [
            { element: usernameS, message: messageUsernameL, regex: /^[a-zA-Z0-9.,!#$%&'*+/=?^_]{6,100}$/, type: "text", isEmpty: false},
            { element: passwordS, message: messagePasswordL, regex: /^[a-zA-Z0-9.,!#$%&'*+/=?^_]{8,}$/, type: "text", isEmpty: false},
            { element: emailS, message: messageEmailL, regex: regexEmail, type: "text", isEmpty: false}
        ];
        validation(inputsToValidateCheckL, btnSubmitS);
</script>