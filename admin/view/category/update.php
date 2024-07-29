<?php
if (is_array($dm)) {
    extract($dm);
}
?>

<div class="content">
    <h2>Sửa danh mục</h2>
    <form method="post" action="index.php?act=updatedm">
        <div class="form-group">
            <label for="id_category">STT:</label>
            <input type="text" class="form-control" id="id_category" name="id_category" value="<?php if (isset($id_category) && ($id_category != "")) echo $id_category; ?>">
        </div>
        <div class="form-group">
            <label for="category_name">Tên danh mục:</label>
            <input type="text" class="form-control" id="category_name" name="category_name" value="<?php if (isset($category_name) && ($category_name != "")) echo $category_name; ?>">
        </div>
        <div class="form-group form-check">
            <label class="form-check-label">
                <input class="form-check-input" type="checkbox" name="remember"> Remember me
            </label>
        </div>
        <input type="hidden" name="id_category" value="<?php if (isset($id_category) && ($id_category > 0)) echo $id_category; ?>">
        <input class="btn btn-primary" type="submit" name="capnhat" value="Cập nhật">
        <input class="btn btn-primary" type="reset" name="resert" value="Nhập lại">
        <a href="index.php?act=danhmuc"><input class="btn btn-primary" type="button" value="Danh sách"></a>
        <?php
        if (isset($thongbao) && ($thongbao != "")) echo $thongbao;
        ?>
    </form>
    <br>
</div>