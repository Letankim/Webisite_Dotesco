<div class="container col-lg-9 col-12 col-sm-12 col-md-7">
            <div class="card-group card_header_product row m-0 mt-xl-5">
                <div class="information-bill p-0">
                    <h2 class = "title-information">Thông tin giỏ hàng </h2>
                    <div class="details-bill">
                        <table>
                            <thead>
                                <td style="width: 20px">STT<td>
                                <td>Tên<td>
                                <td>Hình ảnh<td>
                                <td>Số lượng<td>
                                <td>Giá<td>
                                <td style="text-align: right; padding-right: 20px;">Thành tiền<td>
                                <td>Xóa<td>
                            </thead>
                            <tbody>
                                <?php
                                    if(!empty($allCart)) {
                                        $index = 1;
                                        $allPricePay = 0;
                                        foreach ($allCart as $cartItem) {
                                            $id = $cartItem->getId();
                                            $numberOfProduct = $cartItem->getNumberOfProduct();
                                            $name = $cartItem->getName();
                                            $price = $cartItem->getPrice();
                                            $img = $cartItem->getImg();
                                            $total = $cartItem->getTotal();
                                            $allPricePay+=$total;
                                        ?>
                                            <tr class="table-active">
                                                <td style="width: 20px"><?=$index?><td>
                                                <td><?=$name?><td>
                                                <td><img src="./uploads/<?=$img?>" alt="<?=$name?>"><td>
                                                <td><?=$numberOfProduct?><td>
                                                <td><?=currency_format($price, "")?><td>
                                                <td style="text-align: right; padding-right: 20px;"><?=currency_format($total, "")?><td>
                                                <td>
                                                    <a 
                                                    href="?act=deleteItemCart&idCart=<?=($index-1)?>"
                                                    onclick="return confirm('Bạn có chắc muốn xóa sản phẩm này khỏi giỏ hàng?')"
                                                    >
                                                    <i class='bx bx-x'></i>
                                                    </a>
                                                <td>
                                            </tr>
                                        <?php
                                            $index++;
                                        }
                                        ?>
                                        <tr>
                                            <td class = "total-bill-title" colspan="14">
                                                Tổng giỏ hàng: <?=currency_format($allPricePay, "VNĐ")?>
                                            </td>
                                        </tr>
                                    <?php
                                    } else {
                                    ?>
                                        <tr>
                                            <td colspan="14">Chưa có sản phẩm nào</td>
                                        </tr>
                                    <?php
                                    }
                                ?>
                            </tbody>
                        </table>
                    </div>
                    <div>
                        <?php
                            if(!empty($allCart)) {
                        ?>
                                <a href="./?act=don-hang&isCart=true" class = "btn-order">
                                    Tiến hành đặt hàng
                                </a>
                                <a 
                                href="./?act=xoa-gio-hang&isDeleted=true" 
                                class = "btn-order deleteCart" 
                                onclick="return confirm('Bạn có chắc muốn xóa toàn bộ giỏ hàng?')"
                                >
                                    Xóa tất cả giỏ hàng
                                </a>
                            <?php
                            } else {
                                echo "";
                            }
                        ?>
                        <br>
                        <a href='./?act=san-pham' class = 'btn-order'>Tiếp tục mua hàng</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
</section><script>
    const title = document.querySelector('title');
    title.innerHTML = 'Giỏ hàng';
</script>
