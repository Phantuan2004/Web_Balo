<div class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Hóa đơn</h3>
                </div>
                <div class="card-body">
                    <div class="table-container">
                        <table class="table table-striped">
                            <thead>
                                <tr class="text-primary">
                                    <th style="position: sticky; top: 0; background-color: white; z-index: 1;"></th>
                                    <th style="position: sticky; top: 0; background-color: white; z-index: 1;">STT</th>
                                    <th style="position: sticky; top: 0; background-color: white; z-index: 1;">Mã Hoá đơn</th>
                                    <th style="position: sticky; top: 0; background-color: white; z-index: 1;">ID Người dùng</th>
                                    <th style="position: sticky; top: 0; background-color: white; z-index: 1;">Tên</th>
                                    <th style="position: sticky; top: 0; background-color: white; z-index: 1;">Email</th>
                                    <th style="position: sticky; top: 0; background-color: white; z-index: 1;">Số điện thoại</th>
                                    <th style="position: sticky; top: 0; background-color: white; z-index: 1;">Địa chỉ</th>
                                    <th style="position: sticky; top: 0; background-color: white; z-index: 1;">Tổng giá</th>
                                    <th style="position: sticky; top: 0; background-color: white; z-index: 1;">Hình thức thanh toán</th>
                                    <th style="position: sticky; top: 0; background-color: white; z-index: 1;">Ngày đặt hàng</th>
                                    <th style="position: sticky; top: 0; background-color: white; z-index: 1;">Trạng thái</th>
                                    <th style="position: sticky; top: 0; background-color: white; z-index: 1;">Thao tác</th>
                                    <th style="position: sticky; top: 0; background-color: white; z-index: 1;"></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                // Vòng lặp foreach để lặp qua mảng $listbinhluan và hiển thị thông tin của từng bình luận trong bảng.
                                foreach ($dshd as $hoadon) {
                                    // Trích xuất các phần tử trong mảng $binhluan thành các biến riêng lẻ.
                                    extract($hoadon);
                                    $order_code = "ABC-" . $id_bill . "";
                                    $delete_bill = "index.php?act=delete_bill&id_bill=" . $id_bill;
                                    echo '<tr>
                                        <td><input type="checkbox" name="" id=""></td>
                                        <td>' . $id_bill . '</td>
                                        <td>' . $order_code . '</td>
                                        <td>' . $iduser . '</td>
                                        <td>' . $name . '</td>
                                        <td>' . $email . '</td>
                                        <td>$' . $phone . '</td>
                                        <td>' . $address . '</td>
                                        <td>' . $total_price . '</td>
                                        <td>' . $payment_methods . '</td>
                                        <td>' . $bill_date . '</td>
                                        <td>' . $status . '</td>
                                        <td style="display: flex"> 
                                        <a href="' . $delete_bill . '"><input class="btn btn-primary" type ="button" value="Xóa" onclick="return confirm(\'Bạn có chắc chắn muốn xóa hóa đơn này ??? \')"></a>
                                    </td>
                                    </tr>';
                                }
                                ?>
                            </tbody>
                        </table>
                        <div class="row mb10" style="margin: 0 0 0 1px">
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