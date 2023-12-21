<div class="container col-lg-9 col-12 col-sm-12 col-md-7">
            <div class="title_header">
                <h2 class="title_content">
                    <span class = "background_main">Thông tin đơn hàng</span>
                </h2>
            </div>
            <div class="card-group card_header_product row m-0 mt-xl-5">
                <div class="box-personal-information">
                    <div class="group-personal-information">
                        <label for="">Tên đặt hàng: </label>
                        <span><?=$currentBill->getName()?></span>
                    </div>
                    <div class="group-personal-information">
                        <label for="">Số điện thoại: </label>
                        <span><?=$currentBill->getPhone()?></span>
                    </div>
                    <div class="group-personal-information">
                        <label for="">Email: </label>
                        <span><?=$currentBill->getEmail()?></span>
                    </div>
                    <div class="group-personal-information">
                        <label for="">Địa chỉ: </label>
                        <span><?=$currentBill->getAddress()?></span>
                    </div>
                    <div class="group-personal-information">
                        <label for="">Địa chỉ chi tiết: </label>
                        <span><?=$currentBill->getDetailAddress()?></span>
                    </div>
                    <div class="group-personal-information">
                        <label for="">Tổng đơn hàng: </label>
                        <span>
                            <?=currency_format($currentBill->getTotal())?>
                        </span>
                    </div>
                    <?php
                        switch ($currentBill->getStatus()) {
                            case 0:
                                $status = "Chờ xác nhận";
                                break;
                            case 1:
                                $status = "Đã xác nhận";
                                break;
                            case 2:
                                $status = "Đã chuẩn bị hàng";
                                break;
                            case 3:
                                $status = "Đã gửi đi";
                                break;
                            case 4:
                                $status = "Hoàn thành";
                                break;
                        }
                    ?>
                    <div class="group-personal-information">
                        <label for="">Trạng thái: </label>
                        <span class="label label-primary"><?=$status?></span>
                    </div>
                    <div class="group-personal-information">
                        <label for="">Phương thức thanh toán: </label>
                        <span class ="label label-danger"><?=$currentBill->getStatus() == 1 ? "Chuyển khoản ngân hàng" : "Thanh toán khi nhận hàng"?></span>
                    </div>
                </div>
            </div>
            <div class="box-bill">
                <div class="information-bill">
                    <h2 class = "title-information">Chi tiết đơn hàng </h2>
                    <div class="details-bill">
                        <table>
                            <thead>
                                <td>STT</td>
                                <td>Tên sản phẩm</td>
                                <td>Model</td>
                                <td>Giá</td>
                                <td>Số lượng</td>
                                <td>Tổng</td>
                            </thead>
                            <tbody>
                                <?php
                                    if(isset($allBillDetail) && count($allBillDetail) > 0) {
                                        $index = 1;
                                        foreach($allBillDetail as $item) {
                                            $name = $item->getName();
                                            $model = $item->getModel();
                                            $price = $item->getPrice();
                                            $quantity = $item->getQuantity();
                                            echo "<tr>
                                            <td>".$index."</td>
                                            <td>".$name."</td>
                                            <td>".$model."</td>
                                            <td>".currency_format($price, "")."</td>
                                            <td>x".$quantity."</td>
                                            <td>".currency_format($price * $quantity, "")."</td>
                                            </tr>";
                                            $index++;
                                        }
                                    } 
                                ?>
                            </tbody>
                        </table>
                    </div>
                    <div class="show-details-in-bill">
                            <!-- render -->
                    </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<script>
    let linkEle = document.createElement('link');
    linkEle.setAttribute('rel', 'stylesheet');
    linkEle.setAttribute('href', './assets/css/personal.css');
    document.querySelector("head").appendChild(linkEle);
    const title = document.querySelector('title');
    title.innerHTML = 'Chi tiết đơn hàng';
</script>