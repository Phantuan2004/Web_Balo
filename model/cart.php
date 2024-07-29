<?php
function loadall_cart($id_product)
{
    $sql = "select * from cart where 1";
    if ($id_product > 0) {
        $sql .= " AND id_product='" . $id_product . "'";
    }
    $sql .= " order by id_product desc";
    $list_product =  pdo_query($sql);
    return $list_product;
}

function cart_delete($id_product)
{
    $sql = "DELETE FROM cart WHERE id_product=" . $id_product;
    if (is_array($id_product)) {
        foreach ($id_product as $madh) {
            pdo_execute($sql, $madh);
        }
    } else {
        pdo_execute($sql, $id_product);
    }
}

function insert_cart($iduser, $id_product, $product_name, $product_image, $product_quantity, $product_new_price, $product_total, $date, $id_bill)
{
    $sql = "INSERT INTO cart (iduser, id_product, product_name, product_image, product_quantity, product_new_price, product_total, date, id_bill) VALUES (?,?,?,?,?,?,?,?,?)";
    pdo_execute($sql, [$iduser, $id_product, $product_name, $product_image, $product_quantity, $product_new_price, $product_total, $date, $id_bill]);
}

function showcart()
{
    if (isset($_SESSION['giohang']) && (is_array($_SESSION['giohang']))) {
        for ($i = 0; $i < sizeof($_SESSION['giohang']); $i++) {
            $product_name = $_SESSION['giohang'][$i]['1'];
            $product_image = $_SESSION['giohang'][$i]['2'];
            $product_quantity = $_SESSION['giohang'][$i]['3'];
            $product_new_price = $_SESSION['giohang'][$i]['4'];
            $product_total = $_SESSION['giohang'][$i]['5'];
        }
    }
}

function loadone_cart_count($id_bill)
{
    $sql = "SELECT SUM(product_quantity) as total_quantity FROM cart WHERE id_bill = ?";
    $result = pdo_query_one($sql, $id_bill);
    return $result['total_quantity'];
}
