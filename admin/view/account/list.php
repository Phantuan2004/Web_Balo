<div class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Danh sách tài khoản</h3>
                </div>

                <form class="form-action" action="index.php?act=user" method="post" style="padding-left: 1rem;">
                    <input style="width: 20%; height: 5.5vh;" type="text" name="id_account" placeholder="Tìm kiếm tài khoản">
                    <input class="btn btn-primary" type="submit" name="account" value="Tìm kiếm">
                    <a href="index.php?act=user"><input class="btn btn-primary" type="button" value="Danh sách"></a>
                </form>

                <div class="card-body">
                    <div class="table-container">
                        <table class="table table-striped">
                            <thead>
                                <tr class="text-primary">
                                    <th style="position: sticky; top: 0; background-color: white; z-index: 1;"></th>
                                    <th style="position: sticky; top: 0; background-color: white; z-index: 1;">Mã tài khoản</th>
                                    <th style="position: sticky; top: 0; background-color: white; z-index: 1;">Tài khoản</th>
                                    <th style="position: sticky; top: 0; background-color: white; z-index: 1;">Mật khẩu</th>
                                    <th style="position: sticky; top: 0; background-color: white; z-index: 1;">Email</th>
                                    <th style="position: sticky; top: 0; background-color: white; z-index: 1;">Điện thoại</th>
                                    <th style="position: sticky; top: 0; background-color: white; z-index: 1;">Địa chỉ</th>
                                    <th style="position: sticky; top: 0; background-color: white; z-index: 1;">Vai trò</th>
                                    <th style="position: sticky; top: 0; background-color: white; z-index: 1;">Thao tác</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                if (!empty($ds)) {
                                    foreach ($ds as $taikhoan) {
                                        extract($taikhoan);
                                        $suatk = "index.php?act=edit_user&iduser=" . $iduser;
                                        $xoatk = "index.php?act=delete_user&iduser=" . $iduser;

                                        echo '<tr>
                                            <td><input type="checkbox" name="user_ids[]" id="" value="' . $iduser . '"></td>
                                            <td>' . $iduser . '</td>
                                            <td>' . $user . '</td>
                                            <td>' . $password . '</td>
                                            <td>' . $email . '</td>
                                            <td>' . $phone . '</td>
                                            <th>' . $address . '</th>
                                            <th>' . $role . '</th>
                                            <td style="display: flex">
                                                    <a href="' . $suatk . '"><input type="button" class="btn btn-primary" value="Sửa"> </a>  
                                                    <a href="' . $xoatk . '"><input type ="button" class="btn btn-primary"  value="Xóa" onclick="return confirm(\'Bạn có chắc chắn muốn xóa\')"></a>
                                                </td>
                                        </tr>';
                                    }
                                } else {
                                    echo '<tr><td colspan="9">Không có tài khoản nào được tìm thấy.</td></tr>';
                                }
                                ?>
                            </tbody>
                        </table>
                        <div class="row mb10" style="margin: auto 0;">
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