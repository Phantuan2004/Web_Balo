<div class="content">
    <h2>Biểu đồ bình luận</h2>
    <div class="row2 form_content">
        <div id="myChart" style="width:100%; max-width:600px; height:500px;"></div>

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
                        if ($i == $total_comment) $comma = "";
                        else $comma = ",";
                        echo "['" . $comment['id_product'] . "', " . $comment['quantity'] . "]" . $comma;
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
                const chart = new google.visualization.PieChart(document.getElementById('myChart'));
                chart.draw(data, options);
            }
        </script>
    </div>
</div>