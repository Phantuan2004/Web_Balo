<!-- Mybill -->
<h1 class="text-center">Đơn hàng của tôi</h1>
<div class="container-fluid">
    <div class="row px-xl-5 d-flex justify-content-center">
        <div class="col-lg-8 table-responsive mb-5">
            <table class="table table-light table-borderless table-hover text-center mb-0">
                <thead class="thead-dark">
                    <tr>
                        <th>Mã đơn hàng</th>
                        <th>Ngày đặt</th>
                        <th>Số lượng</th>
                        <th>Tổng giá</th>
                        <th>Trạng thái</th>
                        <th>Hủy đơn hàng</th>
                    </tr>
                </thead>
                <tbody class="align-middle">
                    <?php
                    if (is_array($listbill)) {
                        foreach ($listbill as $bill) {
                            extract($bill);
                            $trangthai = get_trangthai($bill['status']);
                            $count_product = loadone_cart_count($bill['id_bill']);
                    ?>
                            <tr>
                                <td>ABC-<?php echo $bill['id_bill']; ?></td>
                                <td><?php echo $bill['bill_date']; ?></td>
                                <td><?php echo $count_product; ?></td>
                                <td>$<?php echo $bill['total_price']; ?></td>
                                <td><?php echo $trangthai; ?></td>
                                <td class="align-middle">
                                    <button class="btn btn-sm btn-danger delete-bill-btn" data-id="<?php echo $bill['id_bill']; ?>">
                                        <i class="fa fa-times"></i>
                                    </button>
                                </td>
                            </tr>
                    <?php
                        }
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<!-- Mybill -->

<script>
    // Xác nhận xóa và chuyển hướng
    document.addEventListener('DOMContentLoaded', function() {
        var deleteButtons = document.querySelectorAll('.delete-bill-btn');

        deleteButtons.forEach(function(button) {
            button.addEventListener('click', function() {
                var id_bill = button.getAttribute('data-id');
                if (confirm('Bạn có chắc muốn xóa đơn hàng này không?')) {
                    window.location.href = 'index.php?act=delete_bill&id_bill=' + id_bill;
                }
            });
        });
    });
</script>