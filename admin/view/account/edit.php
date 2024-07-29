<?php
if (is_array($account)) {
    extract($account);
}
?>

<div class="content">
    <h2>Sửa tài khoản</h2>
    <form action="index.php?act=update_user" method="POST">
        <div class="form-group">
            <label for="category_name">Tên đăng nhập</label>
            <input type="text" class="form-control" name="user" value="<?php echo isset($account['user']) ? $account['user'] : ''; ?>">
        </div>
        <div class="form-group">
            <label for="">Mật khẩu</label>
            <input type="text" class="form-control" name="password" value="<?php echo isset($account['password']) ? $account['password'] : ''; ?>">
        </div>
        <div class="form-group">
            <label for="">Email</label>
            <input type="email" class="form-control" name="email" value="<?php echo isset($account['email']) ? $account['email'] : ''; ?>">
        </div>
        <div class="form-group">
            <label for="">Điện thoại</label>
            <input type="text" class="form-control" name="phone" value="<?php echo isset($account['phone']) ? $account['phone'] : ''; ?>">
        </div>
        <div class="form-group">
            <label for="">Địa chỉ</label>
            <input type="text" class="form-control" name="address" value="<?php echo isset($account['address']) ? $account['address'] : ''; ?>">
        </div>
        <div class="form-group">
            <label for="">Vai trò</label>
            <input type="text" class="form-control" name="role" value="<?php echo isset($account['role']) ? $account['role'] : ''; ?>">
        </div>
        <div class="form-group form-check">
            <label class="form-check-label">
            </label>
        </div>
        <input type="hidden" name="iduser" value="<?php echo isset($iduser) ? $iduser : ''; ?>">
        <input class="btn btn-primary" type="submit" name="capnhat" value="Thay đổi">
        <input class="btn btn-primary" type="reset" name="resert" value="Nhập lại">
        <a href="index.php?act=user"><input class="btn btn-primary" type="button" value="Danh sách"></a>
        <?php
        if (isset($thongbao) && ($thongbao != "")) echo $thongbao;
        ?>
    </form>
    <br>
</div>