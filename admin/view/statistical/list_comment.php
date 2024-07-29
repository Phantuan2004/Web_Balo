<div class="content">
    <h2>Thống kê bình luận</h2>
    <div>
        <form action="#" method="POST">
            <div>
                <table class="table table-striped">
                    <tr>
                        <th>STT</th>
                        <th>ID người dùng</th>
                        <th>ID sản phẩm</th>
                        <th>Nội dung</th>
                        <th>Ngày bình luận</th>
                    </tr>

                    <?php
                    foreach ($list_comment as $thongkebl) {
                        extract($thongkebl);
                    ?>
                        <tr>
                            <td><?= $id ?></td>
                            <td><?= $iduser ?></td>
                            <td><?= $id_product ?></td>
                            <td><?= $content ?></td>
                            <td><?= $date ?></td>
                        </tr>
                    <?php } ?>
                </table>
            </div>
            <a href="?act=chart_comment"><input class="mr20" type="button" value="XEM BIỂU ĐỒ"></a>
        </form>
    </div>
</div>