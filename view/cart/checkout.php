<?php
$cart_item = isset($_SESSION['giohang']) ? $_SESSION['giohang'] : [];
$total_amount = 0;
?>

<!-- Checkout Start -->
<form action="index.php?act=bill" method="post">
    <div class="container-fluid">
        <div class="row px-xl-5">
            <div class="col-lg-8">
                <h5 class="section-title position-relative text-uppercase mb-3"><span class="bg-secondary pr-3">Thông tin đơn hàng</span></h5>
                <div class="col-lg-13 table-responsive mb-5">
                    <table class="table table-light table-borderless table-hover text-center mb-0">
                        <thead class="thead-dark">
                            <tr>
                                <th>Sản phẩm</th>
                                <th>Ảnh</th>
                                <th>Giá</th>
                                <th>Số lượng</th>
                                <th>Tổng giá</th>
                            </tr>
                        </thead>
                        <tbody class="align-middle">
                            <?php
                            $i = 0;
                            $tong = 0;
                            foreach ($_SESSION['giohang'] as $index => $cart) {
                                $hinh = $image_path . $cart[2];
                                $product_total = $cart[3] * $cart[4];
                                $tong += $product_total;
                                echo '
                                <tr data-index="' . $index . '">
                                    <td class="align-middle">' . $cart[1] . '</td>
                                    <td class="align-middle"><img src="' . $hinh . '" alt="" style="width: 50px;"></td>
                                    <td class="align-middle">$' . $cart[3] . '</td>
                                    <td class="align-middle">
                                        <div class="input-group quantity mx-auto" style="width: 100px;">
                                            <input type="text" class="form-control form-control-sm border-0 text-center" value="' . $cart[4] . '">
                                        </div>
                                    </td>
                                    <td class="align-middle product-total">$' . $product_total . '</td>
                                </tr>
                                ';
                                $i += 1;
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
                <h5 class="section-title position-relative text-uppercase mb-3"><span class="bg-secondary pr-3">Thông tin người nhận hàng</span></h5>
                <div class="bg-light p-30 mb-5">
                    <?php
                    if (isset($_SESSION['User'])) {
                        $name = $_SESSION['User']['name'];
                        $email = $_SESSION['User']['email'];
                        $phone = $_SESSION['User']['phone'];
                        $address = $_SESSION['User']['address'];
                    } else {
                        $name = '';
                        $email = '';
                        $phone = '';
                        $address = '';
                    }
                    ?>
                    <div class="row">
                        <div class="col-md-6 form-group">
                            <label>Tên</label>
                            <input class="form-control" type="text" placeholder="Tuấn" name="name" value="<?= $name ?>">
                        </div>
                        <div class="col-md-6 form-group">
                            <label>E-mail</label>
                            <input class="form-control" type="text" placeholder="example@email.com" name="email" value="<?= $email ?>">
                        </div>
                        <div class="col-md-6 form-group">
                            <label>Số điện thoại</label>
                            <input class="form-control" type="text" placeholder="+123 456 789" name="phone" value="<?= $phone ?>">
                        </div>
                        <div class="col-md-6 form-group">
                            <label>Địa chỉ</label>
                            <input class="form-control" type="text" placeholder="123 Street" name="address" value="<?= $address ?>">
                        </div>
                        <div class="col-md-12">
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="shipto">
                                <label class="custom-control-label" for="shipto" data-toggle="collapse" data-target="#shipping-address">Giao đến địa chỉ khác</label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="collapse mb-5" id="shipping-address">
                    <h5 class="section-title position-relative text-uppercase mb-3"><span class="bg-secondary pr-3">Địa chỉ giao hàng</span></h5>
                    <div class="bg-light p-30">
                        <div class="row">
                            <div class="col-md-6 form-group">
                                <label>Họ</label>
                                <input class="form-control" type="text" placeholder="Doãn" name="ship_first_name">
                            </div>
                            <div class="col-md-6 form-group">
                                <label>Tên</label>
                                <input class="form-control" type="text" placeholder="Ngọc" name="ship_last_name">
                            </div>
                            <div class="col-md-6 form-group">
                                <label>E-mail</label>
                                <input class="form-control" type="text" placeholder="example@email.com" name="ship_email">
                            </div>
                            <div class="col-md-6 form-group">
                                <label>Số điện thoại</label>
                                <input class="form-control" type="text" placeholder="+123 456 789" name="ship_phone">
                            </div>
                            <div class="col-md-6 form-group">
                                <label>Địa chỉ</label>
                                <input class="form-control" type="text" placeholder="123 Street" name="ship_address">
                            </div>
                            <div class="col-md-6 form-group">
                                <label>Thành phố</label>
                                <input class="form-control" type="text" placeholder="Yên Bái" name="ship_city">
                            </div>
                            <div class="col-md-6 form-group">
                                <label>Tỉnh</label>
                                <input class="form-control" type="text" placeholder="Yên Bái" name="ship_province">
                            </div>
                            <div class="col-md-6 form-group">
                                <label>ZIP Code</label>
                                <input class="form-control" type="text" placeholder="123" name="ship_zip">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <h5 class="section-title position-relative text-uppercase mb-3"><span class="bg-secondary pr-3">Tổng đơn hàng</span></h5>
                <div class="bg-light p-30 mb-5">
                    <div class="border-bottom">
                        <h6 class="mb-3">Products</h6>
                        <?php
                        foreach ($cart_item as $item) {
                            $price_total = $item[3] * $item[4];
                            $total_amount += $price_total;
                            echo '<div class="d-flex justify-content-between">
                                <p>' . $item[1] . ' (x' . $item[4] . ')</p>
                                <p>$' . $price_total . '</p>
                            </div>';
                        }
                        ?>
                    </div>
                    <div class="border-bottom pt-3 pb-2">
                        <div class="d-flex justify-content-between mb-3">
                            <h6>Tổng phụ</h6>
                            <h6><?php echo '$' . $total_amount; ?></h6>
                        </div>
                        <div class="d-flex justify-content-between">
                            <h6 class="font-weight-medium">Phí vận chuyển</h6>
                            <h6 class="font-weight-medium">$10</h6>
                        </div>
                    </div>
                    <div class="pt-2">
                        <div class="d-flex justify-content-between mt-2">
                            <h5>Tổng tiền</h5>
                            <h5><?php echo '$' . ($total_amount + 10); ?></h5>
                        </div>
                    </div>
                </div>
                <div class="mb-5">
                    <h5 class="section-title position-relative text-uppercase mb-3"><span class="bg-secondary pr-3">Phương thức thanh toán</span></h5>
                    <div class="bg-light p-30">
                        <div class="form-group">
                            <div class="custom-control custom-radio">
                                <input type="radio" class="custom-control-input" name="payment_methods" id="paypal" value="Thanh toán qua chuyển khoản">
                                <label class="custom-control-label" for="paypal">1. Thanh toán qua chuyển khoản</label>
                            </div>
                        </div>
                        <div class="form-group mb-4">
                            <div class="custom-control custom-radio">
                                <input type="radio" class="custom-control-input" name="payment_methods" id="banktransfer" value="Thanh toán sau khi nhận hàng">
                                <label class="custom-control-label" for="banktransfer">2. Thanh toán sau khi nhận hàng</label>
                            </div>
                        </div>
                        <input type="submit" id="dathang" name="dathang" class="btn btn-block btn-primary font-weight-bold py-3" value="Đặt hàng">
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>
<!-- Checkout End -->