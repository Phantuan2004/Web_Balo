<?php
if (is_array($products)) {
    extract($products);
}
$hinhpath = "../upload/" . $product_image;
if (is_file($hinhpath)) {
    $hinh = "<img src='" . $hinhpath . "' width='100px' height='100px'>";
} else {
    $hinh = "LỖI";
}
?>

<style>
    .card {
        display: block;
        margin: 20px auto 0;
        max-width: 100%;
    }

    label {
        display: flex;
        margin: 0 0 0 20px;
        font-weight: 700;
    }

    .card label {
        font-size: 0.9rem;
    }

    .card input,
    .card select {
        width: 95%;
        padding: 10px;
        border: 1px solid gray;
        border-radius: 5px;
        margin: 0 0 10px;
        flex: 1;
    }

    textarea {
        width: 100%;
        padding: 10px;
        border: 1px solid gray;
        border-radius: 5px;
        margin-bottom: 10px;
        resize: vertical;
    }
</style>

<div class="content">
    <h2>Sửa sản phẩm</h2>
    <div>
        <form action="index.php?act=update_product" method="POST" enctype="multipart/form-data">
            <div class="card py-3">
                <div>
                    <br>
                    <label>Danh mục</label>
                    <div class="text-center">
                        <select name="id_category">
                            <option value="0">Tất cả</option>
                            <?php
                            foreach ($dsdm as $danhmuc) {
                                extract($danhmuc);
                                $selected = ($id_category == $products['id_category']) ? 'selected' : '';
                                echo '<option value="' . $id_category . '" ' . $selected . '>' . $category_name . '</option>';
                            }
                            ?>
                        </select>
                    </div>
                </div>
                <br>
                <div class="row2 mb10">
                    <label>Tên sản phẩm</label>
                    <div class="text-center">
                        <input type="text" name="product_name" value="<?php echo isset($products['product_name']) ? $products['product_name'] : ''; ?>">
                    </div>
                </div>
                <br>
                <div class="row2 mb10">
                    <label>Giá sản phẩm</label>
                    <div class="text-center">
                        <input type="text" name="product_new_price" value="<?php echo isset($products['product_new_price']) ? $products['product_new_price'] : ''; ?>">
                    </div>
                </div>
                <br>
                <div class="row2 mb10">
                    <label for="">Trạng thái</label>
                    <div class="text-center">
                        <select name="id_status_product">
                            <?php
                            $dsStatus = status_select_all();
                            foreach ($dsStatus as $list) {
                                extract($list);
                                $selected = ($id_status_product == $products['id_status_product']) ? 'selected' : '';
                                echo '<option value="' . $id_status_product . '" ' . $selected . '>' . $status . '</option>';
                            }
                            ?>
                        </select>
                    </div>
                </div>
            </div>

            <div class="card py-3">
                <div class="row2 mb10">
                    <label>Hình ảnh</label><br>
                    <div class="text-center">
                        <input style="border: none;" type="file" name="product_image">
                        <?php echo isset($hinh) ? $hinh : ''; ?>
                    </div>
                </div>
            </div>

            <div class="card py-3">
                <div class="row2 mb10">
                    <label>Mô tả</label><br>
                    <textarea style="border: none;" name="product_mota" cols="30" rows="10"><?php echo isset($products['product_mota']) ? $products['product_mota'] : ''; ?></textarea>
                </div>
            </div>
            <br>
            <div class="row mb10" style="margin: 0 0 0 0.1rem;">
                <input type="hidden" name="id_product" value="<?php echo isset($id_product) ? $id_product : ''; ?>">
                <input class="mr20 btn btn-primary" name="capnhat" type="submit" value="Cập nhật">
                <input class="mr20 btn btn-primary" type="reset" value="Nhập lại">
                <a href="index.php?act=product"><input class="mr20 btn btn-primary" type="button" value="DANH SÁCH"></a>
            </div>
            <?php
            if (isset($thanhcong) && $thanhcong != "") {
                echo $thanhcong;
            }
            ?>
        </form>
    </div>
</div>