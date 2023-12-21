<style>
    .card-group.card_header_product {
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items : center;
    }
    .box-error-message {
        display: flex;
        flex-direction: column;
        align-items : center;
    }
    .box-error-message a {
        max-width: 200px;
    }
</style>
<div class="container col-lg-9 col-12 col-sm-12 col-md-7">
        <div class="card-group card_header_product row m-0 mt-xl-5">
            <img style="width: 50%;" src="./uploads/404.jpg" alt="404 error">
            <div class="box-error-message">
                <p class="desc-error">Trang bạn yêu cầu không được tìm thấy</p>
                <a href="." >Quay lại trang chủ</a>
            </div>
        </div>
    </div>
</div>
</section><script>
    const title = document.querySelector('title');
    title.innerHTML = 'Không tìm thấy trang này';
</script>
