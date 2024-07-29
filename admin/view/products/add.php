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
        <h2>THÊM MỚI SẢN PHẨM</h2>
        <div>
            <form action="index.php?act=add_product" method="POST" enctype="multipart/form-data">
                <div class="card py-3">
                    <div>
                        <br>
                        <label> Danh mục </label>
                        <div class="text-center">
                            <select name="id_category" id="">
                                <?php
                                foreach ($dsdm as $danhmuc) {
                                    extract($danhmuc);
                                    echo '<option value="' . $id_category . '">' . $category_name . '</option>';
                                }
                                ?>
                            </select>
                        </div>
                    </div>
                    <br>
                    <div class="row2 mb10">
                        <label> Tên sản phẩm </label>
                        <div class="text-center">
                            <input type="text" name="product_name" placeholder="nhập vào tên san phẩm">
                        </div>
                    </div>
                    <br>
                    <div class="row2 mb10 ">
                        <label>Giá sản phẩm </label>
                        <div class="text-center">
                            <input type="text" name="product_new_price" placeholder="nhập vào của sản phẩm">
                        </div>
                    </div>
                    <br>
                    <div class="row2 mb10 ">
                        <label for="">Trạng thái</label>
                        <div class="text-center">
                            <select name="id_status_product" id="">
                                <?php
                                foreach ($dsStatus as $dstt) {
                                    extract($dstt);
                                    echo '<option value="' . $id_status_product . '">' . $status . '</option>';
                                }
                                ?>
                            </select>
                        </div>
                    </div>
                </div>

                <div class="card py-3">
                    <div class="row2 mb10 ">
                        <label>Hình ảnh </label>
                        <div class="text-center">
                            <input style="border: none; width: 30%" type="file" name="product_image">
                        </div>
                    </div>
                </div>

                <div class="card py-3">
                    <div class="row2 mb10 ">
                        <label>Mô tả </label> <br>
                        <textarea style="border: none;" name="product_mota" cols="30" rows="10"></textarea>
                    </div>
                </div>
                <br>
                <div class="button row mb10" style="margin: 0 0 0 0.1rem">
                    <input class="mr20 btn btn-primary" name="themmoi" type="submit" value="THÊM MỚI">
                    <input class="mr20 btn btn-primary" type="reset" value="NHẬP LẠI">
                    <a href="index.php?act=product"><input class="mr20 btn btn-primary" type="button" value="DANH SÁCH"></a>
                </div>
                <?php
                if (isset($thanhcong) && ($thanhcong != "")) {
                    echo $thanhcong;
                }

                ?>
            </form>
        </div>
    </div>