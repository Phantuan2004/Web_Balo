<div class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Danh sách bình luận</h3>
                </div>
                <div class="card-body">
                    <div class="table-container">
                        <table class="table table-striped">
                            <thead>
                                <tr class="text-primary">
                                    <th style="position: sticky; top: 0; background-color: white; z-index: 1;"></th>
                                    <th style="position: sticky; top: 0; background-color: white; z-index: 1;">ID</th>
                                    <th style="position: sticky; top: 0; background-color: white; z-index: 1;">Tài khoản</th>
                                    <th style="position: sticky; top: 0; background-color: white; z-index: 1;">Sản phẩm</th>
                                    <th style="position: sticky; top: 0; background-color: white; z-index: 1;">Nội dung bình luận</th>
                                    <th style="position: sticky; top: 0; background-color: white; z-index: 1;">Ngày bình luận</th>
                                    <th style="position: sticky; top: 0; background-color: white; z-index: 1;">Thao tác</th>
                                </tr>
                                <?php
                                // Vòng lặp foreach để lặp qua mảng $listbinhluan và hiển thị thông tin của từng bình luận trong bảng.
                                foreach ($dsbl as $binhluan) {
                                    // Trích xuất các phần tử trong mảng $binhluan thành các biến riêng lẻ.
                                    extract($binhluan);
                                    $xoabl = "index.php?act=xoabl&id=" . $id;

                                    echo '<tr>
                                        <td><input type="checkbox" name="" id=""></td>
                                        <td>' . $id . '</td>
                                        <td>' . $iduser . '</td>
                                        <td>' . $id_product . '</td>
                                        <td>' . $content . '</td>
                                        <td>' . $date . '</td>
                                        <td><a href="' . $xoabl . '"><input class="btn btn-primary" type ="button" value="Xóa" onclick="return confirm(\'Bạn có chắc chắn muốn xóa\')"></a></td>
                                    </tr>';
                                }
                                ?>
                            </thead>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row mb10" style="margin: auto 0;">
        <input type="button" class="btn btn-primary" value="Chọn tất cả" onclick="selectAll()">
        <input type="button" class="btn btn-primary" value="Bỏ tất cả" onclick="deselectAll()">
        <input type="button" class="btn btn-primary" value="Xóa các mục đã chọn" onclick="deleteSelected()">
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