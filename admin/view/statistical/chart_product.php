<div class="content">
  <h2>Biểu đồ sản phẩm</h2>
  <div class="row2 form_content">
    <script src="https://www.gstatic.com/charts/loader.js"></script>
    <div id="myChart" style="width:100%; max-width:800px; height:500px; align-items: center"></div>
    <script>
      google.charts.load('current', {
        'packages': ['corechart']
      });
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {
        // Set Data
        const data = google.visualization.arrayToDataTable([
          ['Sản phẩm', 'Số lượng đã bán'],
          <?php
          $total_products = count($list_product);
          $i = 1;
          foreach ($list_product as $product) {
            extract($product);
            if ($i == $total_products) $comma = "";
            else $comma = ",";
            echo "['" . $product['id_product'] . "', " . $product['total_product'] . "]" . $comma;
            $i += 1;
          }
          ?>
        ]);

        // Set Options
        const options = {
          title: 'Biểu đồ sản phẩm bán chạy theo ID sản phẩm',
          is3D: true
        };

        // Draw
        const chart = new google.visualization.PieChart(document.getElementById('myChart'));
        chart.draw(data, options);
      }
    </script>
  </div>
</div>