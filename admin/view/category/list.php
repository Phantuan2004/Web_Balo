<div class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Danh sách danh mục</h3>
                </div>
                <div class="card-body">
                    <div class="table-container" style="width: 1147px; height: 400px; overflow: auto;">
                        <p><a href="index.php?act=adddm">Thêm danh mục</a></p>
                        <table class="table table-striped">
                            <thead class="text-primary">
                                <tr>
                                    <th style="position: sticky; top: 0; background-color: white; z-index: 1;"></th>
                                    <th style="position: sticky; top: 0; background-color: white; z-index: 1;">STT</th>
                                    <th style="position: sticky; top: 0; background-color: white; z-index: 1;">Tên danh mục</th>
                                    <th style="position: sticky; top: 0; background-color: white; z-index: 1;">Thao tác</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                foreach ($dsdm as $loai) {
                                    extract($loai);
                                    $suadm = "index.php?act=suadm&id_category=" . $id_category;
                                    $xoadm = "index.php?act=xoadm&id_category=" . $id_category;
                                    echo '<tr>
                                            <td><input type="checkbox" id_category="" category_name=""></td>
                                            <td>' . $id_category . '</td>
                                            <td>' . $category_name . '</td>
                                            <td style="display: flex">
                                                <a href="' . $suadm . '"><input class="btn btn-primary" type="button" value="Sửa"> </a>  
                                                <a href="' . $xoadm . '"><input class="btn btn-primary" type ="button" value="Xóa" onclick="return confirm(\'Bạn có chắc chắn muốn xóa\')"></a>
                                            </td>
                                        </tr>';
                                }
                                ?>
                            </tbody>
                        </table>
                        <div class="row mb10" style="margin: 0 auto">
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