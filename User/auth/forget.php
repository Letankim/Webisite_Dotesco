        <div style="margin-top: 10px;" class="container col-lg-9 col-12 col-sm-12 col-md-7">
            <div class="title_header">
                <h2 class="title_content">
                    <span class = "background_main">Quên mật khẩu</span>
                </h2>
            </div>
            <div class="card-group card_header_product row m-0 mt-xl-5">
                    <div class="card border-0 col-sm-12 col-md-12 col-lg-12 col-12">           
                        <form class = "form-contact" method = "post" action="./quen-mat-khau">
                            <div class="mb-3">
                                <label for="email" class="form-label">Email: (Ví dụ: abc@gmail.com) </label>
                                <input pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$" required type="email" class="form-control" id="email"  name = "email"  placeholder="Email">
                            </div>
                            <div class="mb-3">
                                <label for="name" class="form-label">Tên đăng nhập: (Từ 5 đến 30 kí tự .Không cách.) </label>
                                <input pattern="[a-zA-Z.@#$%&^*()]{5,30}" required type="text" class="form-control" name = "username" placeholder="Tên đăng nhập">
                            </div>
                            <button style="border: none; outline: none; font-size: 1.4rem; color: #fff;" type="submit" name="forget" class="background_main btn-submit-contact">Cấp lại mật khẩu</button>
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