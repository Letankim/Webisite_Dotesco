<?php
    $name = "";
    $price = "";
    $img = PATH_UPLOADS_IMG_USER;
    $total = 0;
    if(!$isCart && $boughtProduct != null) {
        $name = $boughtProduct->getName();
        $price = $boughtProduct->getPrice();
        $priceSale = $boughtProduct->getPriceSale();
        if($priceSale > 0) {
            $price = $price - $priceSale;
        }
        $img.= $boughtProduct->getImg();
        $total = $price * $numberOfProduct;
    }
?>
        <div class="container col-lg-9 col-12 col-sm-12 col-md-7">
            <div class="card-group card_header_product row m-0 mt-xl-5">
                <div class="information-bill p-0">
                    <h2 class = "title-information">Thông tin đơn hàng </h2>
                    <div class="details-bill">
                        <table>
                            <thead>
                                <td>STT<td>
                                <td>Tên<td>
                                <td>Hình ảnh<td>
                                <td>Số lượng<td>
                                <td>Giá<td>
                                <td style="text-align: right; padding-right: 20px;">Thành tiền<td>
                            </thead>
                            <tbody>
                                <?php
                                    if($isCart && isset($allCart)) {
                                        $index = 1;
                                        $allPricePay = 0;
                                        foreach ($allCart as $cartItem) {
                                            $id = $cartItem->getId();
                                            $numberOfProduct = $cartItem->getNumberOfProduct();
                                            $name = $cartItem->getName();
                                            $price = $cartItem->getPrice();
                                            $img = $cartItem->getImg();
                                            $total = $numberOfProduct * $price;
                                            $allPricePay+=$total;
                                        ?>
                                            <tr class="table-active">
                                            <td><?=$index?><td>
                                            <td><?=$name?><td>
                                            <td><img src="./uploads/<?=$img?>" alt="<?=$name?>"><td>
                                            <td><?=$numberOfProduct?><td>
                                            <td><?=currency_format($price, "")?><td>
                                            <td style="text-align: right; padding-right: 20px;"><?=currency_format($total)?><td>
                                            </tr>
                                        <?php
                                            $index++;
                                        }
                                        ?>
                                    <tr>
                                        <td class = "total-bill-title" colspan="12">
                                            Tổng tiền cần thanh toán: <?=currency_format($allPricePay)?>
                                        </td>
                                    </tr>
                                    <?php
                                    } else {
                                    ?>
                                        <tr class="table-active">
                                        <td>1<td>
                                        <td>
                                            <?=$name?>
                                        <td>
                                        <td>
                                            <img src="<?=$img?>" alt="<?=$name?>">
                                        <td>
                                        <td>
                                            <?=$numberOfProduct?>
                                        <td>
                                        <td><?=currency_format($price, "")?><td>
                                        <td style="text-align: right; padding-right: 20px;">
                                            <?=currency_format($total, "")?>
                                        <td>
                                    </tr>
                                    <tr>
                                        <td class = "total-bill-title" colspan="12">
                                            Tổng cộng: <?=currency_format($total)?>
                                        </td>
                                    </tr>
                                    <?php
                                    }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="information-customer">
                    <h2 class = "title-information">Thông tin giao hàng </h2>
                    <form action="?act=xac-nhan-dat-hang" method = "POST" class = "row">
                        <div class="form-group group-input group-input col-12 col-md-6 col-lg-6 mt-2">
                            <label for="name">Tên: </label>
                            <input id="nameO" required name = "name" type="text" class="form-control" placeholder="Họ và tên">
                            <span class = "message_error"></span>
                            <?php
                                if($isCart) {
                                    echo '<input type="hidden" name="cart" value="'.$isCart.'"/>';
                                    echo '<input type="hidden" name="totalCart" value="'.$allPricePay.'"/>';
                                } else {
                                    echo '<input type="hidden" name="idProduct" value="'.$boughtProduct->getId().'">
                                    <input type="hidden" name="numberOfProduct" value="'.$numberOfProduct.'">
                                    <input type="hidden" name="totalBill" value="'.$total.'">';
                                }
                            ?>
                        </div>
                        <div class="form-group group-input group-input col-12 col-md-6 col-lg-6 mt-2">
                            <label for="phone">Số điện thoại: </label>
                            <input id="phoneO" required pattern="(\+84|0)\d{9,10}" name = "phone" type="phone" class="form-control" placeholder="Số điện thoại">
                            <span class = "message_error"></span>
                        </div>
                        <div class="form-group group-input group-input col-12 col-md-6 col-lg-6 mt-2">
                            <label for="email">Email: </label>
                            <input id="emailO" required name = "email" type="email" class="form-control" placeholder="Email">
                            <span class = "message_error"></span>
                        </div>
                        <div class="form-group group-input group-input col-12 col-md-6 col-lg-6 mt-2">
                            <label for="province"> Tỉnh / TP: </label>
                            <select id="provinceO" required class="form-select province" onchange="changeProvince(this)" name="province" aria-label="Default select example">
                                <option value="">Chọn tỉnh / TP</option>
                                <?php
                                    foreach ($allProvince as $province) {
                                        echo '<option value="'.$province->getProvince_id().'">
                                            '.$province->getName().'
                                        </option>';
                                    }
                                ?>
                            </select>
                            <span class = "message_error"></span>
                        </div>
                        <div class="form-group group-input group-input col-12 col-md-6 col-lg-6 mt-2">
                            <label for="district"> Quận / Huyện: </label>
                            <select id="districtO" required onchange="changeDistrict(this)" class="form-select district" name="district" aria-label="Default select example">
                                <!-- render ajax -->
                                <option value="">Chọn Quận / Huyện</option>
                            </select>
                            <span class = "message_error"></span>
                        </div>
                        <div class="form-group group-input group-input col-12 col-md-6 col-lg-6 mt-2">
                            <label for="wards">Xã / Phường: </label>
                            <select id="wardO" required class="form-select wards" name="wards" aria-label="Default select example">
                                <!-- render ajax -->
                                <option value="">Chọn Xã / Phường</option>
                            </select>
                            <span class = "message_error"></span>
                        </div>
                        <div class="form-group group-input group-input col-12 col-md-6 col-lg-6 mt-2">
                            <label for="wards">Địa chỉ cụ thể</label>
                            <input id="detailAddressO" required name = "address-details" type="text" class="form-control" placeholder="Địa chỉ cụ thể">
                            <span class = "message_error"></span>
                        </div>
                        <div class="group-input col-12 col-md-12 col-lg-12 mt-2">
                            <label for="">Phương thức thanh toán: </label>
                            <div class = "box-select-method active">
                                <input value="0" checked onclick="showMethodPay(this)" name = "methodPay" id="bank" type="radio"/>
                                <label for="bank">Thanh toán khi nhận hàng </label>
                                <div class="show-details-method">
                                    <p>Nếu Quý khách chọn hình thức Thanh toán khi nhận hàng COD thì ngoài 
                                        phí vận chuyển sẽ có thêm phí COD (phí thu hộ tiền áp dụng cho các
                                            đơn hàng ngoại tỉnh, TP.HCM không có phí này) từ nhà cung cấp dịch 
                                            vụ vận chuyển nên phí khi chọn hình thức này sẽ mắc hơn, Quý Khách 
                                            nên cân nhắc chuyển qua hình thức thanh toán Chuyển khoản trước qua
                                            Ngân Hàng để tiết kiệm chi phí.</p>
                                    <p>***Lưu ý: Hình thức Thanh toán khi nhận hàng COD chỉ áp dụng cho đơn 
                                        hàng trị giá từ 100.000VNĐ đến 2.000.000VNĐ.</p>
                                </div>
                            </div>
                            <div class = "box-select-method">
                                <input value="1" onclick="showMethodPay(this)" name = "methodPay" type="radio" id="cash"/>
                                <label for="cash">Chuyển khoản qua ngân hàng </label>
                                <div class="show-details-method">
                                    <p>Quý Khách sẽ được chuyển sang trang thanh toán bằng VNPAY</p>
                                </div>
                            </div>
                        </div>
                        <button id="btn-order-now" name="confirm-order" type="submit" class="btn-confirm-order">Xác nhận đặt hàng</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
<script>
    const title = document.querySelector('title');
    title.innerHTML = 'Tiến hành đặt hàng';
</script>
<script src = "https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.min.js" ></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
<script src='./assets/js/validation.js'></script>
<script>
    let regexEmailO = /^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|.(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    let fullnameO = document.querySelector('#nameO'),
        emailO = document.querySelector('#emailO'),
        phoneO = document.querySelector('#phoneO'),
        provinceO = document.querySelector('#provinceO'),
        districtO = document.querySelector('#districtO'),
        wardO = document.querySelector('#wardO'),
        detailAddressO = document.querySelector('#detailAddressO'),
        btnSubmitO = document.querySelector('#btn-order-now');
        const messageFullNameO = "Tên không được để trống",
            messageDetailAddressO = "Tên không được để trống",
            messageEmailO = "Email không hợp lệ",
            messagePhoneO = "Số điện thoại không hợp lệ",
            messageSelectO = "Hãy chọn trường này";
            ;
        // array to save all input to check, message show error of each and a string regex to check 
        const inputsToValidateCheckO = [
            { element: fullnameO, message: messageFullNameO, regex: /^.{1,}$/, type: "text", isEmpty: false},
            { element: detailAddressO, message: messageDetailAddressO, regex: /^.{1,}$/, type: "text", isEmpty: false},
            { element: provinceO, message: messageSelectO, regex: null, type: "select", isEmpty: false},
            { element: districtO, message: messageSelectO, regex: null, type: "select", isEmpty: false},
            { element: wardO, message: messageSelectO, regex: null, type: "select", isEmpty: false},
            { element: emailO, message: messageEmailO, regex: regexEmailO, type: "text", isEmpty: false},
            { element: phoneO , message: messagePhoneO, regex: /(84|0[3|5|7|8|9])+([0-9]{8})\b/g, type: "text", isEmpty: false}
        ];
        validation(inputsToValidateCheckO, btnSubmitO);
</script>
<script>
    // type 0 = province,1 = district, 2 = ward
    function changeProvince(province) {
        const value = province.value;
        $.ajax({
                url: `./User/components/address.php`,
                type: 'POST',
                dataType: 'html',
                data: {
                    data: value,
                    type: 0
                }
            }).done(function (response) {
                $('.district').html(response);
                $('.wards').html("");
            });
    }
    function changeDistrict(district) {
        const value = district.value;
        $.ajax({
                url: `./User/components/address.php`,
                type: 'POST',
                dataType: 'html',
                data: {
                    data: value,
                    type: 1
                }
            }).done(function (response) {
                $('.wards').html(response);
            });
    }

    function showMethodPay(methodPay) {
        const allMethodChooseActive = document.querySelector('.box-select-method.active');
        allMethodChooseActive.classList.remove('active');
        const parentMethod = methodPay.parentElement;
        parentMethod.classList.add("active")
    }
</script>
