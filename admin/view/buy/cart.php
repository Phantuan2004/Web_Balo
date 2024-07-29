<div class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Đơn hàng</h3>
                </div>
                <div class="card-body">
                    <div class="table-container">
                        <table class="table table-striped">
                            <thead>
                                <tr class="text-primary">
                                    <th></th>
                                    <th>STT</th>
                                    <th>ID Người dùng</th>
                                    <th>ID sản phẩm</th>
                                    <th>Tên sản phẩm</th>
                                    <th>Hình ảnh</th>
                                    <th>Số lượng</th>
                                    <th>Giá</th>
                                    <th>Tổng tiền</th>
                                    <th>Ngày đặt hàng</th>
                                    <th>Mã đơn hàng</th>
                                    <th>Thao tác</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                // Vòng lặp foreach để lặp qua mảng $listbinhluan và hiển thị thông tin của từng bình luận trong bảng.
                                foreach ($dsgiohang as $donhang) {
                                    // Trích xuất các phần tử trong mảng $binhluan thành các biến riêng lẻ.
                                    extract($donhang);
                                    $order_code = "$id_bill";
                                    $xoa_cart = "index.php?act=delete_id_cart&id_cart=" . $id_cart;
                                    $hinhpath = "../upload/" . $product_image;
                                    if (is_file($hinhpath)) {
                                        $hinhpath = "<img src= '" . $hinhpath . "' width='100px' height='100px'>";
                                    } else {
                                        $hinhpath = "No file img!";
                                    }

                                    echo '<tr>
                                        <td><input type="checkbox" name="" id=""></td>
                                        <td>' . $id_cart . '</td>
                                        <td>' . $iduser . '</td>
                                        <td>' . $id_product . '</td>
                                        <td>' . $product_name . '</td>
                                        <td>' . $hinhpath . '</td>
                                        <td>' . $product_quantity . '</td>
                                        <td>$' . $product_new_price . '</td>
                                        <td>$' . $product_total . '</td>
                                        <td>' . $date . '</td>
                                        <td>' . $order_code . '</td>
                                        <td><a href="' . $xoa_cart . '"><input class="btn btn-primary" type ="button" value="Xóa sản phẩm" onclick="return confirm(\'Bạn có chắc chắn muốn xóa sản phẩm này ???\')"></a></td>
                                    </tr>';
                                }
                                ?>
                            </tbody>
                        </table>
                        <div class="row mb10" style="margin: 0 0 0 0.1rem">
                            <input type="button" class="btn btn-primary" value="Chọn tất cả" onclick="selectAll()">
                            <input type="button" class="btn btn-primary" value="Bỏ tất cả" onclick="deselectAll()">
                            <input type="button" class="btn btn-primary" value="Xóa các mục đã chọn" onclick="deleteSelected()">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>

<script>
    function selectAll() {
        var checkboxes = document.querySelectorAll('input[type="checkbox"]');
        checkboxes.forEach(checkbox => checkbox.checked = true);
    }

    function deselectAll() {
        var checkboxes = document.querySelectorAll('input[type="checkbox"]');
        checkboxes.forEach(checkbox => checkbox.checked = false);
    }

    function deleteSelected() {
        if (confirm('Bạn có chắc chắn muốn xóa các mục đã chọn?')) {
            document.querySelector('form').submit();
        }
    }
</script>