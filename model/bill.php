<?php
// Hàm để chèn thông tin hóa đơn vào cơ sở dữ liệu
function insert_bill($iduser, $order_code, $name, $email, $phone, $address, $total_price, $payment_methods, $bill_date, $status)
{
    $sql = "INSERT INTO bill (iduser, order_code, name, email, phone, address, total_price, payment_methods, bill_date, status) 
            VALUES (?,?,?,?,?,?,?,?,?,?)";
    $params = [$iduser, $order_code, $name, $email, $phone, $address, $total_price, $payment_methods, $bill_date, $status];
    return pdo_execute_return_lastInsertId($sql, $params);
}

function loadone_bill($iduser)
{
    $sql = "SELECT * FROM bill WHERE iduser = ?";
    $listbill = pdo_query($sql, [$iduser]);
    return is_array($listbill) ? $listbill : [];
}

function loadall_bill()
{
    $sql = "SELECT * FROM bill ORDER BY id_bill DESC";
    $listbill = pdo_query($sql);
    return is_array($listbill) ? $listbill : [];
}


function tongdonhang()
{
    $tong = 0;
    foreach ($_SESSION['giohang'] as $cart) {
        $product_total = $cart[3] * $cart[4];
        $tong += $product_total;
    }
    return $tong;
}

function get_trangthai($n)
{
    switch ($n) {
        case 0:
            $tt = "Đơn hàng đang được xử lý, vui lòng chờ...";
            break;
        case 1:
            $tt = "Đơn hàng đã được xử lý!!!";
            break;
        case 2:
            $tt = "Đơn hàng đang được vận chuyển";
            break;
        case 3:
            $tt = "Đơn hàng đã được giao thành công";
            break;
        case 4:
            $tt = "Đã hủy đơn hàng";
            break;
    }
    return $tt;
}

function bill_delete($id_bill)
{
    // Đầu tiên, xóa các bản ghi liên quan trong cart
    $sql_cart_delete = "DELETE FROM cart WHERE id_bill = ?";
    pdo_execute($sql_cart_delete, [$id_bill]);

    // Sau đó, xóa bill chính nó
    $sql_bill_delete = "DELETE FROM bill WHERE id_bill = ?";
    pdo_execute($sql_bill_delete, [$id_bill]);
}
