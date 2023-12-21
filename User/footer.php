<?php
  $introductionContent = "";
  if($introduction != null) {
    $introductionContent = $introduction->getContent();
  }
?>
<section class = "contact-section background_main">
            <div class="container">
                <div class="row">
                    <div class="box-item-contact col-lg-4 col-sm-12 col-md-6 col-12">
                        <h2 class="contact-title">Giới thiệu</h2>
                        <div class="introduction-content">
                            <?=$introductionContent?>
                        </div>
                        <a style="color:#fff;font-size: 1.4rem; margin-top: 3px;" href="./?act=gioi-thieu">Xem thêm</a>
                    </div>
                    <div class="box-item-contact col-lg-4 col-sm-12 col-md-6 col-12">
                        <h2 class="contact-title">Danh mục sản phẩm</h2>
                        <ul class="list_about-product">
                          <?php
                            foreach($categoryFooter as $category) {
                              ?>
                                <li class="item_about-product">
                                  <a style="text-transform: uppercase" href="./?act=san-pham-danh-muc&id=<?=$category->getId()?>" class="item_about-product">
                                    <?=$category->getName()?>
                                  </a>
                                </li>
                            <?php
                            }
                          ?>
                        </ul>
                    </div>
                    <div class="box-item-contact col-lg-4 col-sm-12 col-md-6 col-12">
                        <h2 class="contact-title">LIÊN HỆ VỚI CHÚNG TÔI</h2>
                        <div class="contact-us">
                            <p class="name_company text-uppercase m-0">
                              <?=$nameCompany?>
                            </p>
                            <ul class="address p-0 type-none">
                              <li class="address_item font-italic">
                                <span>Địa chỉ:</span>
                                <?=$address?>
                              </li>
                              <li class="address_item font-italic">
                                <span>Hotline:</span>
                                <a style='text-decoration: none; color: #fff;' href="tel:<?=$phone?>"><?=$phone?></a>
                                <span>(Zalo/Call)</span>
                              </li>
                              <li class="address_item font-italic">
                                <span>Email:</span>
                                <a style='text-decoration: none; color: #fff;' href="mailto:<?=$email?>"><?=$email?></a>
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
                <?=date("Y");?> 
            DOTESCO. All rights reserved
        </div>
        </span>
    </footer>
    <div class="overlay"></div>
    <div class="pop-up">
      <i class='bx bxs-x-circle btn-close-pop-up' ></i>
      <h3 class="title-pop-up">Đăng ký nhận tư vấn</h3>
      <form class = "form-contact" method="post" action="./?act=gui-tin-nhan-san-pham">
        <div class="form-group">
            <label for="name" class="form-label">Họ tên: </label>
            <input type="text" class="form-control" id="fullname" name = "name" placeholder="Họ tên">
            <span class = "message_error"></span>
        </div>
        <div class="form-group">
          <label for="email" class="form-label">Email: </label>
          <input type="email" class="form-control" id="email"  name = "email"  placeholder="Email">
          <span class = "message_error"></span>
        </div>
        <div class="form-group">
          <label for="phone" class="form-label">Điện thoại: </label>
          <input type="tel" class="form-control" id="phone" name = "phone"  placeholder="Số điện thoại">
          <span class = "message_error"></span>
        </div>
        <div class="form-group display-flex-column">
            <label for="message" class="form-label">Tin nhắn: </label>
            <textarea name="message" id="message" cols="30" rows="10"></textarea>
            <span class = "message_error"></span>
        </div>
        <button id="bnt-contact-p" type="submit" name="contact" class="btn btn-primary btn-submit-contact">Gửi liên hệ</button>
      </form>
    </div>
  <script>
    if(typeof validation === "function") {
      let regexEmail = /^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|.(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
      let fullnameContactP = document.querySelector('#fullname'),
          emailContactP = document.querySelector('#email'),
          phoneContactP = document.querySelector('#phone'),
          messageContactP = document.querySelector('#message'),
          btnSubmit = document.querySelector('#bnt-contact-p');
          const messageFullNameP = "Tên không được để trống",
              messageEmailP = "Email không hợp lệ",
              messagePhoneP = "Số điện thoại không hợp lệ",
              messageContact = "Hãy nhập tin nhắn của bạn";
          // array to save all input to check, message show error of each and a string regex to check 
          const inputsToValidateCheckContactP = [
              { element: fullnameContactP, message: messageFullNameP, regex: /^.{1,}$/, type: "text", isEmpty: false},
              { element: messageContactP, message: messageContact, regex: /^.{1,}$/, type: "text", isEmpty: false},
              { element: emailContactP, message: messageEmailP, regex: regexEmail, type: "text", isEmpty: false},
              { element: phoneContactP , message: messagePhoneP, regex: /(84|0[3|5|7|8|9])+([0-9]{8})\b/g, type: "text", isEmpty: false}
          ]
          validation(inputsToValidateCheckContactP, btnSubmit);
    }
  </script>
    <script src="./assets/js/js_bootstrap/bootstrap.min.js"></script>
    <script src="./assets/js/app.js"></script>
    <script src="./assets/js/itemProduct.js"></script>
</body>
</html>
