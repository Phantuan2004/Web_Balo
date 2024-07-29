<div class="content">
  <h2>Thống kê sản phẩm</h2>
  <div>
    <form action="#" method="POST">
      <div>
        <table class="table table-striped">
          <tr>
            <th>Mã loại</th>
            <th>Tên loại</th>
            <th>Giá cũ</th>
            <th>Giá mới</th>
            <th>Giảm (%)</th>
          </tr>
          <?php
          foreach ($list_product as $thongke) {
            extract($thongke);
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
        </table>
      </div>
      <div class="row mb10">
        <a href="?act=chart_product"><input class="mr20" type="button" value="XEM BIỂU ĐỒ"></a>
      </div>
    </form>
  </div>
</div>