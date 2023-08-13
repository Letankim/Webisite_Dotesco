        <div class="container col-lg-9 col-12 col-sm-12 col-md-7">
            <div class="card-group card_header_product row m-0 mt-xl-5">
                <div class="card border-0 col-sm-12 col-md-6 col-lg-6 col-12">
                    <div class="card-body card-contact-details text-start">
                        <h2 class="card-title">LIÊN HỆ</h2>
                        <div class="card-text">
                            <p class="name_company text-uppercase m-0">
                            công ty TNHH Dịch Vụ Kỹ thuật DOTESCO
                            </p>
                            <ul class="address p-0 type-none">
                            <li class="address_item font-italic">
                                <span>Địa chỉ :</span>
                                Số 02 Hoa Phượng, P. 2, Q. Phú Nhuận, TP. HCM
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
                    <div class="maps">
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3929.034505878659!2d105.72916787468581!3d10.014008490092113!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31a0882139720a77%3A0x3916a227d0b95a64!2zVHLGsOG7nW5nIMSQ4bqhaSBo4buNYyBGUFQgQ-G6p24gVGjGoQ!5e0!3m2!1sen!2s!4v1688918225258!5m2!1sen!2s" height="300" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                    </div>
                </div>
                <div class="card border-0 col-sm-12 col-md-6 col-lg-6 col-12">           
                    <form class = "form-contact" method="post" action="./gui-tin-nhan">
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
            </div>
        </div>
    </div>
</section>
<?php
    echo "<script>
    const title = document.querySelector('title');
    title.innerHTML = 'Liên hệ';
    </script>";
?>