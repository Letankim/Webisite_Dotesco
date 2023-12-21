<?php
    $nameCompany = "";
    $address = "";
    $phone = "";
    $email = "";
    if($companyActive != null) {
        $nameCompany = $companyActive->getName();
        $address = $companyActive->getAddress();
        $phone = $companyActive->getPhone();
        $email = $companyActive->getEmail();
    }
?>
        <div class="container col-lg-9 col-12 col-sm-12 col-md-7">
            <div class="card-group card_header_product row m-0 mt-xl-5">
                <div class="card border-0 col-sm-12 col-md-6 col-lg-6 col-12">
                    <div class="card-body card-contact-details text-start">
                        <h2 class="card-title">LIÊN HỆ</h2>
                        <div class="card-text">
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
                                <a style='text-decoration: none; color: #000;' href="tel:<?=$phone?>"><?=$phone?></a>
                                <span>(Zalo/Call)</span>
                            </li>
                            <li class="address_item font-italic">
                                <span>Email:</span>
                                <a style='text-decoration: none; color: #000;' href="tel:<?=$email?>"><?=$email?></a>
                            </li>
                            </ul>
                        </div>
                    </div>
                    <div class="maps">
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d501725.41843487445!2d106.36555844903441!3d10.755292869070603!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x317529292e8d3dd1%3A0xf15f5aad773c112b!2sHo%20Chi%20Minh%20City%2C%20Vietnam!5e0!3m2!1sen!2s!4v1692548930170!5m2!1sen!2s" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                    </div>
                </div>
                <div class="card border-0 col-sm-12 col-md-6 col-lg-6 col-12">           
                    <form class = "form-contact" method="post" action="./?act=gui-tin-nhan">
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
                        <button id="btn-contact" type="submit" name="contact" class="btn btn-primary btn-submit-contact">Gửi liên hệ</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
<script>
    const title = document.querySelector('title');
    title.innerHTML = 'Liên hệ';
</script>
<script src='./assets/js/validation.js'></script>
<script>
    let regexEmailC = /^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|.(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    let fullnameContact = document.querySelector('#fullname'),
        emailContact = document.querySelector('#email'),
        phoneContact = document.querySelector('#phone'),
        messageContactText = document.querySelector('#message'),
        btnSubmitC = document.querySelector('#btn-contact');
        const messageFullName = "Tên không được để trống",
            messageEmail = "Email không hợp lệ",
            messagePhone = "Số điện thoại không hợp lệ",
            messageContactC = "Hãy nhập tin nhắn của bạn";
        // array to save all input to check, message show error of each and a string regex to check 
        const inputsToValidateCheckContactC = [
            { element: fullnameContact, message: messageFullName, regex: /^.{1,}$/, type: "text", isEmpty: false},
            { element: messageContactText, message: messageContactC, regex: /^.{1,}$/, type: "text", isEmpty: false},
            { element: emailContact, message: messageEmail, regex: regexEmailC, type: "text", isEmpty: false},
            { element: phoneContact , message: messagePhone, regex: /(84|0[3|5|7|8|9])+([0-9]{8})\b/g, type: "text", isEmpty: false}
        ];
        validation(inputsToValidateCheckContactC, btnSubmitC);
</script>