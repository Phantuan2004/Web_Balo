<div class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Thống kê sản phẩm trong danh mục</h4>
                </div>
                <div class="card-body">
                    <div class="table-container" style="width: 1147px; height: 317px; overflow: auto;">
                        <table class="table table-striped">
                            <thead class="text-primary">
                                <tr>
                                    <th style="position: sticky; top: 0; background-color: white; z-index: 1;">Mã loại</th>
                                    <th style="position: sticky; top: 0; background-color: white; z-index: 1;">Tên loại</th>
                                    <th style="position: sticky; top: 0; background-color: white; z-index: 1;">Số lượng</th>
                                    <th style="position: sticky; top: 0; background-color: white; z-index: 1;">Gía nhỏ nhất</th>
                                    <th style="position: sticky; top: 0; background-color: white; z-index: 1;">Gía lớn nhất</th>
                                    <th style="position: sticky; top: 0; background-color: white; z-index: 1;">Gía trung bình</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                foreach ($list_category as $category) {
                                    extract($category);
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
                            </tbody>
                        </table>
                    </div>
                    <div class="col-md-12">
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" id="shipto">
                            <label class="custom-control-label" for="shipto" data-toggle="collapse" data-target="#CategoryChart">Xem biểu đồ phân tích</label>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card" style="display: flex; align-items:center;">
                <div class="collapse mb-5" id="CategoryChart">
                    <h5 class="section-title position-relative text-uppercase mb-3"><span class=" pr-3">Biểu đồ danh mục</span></h5>
                    <script src="https://www.gstatic.com/charts/loader.js"></script>
                    <div id="CategoryChart" style="width:100%; max-width:600px; height:500px;"></div>
                    <script>
                        google.charts.load('current', {
                            'packages': ['corechart']
                        });
                        google.charts.setOnLoadCallback(drawCategoryChart);

                        function drawCategoryChart() {
                            const data = google.visualization.arrayToDataTable([
                                ['Danh mục', 'Số lượng sản phẩm'],
                                <?php
                                $total_category = count($list_category);
                                $i = 1;
                                foreach ($list_category as $thongke) {
                                    extract($thongke);
                                    echo "['" . $category_name . "', " . $quantity . "]";
                                    if ($i != $total_category) {
                                        echo ",";
                                    }
                                    $i++;
                                }
                                ?>
                            ]);

                            const options = {
                                title: 'Biểu đồ tỉ lệ sản phẩm theo danh mục',
                                is3D: true
                            };

                            const chart = new google.visualization.PieChart(document.getElementById('CategoryChart'));
                            chart.draw(data, options);
                        }
                    </script>
                </div>
            </div>
        </div>


        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title"> Thống kê sản phẩm</h4>
                </div>
                <div class="card-body">
                    <div style="width: 1147px; height: 420px; overflow: auto;">
                        <table class="table table-striped">
                            <thead class=" text-primary">
                                <tr>
                                    <th style="position: sticky; top: 0; background-color: white; z-index: 1;">Mã loại</th>
                                    <th style="position: sticky; top: 0; background-color: white; z-index: 1;">Tên loại</th>
                                    <th style="position: sticky; top: 0; background-color: white; z-index: 1;">Giá cũ</th>
                                    <th style="position: sticky; top: 0; background-color: white; z-index: 1;">Giá mới</th>
                                    <th style="position: sticky; top: 0; background-color: white; z-index: 1;">Giảm (%)</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                foreach ($list_product as $product) {
                                    extract($product);
                                    if ($price_old == "") {
                                        $discount = "";
                                    } else {
                                        $discount = (($price_old - $price_new) / $price_old) * 100;
                                    }
                                ?>
                                    <tr>
                                        <td><?= $id_product ?></td>
                                        <td><?= $product_name ?></td>
                                        <?php
                                        if ($price_old == "") {
                                            echo "<td></td>";
                                        } else {
                                            echo "<td>$" . $price_old . "</td>";
                                        }
                                        ?>
                                        <td>$ <?= $price_new ?></td>
                                        <?php
                                        if ($price_old == "") {
                                            echo "<td></td>";
                                        } else {
                                            echo "<td>" . $discount . "%</td>";
                                        }
                                        ?>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                    <div class="col-md-12">
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" id="shipto2">
                            <label class="custom-control-label" for="shipto2" data-toggle="collapse" data-target="#ProductChart">Xem biểu đồ phân tích</label>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card" style="display: flex; align-items:center;">
                <div class="collapse mb-5" id="ProductChart">
                    <h5 class="section-title position-relative text-uppercase mb-3"><span class=" pr-3">Biểu đồ sản phẩm</span></h5>
                    <script src="https://www.gstatic.com/charts/loader.js"></script>
                    <div id="ProductChart" style="width:100%; max-width:800px; height:500px;"></div>
                    <script>
                        google.charts.load('current', {
                            'packages': ['corechart']
                        });
                        google.charts.setOnLoadCallback(drawProductChart);

                        function drawProductChart() {
                            const data = google.visualization.arrayToDataTable([
                                ['Sản phẩm', 'Số lượng đã bán'],
                                <?php
                                $total_product = count($list_product);
                                $i = 1;
                                foreach ($list_product as $product) {
                                    extract($product);
                                    echo "['" . $id_product . "', " . $total_product . "]";
                                    if ($i != $total_product) {
                                        echo ",";
                                    }
                                    $i++;
                                }
                                ?>
                            ]);

                            const options = {
                                title: 'Biểu đồ sản phẩm bán chạy theo ID sản phẩm',
                                is3D: true
                            };

                            const chart = new google.visualization.PieChart(document.getElementById('ProductChart'));
                            chart.draw(data, options);
                        }
                    </script>
                </div>
            </div>
        </div>


        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title"> Thống kê bình luận</h4>
                </div>
                <div class="card-body">
                    <div style="width: 1147px; height: 400px; overflow: auto;">
                        <table class="table table-striped">
                            <thead class=" text-primary">
                                <tr>
                                    <th style="position: sticky; top: 0; background-color: white; z-index: 1;">STT</th>
                                    <th style="position: sticky; top: 0; background-color: white; z-index: 1;">ID người dùng</th>
                                    <th style="position: sticky; top: 0; background-color: white; z-index: 1;">ID sản phẩm</th>
                                    <th style="position: sticky; top: 0; background-color: white; z-index: 1;">Nội dung</th>
                                    <th style="position: sticky; top: 0; background-color: white; z-index: 1;">Ngày bình luận</th>
                                </tr>
                            </thead>
                            <tbody>
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
                            </tbody>
                        </table>
                    </div>
                    <div class="col-md-12">
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" id="shipto3">
                            <label class="custom-control-label" for="shipto3" data-toggle="collapse" data-target="#CommentChart">Xem biểu đồ phân tích</label>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card" style="display: flex; align-items:center;">
                <div class="collapse mb-5" id="CommentChart">
                    <h5 class="section-title position-relative text-uppercase mb-3"><span class=" pr-3">Biểu đồ bình luận</span></h5>
                    <script src="https://www.gstatic.com/charts/loader.js"></script>
                    <div id="CommentChart" style="width:100%; max-width:600px; height:500px;"></div>

                    <script>
                        google.charts.load('current', {
                            'packages': ['corechart']
                        });
                        google.charts.setOnLoadCallback(drawChart);

                        function drawChart() {
                            // Set Data
                            const data = google.visualization.arrayToDataTable([
                                ['Sản phẩm', 'Số lượng bình luận'],
                                <?php
                                $total_comment = count($list_comment);
                                $i = 1;
                                foreach ($list_comment as $comment) {
                                    extract($comment);
                                    echo "['" . $id_product . "', " . $quantity . "]";
                                    if ($i != $total_comment) {
                                        echo ',';
                                    }
                                    $i += 1;
                                }
                                ?>
                            ]);

                            // Set Options
                            const options = {
                                title: 'Biểu đồ tỉ lệ bình luận của sản phẩm (theo ID sản phẩm)',
                                is3D: true
                            };

                            // Draw
                            const chart = new google.visualization.PieChart(document.getElementById('CommentChart'));
                            chart.draw(data, options);
                        }
                    </script>

                </div>
            </div>
        </div>
    </div>
</div>