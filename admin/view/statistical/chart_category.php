<div class="content">
  <h2>Biểu đồ danh mục</h2>
  <div class="row2 form_content ">
    <div id="myChart" style="width:100%; max-width:600px; height:500px;"></div>

    <script>
      google.charts.load('current', {
        'packages': ['corechart']
      });
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {

        // Set Data
        const data = google.visualization.arrayToDataTable([
          ['Danh mục', 'Số lượng sản phẩm'],
          <?php
          $total_category = count($list_category);
          $i = 1;
          foreach ($list_category as $thongke) {
            extract($thongke);
            if ($i == $total_category) $comma = "";
            else $comma = ",";
            echo "['" . $thongke['category_name'] . "', " . $thongke['quantity'] . "]" . $comma;
            $i += 1;
          }
          ?>
        ]);

        // Set Options
        const options = {
          title: 'Biểu đồ tỉ lệ sản phẩm theo danh mục'
        };

        // Draw
        const chart = new google.visualization.BarChart(document.getElementById('myChart'));
        chart.draw(data, options);

      }
    </script>

  </div>
</div>