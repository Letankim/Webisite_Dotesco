        <div style="margin-top: 10px;" class="container col-lg-9 col-12 col-sm-12 col-md-7">
            <div class="title_header">
                <h2 class="title_content">
                    <span class = "background_main">Quên mật khẩu</span>
                </h2>
            </div>
            <div class="card-group card_header_product row m-0 mt-xl-5">
                    <div class="card border-0 col-sm-12 col-md-12 col-lg-12 col-12">           
                        <form class = "form-contact" method = "post" action="./?act=quen-mat-khau">
                            <div class="form-group">
                                <label for="email-f" class="form-label">Email:  </label>
                                <input id="email-f" required type="email" class="form-control" id="email"  name = "email"  placeholder="Email">
                                <span class = "message_error"></span>
                            </div>
                            <div class="form-group">
                                <label for="username-f" class="form-label">Tên đăng nhập:  </label>
                                <input id="username-f" required type="text" class="form-control" name = "username" placeholder="Tên đăng nhập">
                                <span class = "message_error"></span>
                            </div>
                            <button id="btn-forget" style="margin-top: 5px;border: none; outline: none; font-size: 1.4rem; color: #fff;" type="submit" name="forget" class="background_main btn-submit-contact">Cấp lại mật khẩu</button>
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
    title.innerHTML = 'Quên mật khẩu';
    </script>";
?>
<script src='./assets/js/validation.js'></script>
<script>
    let regexEmail = /^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|.(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    let usernameF = document.querySelector('#username-f'),
        emailF = document.querySelector('#email-f'),
        btnSubmitF = document.querySelector('#btn-forget');
        const messageUsernameF = "Username phải từ 6 kí tự",
            messageEmailF = "Email không hợp lệ";
        // array to save all input to check, message show error of each and a string regex to check 
        const inputsToValidateCheckF = [
            { element: usernameF, message: messageUsernameF, regex: /^[a-zA-Z0-9.,!#$%&'*+/=?^_]{6,100}$/, type: "text", isEmpty: false},
            { element: emailF, message: messageEmailF, regex: regexEmail, type: "text", isEmpty: false}
        ];
        validation(inputsToValidateCheckF, btnSubmitF);
</script>