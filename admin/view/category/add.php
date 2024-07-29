<div class="content">
    <h2>Thêm danh mục</h2>
    <form method="post">
        <div class="form-group">
            <label for="text">STT:</label>
            <input type="text" class="form-control" id="text" name="id_category">
        </div>
        <div class="form-group">
            <label for="category_name">Tên danh mục:</label>
            <input type="text" class="form-control" id="category_name" name="category_name">
        </div>
        <div class="form-group form-check">
            <label class="form-check-label">
            </label>
        </div>
        <input class="btn btn-primary" type="submit" name="themmoi" value="Thêm mới">
        <input class="btn btn-primary" type="reset" name="resert" value="Nhập lại">
        <a href="index.php?act=danhmuc"><input class="btn btn-primary" type="button" value="Danh sách"></a>
        <?php
        if (isset($thongbao) && ($thongbao != "")) echo $thongbao;
        ?>
    </form>
    <br>
</div>