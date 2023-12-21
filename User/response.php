        <div class="container main-product col-lg-9 col-12 col-sm-12 col-md-7">
            <div class="title_header">
                <h2 class="title_content">
                    <span class = "background_main">
                        <?php
                            if($isSendAdmin) {
                                echo "Gửi thông tin liên hệ thành công";   
                            } else {
                                echo "Gửi thông tin xin lỗi thất bại";
                            }
                        ?>
                    </span>
                </h2>
            </div>
            <!-- render product from database -->
            <?php
                if($isSendAdmin) {
                    echo "<p style='margin: 0;
                    font-size: 1.7rem;
                    font-weight: 500;
                    padding: 0px 15px;
                    font-style: italic;'>
                    Cảm ơn bạn đã liên hệ với chúng tôi chúng tôi 
                    sẽ liên hệ với bạn trong thời gian sớm nhất</p>
                    <img style='display: flex;
                    width: 90%;
                    height: 300px;
                    object-fit: contain;
                    margin: 0 auto;'
                    src='".PATH_UPLOADS_IMG_USER."thankyoucontact.jpg' alt='thank you'>";
                    echo "<script>
                    const title = document.querySelector('title');
                    title.innerHTML = 'Gửi liên hệ thành công';
                    </script>";
                } else {
                    echo "<p style='margin: 0;
                    font-size: 1.7rem;
                    font-weight: 500;
                    padding: 0px 15px;
                    font-style: italic;'>
                    Gửi liên hệ thất bại. Xin lỗi bạn rất nhiều vì hệ thống có chút trục trặc. Vui lòng thử lại.</p>
                    <img style='display: flex;
                    width: 90%;
                    height: 300px;
                    object-fit: contain;
                    margin: 0 auto;'
                    src='".PATH_UPLOADS_IMG_USER."sorrycontact.jpg' alt='thank you'>";
                    echo "<script>
                    const title = document.querySelector('title');
                    title.innerHTML = 'Gửi liên hệ thất bại';
                    </script>";
                }
            ?>
        </div>
    </div>
</section>