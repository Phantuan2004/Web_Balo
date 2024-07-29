<div class="content">
    <h2>Thống kê sản phẩm trong danh mục</h2>
    <div>
        <form action="#" method="POST">
            <div>
                <table class="table table-striped">
                    <tr>
                        <th>Mã loại</th>
                        <th>Tên loại</th>
                        <th>Số lượng</th>
                        <th>Gía nhỏ nhất</th>
                        <th>Gía lớn nhất</th>
                        <th>Gía trung bình</th>

                    </tr>

                    <?php
                    foreach ($list_category as $thongke) {
                        extract($thongke);
                    ?>
                        <tr>
                            <td><?= $id_category ?></td>
                            <td><?= $category_name ?></td>
                            <td><?= $quantity ?></td>
                            <td>$ <?= $gia_min ?></td>
                            <td>$ <?= $gia_max ?></td>
                            <td>$ <?= number_format($gia_avg, 2) ?></td>
                        </tr>
                    <?php } ?>



                </table>
            </div>
            <div class="row mb10 ">
                <a href="?act=chart_category"> <input class="mr20" type="button" value="XEM BIỂU ĐỒ"></a>
            </div>
        </form>
    </div>
</div>