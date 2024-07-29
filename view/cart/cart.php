<!-- Breadcrumb Start -->
<div class="container-fluid">
    <div class="row px-xl-5">
        <div class="col-12">
            <nav class="breadcrumb bg-light mb-30">
                <a class="breadcrumb-item text-dark" href="#">Home</a>
                <a class="breadcrumb-item text-dark" href="#">Shop</a>
                <span class="breadcrumb-item active">Shopping Cart</span>
            </nav>
        </div>
    </div>
</div>
<!-- Breadcrumb End -->

<!-- Cart Start -->
<div class="container-fluid">
    <div class="row px-xl-5">
        <div class="col-lg-8 table-responsive mb-5">
            <table class="table table-light table-borderless table-hover text-center mb-0">
                <thead class="thead-dark">
                    <tr>
                        <th>Sản phẩm</th>
                        <th>Ảnh</th>
                        <th>Giá</th>
                        <th>Số lượng</th>
                        <th>Tổng giá</th>
                        <th>Xóa</th>
                    </tr>
                </thead>
                <tbody class="align-middle">
                    <?php
                    if (!isset($_SESSION['giohang'])) {
                        $_SESSION['giohang'] = [];
                    }
                    $i = 0;
                    $tong = 0;
                    foreach ($_SESSION['giohang'] as $index => $cart) {
                        $hinh = $image_path . $cart[2];
                        $product_total = $cart[3] * $cart[4];
                        $tong += $product_total;
                        $product_delete = '<a href="index.php?act=deletecart&idcart=' . $index . '"><i type="button" class="fa fa-times"></i></a>';
                        echo '
                            <tr data-index="' . $index . '">
                                <td class="align-middle">' . $cart[1] . '</td>
                                <td class="align-middle"><img src="' . $hinh . '" alt="" style="width: 50px;"></td>
                                <td class="align-middle">$' . $cart[3] . '</td>
                                <td class="align-middle">
                                    <div class="input-group quantity mx-auto" style="width: 100px;">
                                        <div class="input-group-btn">
                                            <button class="btn btn-sm btn-primary btn-minus" data-index="' . $index . '">
                                                <i class="fa fa-minus"></i>
                                            </button>
                                        </div>
                                        <input type="text" class="form-control form-control-sm bg-secondary border-0 text-center quantity-input" value="' . $cart[4] . '">
                                        <div class="input-group-btn">
                                            <button class="btn btn-sm btn-primary btn-plus" data-index="' . $index . '">
                                                <i class="fa fa-plus"></i>
                                            </button>
                                        </div>
                                    </div>
                                </td>
                                <td class="align-middle product-total">$' . $product_total . '</td>
                                <td class="align-middle"><button class="btn btn-sm btn-danger">' . $product_delete . '</button></td>
                            </tr>
                        ';
                        $i += 1;
                    }
                    ?>
                </tbody>
            </table>
        </div>
        <div class="col-lg-4">
            <form class="mb-30" action="">
                <div class="input-group">
                    <input type="text" class="form-control border-0 p-4" placeholder="Mã giảm giá">
                    <div class="input-group-append">
                        <button class="btn btn-primary">Áp dụng</button>
                    </div>
                </div>
            </form>
            <h5 class="section-title position-relative text-uppercase mb-3"><span class="bg-secondary pr-3">Tóm tắt giỏ hàng</span></h5>
            <div class="bg-light p-30 mb-5">
                <div class="border-bottom pb-2">
                    <div class="d-flex justify-content-between mb-3">
                        <h6>Tổng phụ</h6>
                        <h6 id="cart-subtotal">$<?php echo $tong; ?></h6>
                    </div>
                    <div class="d-flex justify-content-between">
                        <h6 class="font-weight-medium">Phí vận chuyển</h6>
                        <h6 class="font-weight-medium">$10</h6>
                    </div>
                </div>
                <div class="pt-2">
                    <div class="d-flex justify-content-between mt-2">
                        <h5>Tổng tiền</h5>
                        <h5 id="cart-total">$<?php echo $tong + 10; ?></h5>
                    </div>
                    <a href="index.php?act=deletecart"><button class="btn btn-block btn-primary font-weight-bold my-3 py-3">Xóa giỏ hàng</button></a>
                    <a href="index.php?act=checkout">
                        <button class="btn btn-block btn-primary font-weight-bold my-3 py-3">Tiến hành thanh toán</button>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Cart End -->

<script>
    function updateCart(index, delta) {
        const xhr = new XMLHttpRequest();
        xhr.open('POST', 'index.php?act=updatecart', true);
        xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
        xhr.onreadystatechange = function() {
            if (xhr.readyState === 4 && xhr.status === 200) {
                location.reload();
            }
        };
        xhr.send('index=' + index + 'delta=' + delta);
    }


    document.addEventListener('DOMContentLoaded', function() {
        document.querySelectorAll('.btn-minus').forEach(button => {
            button.addEventListener('click', function() {
                const index = this.getAttribute('data-index');
                updateCart(index, -1);
            });
        });

        document.querySelectorAll('.btn-plus').forEach(button => {
            button.addEventListener('click', function() {
                const index = this.getAttribute('data-index');
                updateCart(index, 1);
            });
        });
    });
</script>