<div class="container col-lg-9 col-12 col-sm-12 col-md-7">
            <div class="title_header">
                <h2 class="title_content">
                    <span class = "background_main">Thông tin cá nhân</span>
                </h2>
            </div>
            <div class="card-group card_header_product row m-0 mt-xl-5">
                    <div class="personal-infomation">
                        <h3 class = "name-user">Tên đang nhập: <i><?=$_SESSION['username']?></i></h3>
                        <h3 class = "name-user">Email: <i><?=$_SESSION["emailUser"]?></i></h3>
                        <button class="btn-change-password">Cập nhật mật khẩu</button>
                        <span style = "font-size: 1.4rem;"><?=$message?></span>
                    </div>
                    <div class="change-password card border-0 col-sm-12 col-md-12 col-lg-12 col-12">           
                        <form class = "form-contact" method = "post" action="./ca-nhan">
                            <div class="mb-3">
                                <label for="phone" class="form-label">Mật khẩu cũ: (Từ 8 đến 30 kí tự. Không cách)</label>
                                <input required pattern="[0-9a-zA-Z@#$%&^]{8,30}$" type="password" class="form-control" name = "password"  placeholder="Mật khẩu cũ">
                            </div>
                            <div class="mb-3">
                                <label for="phone" class="form-label">Mật khẩu mới: (Từ 8 đến 30 kí tự. Không cách)</label>
                                <input required pattern="[0-9a-zA-Z@#$%&^]{8,30}$" type="password" class="form-control" name = "newPassword"  placeholder="Mật khẩu mới">
                            </div>
                            <button style="border: none; outline: none; font-size: 1.4rem; color: #fff;" type="submit" name="changePassword" class="background_main btn-submit-contact">Cập nhật mật khẩu</button>
                        </form>
                    </div>
                </div>
            </div>
    </div>
</section>
<?php
    echo "<script>
    const title = document.querySelector('title');
    title.innerHTML = 'Cá nhân';
    </script>";
?>