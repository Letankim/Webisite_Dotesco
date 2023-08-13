<section class = "contact-section background_main">
            <div class="container">
                <div class="row">
                    <div class="box-item-contact col-lg-4 col-sm-12 col-md-6 col-12">
                        <h2 class="contact-title">Giới thiệu</h2>
                        <div class="introduction-content">
                            <?=$introduction['content']?>
                        </div>
                        <a style="font-size: 1.4rem; margin-top: 3px;" href="./gioi-thieu">Xem thêm</a>
                    </div>
                    <div class="box-item-contact col-lg-4 col-sm-12 col-md-6 col-12">
                        <h2 class="contact-title">Sản phẩm</h2>
                        <ul class="list_about-product">
                          <?php
                            $categoryFooter = getCategoryFooter();
                            foreach($categoryFooter as $category) {
                                echo "<li class='item_about-product'>
                                  <a href='./danh-muc/".$category['id']."/".vn_to_str($category['name'])."' class='item_about-product'>".$category['name']."</a>
                                </li>";
                            }
                          ?>
                        </ul>
                    </div>
                    <div class="box-item-contact col-lg-4 col-sm-12 col-md-6 col-12">
                        <h2 class="contact-title">LIÊN HỆ VỚI CHÚNG TÔI</h2>
                        <div class="contact-us">
                            <p class="name_company text-uppercase m-0">
                              công ty TNHH Dịch Vụ Kỹ thuật DOTESCO
                            </p>
                            <ul class="address p-0 type-none">
                              <li class="address_item font-italic">
                                <span>Địa chỉ :</span>
                                107/123 Quang Trung, Phường 10, Gò Vấp, Tp.HCM
                              </li>
                              <li class="address_item font-italic">
                                <span>Hotline :</span>
                                0357710941 
                              </li>
                              <li class="address_item font-italic">
                                <span>Email:</span>
                                dotesco281@gmail.com
                              </li>
                            </ul>
                          </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
    <footer class = "background_main">
        <span class = "text-center p-3">
          &COPY;
                <?php
                    echo date("Y");
                ?> 
            DOTESCO. All rights reserved | &COPY;Copyright by Letankim
        </div>
        </span>
    </footer>
    <div class="overlay"></div>
    <div class="pop-up">
      <i class='bx bxs-x-circle btn-close-pop-up' ></i>
      <h3 class="title-pop-up">Đăng ký nhận tư vấn</h3>
      <form class = "form-contact" method="post" action="./gui-tin-nhan-san-pham">
        <div class="mb-3">
            <label for="name" class="form-label">Họ tên: </label>
            <input type="text" class="form-control" id="name" name = "name" placeholder="Họ tên">
            <span class = "message_error"></span>
        </div>
        <div class="mb-3">
          <label for="email" class="form-label">Email: </label>
          <input type="email" class="form-control" id="email"  name = "email"  placeholder="Email">
          <span class = "message_error"></span>
        </div>
        <div class="mb-3">
          <label for="phone" class="form-label">Điện thoại: </label>
          <input type="tel" class="form-control" id="phone" name = "phone"  placeholder="Số điện thoại">
          <span class = "message_error"></span>
        </div>
        <div class="mb-3 display-flex-column">
            <label for="message" class="form-label">Tin nhắn: </label>
            <textarea name="message" id="message" cols="30" rows="10"></textarea>
            <span class = "message_error"></span>
        </div>
        <button type="submit" name="contact" class="btn btn-primary btn-submit-contact">Submit</button>
      </form>
    </div>
    <script src="./assets/js/js_bootstrap/bootstrap.js"></script>
    <script src="./assets/js/js_bootstrap/bootstrap.min.js"></script>
    <script src="./assets/js/app.js"></script>
    <script src="./assets/js/itemProduct.js"></script>
</body>
</html>