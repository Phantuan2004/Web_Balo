<div class="content">
    <h2>Thêm tài khoản</h2>
    <form method="post">
        <div class="form-group">
            <label for="category_name">Tên đăng nhập</label>
            <input type="text" class="form-control" id="category_name" name="user">
        </div>
        <div class="form-group">
            <label for="">Mật khẩu</label>
            <input type="text" class="form-control" id="" name="password">
        </div>
        <div class="form-group">
            <label for="">Email</label>
            <input type="email" class="form-control" id="" name="email">
        </div>
        <div class="form-group">
            <label for="">Điện thoại</label>
            <input type="text" class="form-control" id="" name="phone">
        </div>
        <div class="form-group">
            <label for="">Địa chỉ</label>
            <input type="text" class="form-control" id="" name="address">
        </div>
        <div class="form-group">
            <label for="">Vai trò</label>
            <input type="text" value="2" class="form-control" id="" name="role">
        </div>
        <div class="form-group form-check">
            <label class="form-check-label">
            </label>
        </div>
        <input class="btn btn-primary" type="submit" name="themmoi" value="Thêm mới">
        <input class="btn btn-primary" type="reset" name="resert" value="Nhập lại">
        <a href="index.php?act=user"><input class="btn btn-primary" type="button" value="Danh sách"></a>
        <?php
        if (isset($thongbao) && ($thongbao != "")) echo $thongbao;
        ?>
    </form>
    <br>
</div>