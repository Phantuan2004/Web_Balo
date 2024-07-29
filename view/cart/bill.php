<!-- Bill Start -->
<h1 class="text-center">Hóa đơn thanh toán</h1>
<form style="margin: auto 0;" action="index.php?act=bill" method="post">
    <div class="container-fluid">
        <div class="row px-xl-5">
            <div class="col-lg-12">
                <?php
                echo '<a style=" margin: -102px -63px 0 0;" href="index.php?act=deletecart" class="float-right">
        <input style="width:140px;" value="Trở về giỏ hàng" class="btn btn-block btn-primary font-weight-bold my-3">
      </a>';
                ?>
                <div class="mb-5">
                    <h4 class="text-center">Bạn đã đặt hàng thành công, vui lòng xem lại thông tin hóa đơn</h4>
                    <h5 class="section-title position-relative text-uppercase mb-3">
                        <span class="bg-secondary pr-3">Cảm ơn quý khách</span>
                    </h5>
                    <div class="bg-light p-30">
                        <p class="text-center">
                            Cảm ơn bạn đã đặt hàng tại <span class="font-weight-bold text-primary">Cửa hàng</span> của chúng tôi. Chúng tôi sẽ liên lạc với bạn trong thời gian sớm nhất.
                        </p>
                    </div>
                </div>

                <?php
                if (isset($bill) && is_array($bill)) ?>
                <div class="mb-5">
                    <h5 class="section-title position-relative text-uppercase mb-3">
                        <span class="bg-secondary pr-3">Thông tin đơn hàng</span>
                    </h5>
                    <?php
                    echo '<div class="bg-light p-30" style="display: flex; justify-content: space-around">
                                <li>Mã đơn hàng của bạn là: <h5><span class="font-weight-bold text-primary">' . $order_code . '</span></h5></li>
                                <li>Ngày đặt hàng: <h5><span class="font-weight-bold text-primary">' . $bill_date . '</span></h5></li>
                                <li>Tổng đơn hàng: <h5><span class="font-weight-bold text-primary">' . $total_price . '</span></h5></li>
                                <li>Phương thức thanh toán: <h5><span class="font-weight-bold text-primary">' . $payment_methods . '</span></h5></li>
                            </div>'
                    ?>
                </div>

                <h5 class="section-title position-relative text-uppercase mb-3">
                    <span class="bg-secondary pr-3">Thông tin đơn hàng</span>
                </h5>
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
                            if (isset($_SESSION['giohang']) && (is_array($_SESSION['giohang']))) {
                                if (sizeof($_SESSION['giohang']) > 0) {
                                    $tong = 0;
                                    for ($i = 0; $i < sizeof($_SESSION['giohang']); $i++) {
                                        $hinh = $image_path . $_SESSION['giohang'][$i]['2'];
                                        $product_total = $_SESSION['giohang'][$i]['3'] * $_SESSION['giohang'][$i]['4'];
                                        $tong += $product_total;
                                        $product_image = $_SESSION['giohang'][$i]['2'];
                                        echo '
                                        <tr>
                                            <td class="align-middle">' . $_SESSION['giohang'][$i]['1'] . '</td>
                                            <td class="align-middle"><img src="' . $hinh . '" alt="" style="width: 50px;"></td>
                                            <td class="align-middle">$' . $_SESSION['giohang'][$i]['3'] . '</td>
                                            <td class="align-middle">
                                                <div class="input-group quantity mx-auto" style="width: 100px;">
                                                    <input type="text" class="form-control form-control-sm border-0 text-center" value="' . $_SESSION['giohang'][$i]['4'] . '">
                                                </div>
                                            </td>
                                            <td class="align-middle product-total">$' . $product_total . '</td>
                                        </tr>
                                        ';
                                    }
                                }
                            }
                            ?>
                        </tbody>
                    </table>
                </div>

                <h5 class="section-title position-relative text-uppercase mb-3">
                    <span class="bg-secondary pr-3">Thông tin người nhận hàng</span>
                </h5>

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
                <div class="bg-light p-30 mb-5">
                    <div class="row">
                        <div class="col-md-6 form-group">
                            <label>Tên</label>
                            <input class="form-control" type="text" placeholder="Tuấn" name="name" readonly value="<?= $name ?>">
                        </div>
                        <div class="col-md-6 form-group">
                            <label>E-mail</label>
                            <input class="form-control" type="text" placeholder="example@email.com" name="email" readonly value="<?= $email ?>">
                        </div>
                        <div class="col-md-6 form-group">
                            <label>Số điện thoại</label>
                            <input class="form-control" type="text" placeholder="+123 456 789" name="phone" readonly value="<?= $phone ?>">
                        </div>
                        <div class="col-md-6 form-group">
                            <label>Địa chỉ</label>
                            <input class="form-control" type="text" placeholder="123 Street" name="address" readonly value="<?= $address ?>">
                        </div>
                    </div>
                </div>
            </div>
        </div>
</form>
<!-- Bill End -->