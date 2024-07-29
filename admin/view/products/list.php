<style>
    .form-action input,
    .form-action select {
        width: 10rem;
        height: 25px;
    }

    .form-action input[type="submit"],
    .form-action input[type="button"] {
        width: 5.5rem;
    }
</style>
<div class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Danh sách sản phẩm</h3>
                </div>
                <p><a style="padding-left: 1rem;" href="index.php?act=add_product">Thêm sản phẩm</a></p>
                <form class="form-action" action="index.php?act=product" method="post" style="padding-left: 1rem;">
                    <input type="text" name="keyw" placeholder="Tìm kiếm sản phẩm">
                    <select name="id_category">
                        <option value="0" selected>Tất cả</option>
                        <?php
                        foreach ($dsdm as $danhmuc) {
                            extract($danhmuc);
                            echo '<option value="' . $id_category . '">' . $category_name . '</option>';
                        }
                        ?>
                    </select>
                    <input type="submit" name="clickOK" value="Tìm kiếm">
                    <a href="index.php?act=product"><input type="button" value="Danh sách"></a>
                </form>

                <div class="card-body">
                    <div class="table-container">
                        <form action="index.php?act=delete_selected_products" id="deleteSelected" method="post">
                            <table class="table table-striped">
                                <thead>
                                    <tr class="text-primary">
                                        <th style="position: sticky; top: 0; background-color: white; z-index: 1;"></th>
                                        <th style="position: sticky; top: 0; background-color: white; z-index: 1;">Mã</th>
                                        <th style="position: sticky; top: 0; background-color: white; z-index: 1;">Tên sản phẩm</th>
                                        <th style="position: sticky; top: 0; background-color: white; z-index: 1;">Giá cũ</th>
                                        <th style="position: sticky; top: 0; background-color: white; z-index: 1;">Giá mới</th>
                                        <th style="position: sticky; top: 0; background-color: white; z-index: 1;">Hình</th>
                                        <th style="position: sticky; top: 0; background-color: white; z-index: 1;">Mô tả</th>
                                        <th style="position: sticky; top: 0; background-color: white; z-index: 1;">Lượt xem</th>
                                        <th style="position: sticky; top: 0; background-color: white; z-index: 1;">Danh mục</th>
                                        <th style="position: sticky; top: 0; background-color: white; z-index: 1;">Trạng thái</th>
                                        <th style="position: sticky; top: 0; background-color: white; z-index: 1;">Thao tác</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    if (!empty($dssp)) {
                                        foreach ($dssp as $sp) {
                                            extract($sp);
                                            $suasp = "index.php?act=edit_product&id_product=" . $id_product;
                                            $xoasp = "index.php?act=delete_product&id_product=" . $id_product;
                                            $hinhpath = "../upload/" . $product_image;
                                            if (is_file($hinhpath)) {
                                                $hinhpath = "<img src= '" . $hinhpath . "' width='150px' height='50px'>";
                                            } else {
                                                $hinhpath = "No file img!";
                                            }

                                            $status = ($id_status_product == 1) ? 'Còn hàng' : 'Hết hàng';
                                            echo '<tr>
                                                    <td><input type="checkbox" name="product_ids[]" value="' . $id_product . '"></td>
                                                    <td>' . $id_product . '</td>
                                                    <td>' . $product_name . '</td>
                                                    <td>' . (!empty($product_old_price) ? '$' . $product_old_price : '') . '</td>
                                                    <td>$' . $product_new_price . '</td>
                                                    <td>' . $hinhpath . '</td>
                                                    <td>' . $product_mota . '</td>
                                                    <td>' . $product_view . '</td>
                                                    <td>' . $id_category . '</td>
                                                    <td>' . $status . '</td>
                                                    <td style="display: flex">
                                                        <a href="' . $suasp . '"><input class="btn btn-primary" type="button" value="Sửa"></a>
                                                        <a href="' . $xoasp . '"><input class="btn btn-primary" type="button" value="Xóa" onclick="return confirm(\'Bạn có chắc chắn muốn xóa\')"></a>
                                                    </td>
                                                </tr>';
                                        }
                                    } else {
                                        echo '<tr><td colspan="11" class="text-center">Không có dữ liệu để hiển thị.</td></tr>';
                                    }
                                    ?>
                                </tbody>
                            </table>
                            <div class="row mb10" style="margin: 0 auto">
                                <input type="button" class="btn btn-primary" value="Chọn tất cả" onclick="selectAll()">
                                <input type="button" class="btn btn-primary" value="Bỏ tất cả" onclick="deselectAll()">
                                <input type="submit" class="btn btn-primary" value="Xóa các mục đã chọn" onclick="deleteSelected(event)">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div>

        <script>
            function selectAll() {
                var checkboxes = document.querySelectorAll('input[type="checkbox"]');
                checkboxes.forEach(checkbox => checkbox.checked = true);
            }

            function deselectAll() {
                var checkboxes = document.querySelectorAll('input[type="checkbox"]');
                checkboxes.forEach(checkbox => checkbox.checked = false);
            }

            function deleteSelected(event) {
                if (!confirm('Bạn có chắc chắn muốn xóa các mục đã chọn?')) {
                    event.preventDefault();
                }
            }
        </script>