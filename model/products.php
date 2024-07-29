<?php
require_once 'pdo.php';

function products_insert($product_name, $product_new_price, $product_image, $product_mota, $id_category, $id_status_product)
{
    $sql = "INSERT INTO products (product_name, product_new_price, product_image, product_mota, id_category, id_status_product) VALUES ('$product_name', '$product_new_price', '$product_image', '$product_mota', '$id_category', '$id_status_product')";
    pdo_execute_all($sql);
}

function products_update($id_product, $product_name, $product_new_price, $product_image, $product_mota, $id_category, $id_status_product)
{
    // Thực hiện câu lệnh UPDATE
    if ($product_image != "") {
        $sql = "UPDATE products SET product_name='$product_name', product_new_price='$product_new_price', product_image='$product_image', product_mota='$product_mota', id_status_product='$id_status_product', id_category='$id_category' WHERE products.id_product= '$id_product'";
    } else {
        $sql = "UPDATE products SET product_name='$product_name', product_new_price='$product_new_price', product_mota='$product_mota', id_status_product='$id_status_product', id_category='$id_category' WHERE products.id_product='$id_product'";
    }
    pdo_execute_all($sql);
}

function products_select_by_id($id_product)
{
    $sql = "SELECT * FROM products WHERE id_product=?";
    return pdo_query_one($sql, $id_product);
}

function products_delete($id_product)
{
    $sql = "DELETE FROM products WHERE id_product=?";
    if (is_array($id_product)) {
        foreach ($id_product as $id) {
            pdo_execute_all($sql, $id);
        }
    } else {
        pdo_execute_all($sql, $id_product);
    }
}

function products_select_all()
{
    $sql = "SELECT * FROM products";
    $list = pdo_query($sql);
    return $list;
}

function loadall_products($search = "", $id_category = 0)
{
    $sql = "SELECT * FROM products WHERE 1";

    if ($search != "") {
        $sql .= " AND product_name LIKE '%" . $search . "%'";
    }

    if ($id_category > 0) {
        $sql .= " AND id_category = '" . $id_category . "'";
    }

    return pdo_query($sql);
}

function loadall_product($id_category)
{
    $sql = "SELECT * FROM products WHERE 1";

    if ($id_category > 0) {
        $sql .= " AND id_category = '" . $id_category . "'";
    }

    $sql .= " ORDER BY id_category desc";
    return pdo_query($sql);
}

function loadall_sanpham($keyw = "", $id_category = 0)
{
    $sql = "SELECT * FROM products WHERE 1";
    if ($keyw != "") {
        $sql .= " AND product_name LIKE '%" . $keyw . "%'";
    }
    if ($id_category > 0) {
        $sql .= " AND id_category = '" . $id_category . "'";
    }
    $sql .= " ORDER BY id_category DESC";
    return pdo_query($sql);
}

function loadone_products($id_product)
{
    $sql = "SELECT * FROM products WHERE id_product = " . $id_product;
    $result = pdo_query_one($sql);
    return $result;
}


function products_exist($id_product)
{
    $sql = "SELECT count(*) FROM products WHERE id_product$id_product=?";
    return pdo_query_value($sql, $id_product) > 0;
}

function products_tang_so_luot_xem($id_product)
{
    $sql = "UPDATE products SET product_view = product_view + 1 WHERE id_product$id_product=?";
    pdo_execute($sql, $id_product);
}

function loadall_products_home()
{
    $sql = "SELECT * FROM products ORDER BY id_product DESC LIMIT 0, 9";
    $listproducts = pdo_query($sql);
    return $listproducts;
}

function products_select_top10()
{
    $sql = "SELECT * FROM products WHERE product_view > 0 ORDER BY product_view DESC LIMIT 0, 10";
    return pdo_query($sql);
}

function products_select_dac_biet()
{
    $sql = "SELECT * FROM products WHERE dac_biet=1";
    return pdo_query($sql);
}

function products_select_by_loai($id_product, $id_category)
{
    $sql = "SELECT * FROM products WHERE id_category = :id_category AND id_product != :id_product";
    return pdo_query($sql, ['id_category' => $id_category, 'id_product' => $id_product]);
}

function products_select_keyw($keyw)
{
    $sql = "SELECT * FROM products hh "
        . "JOIN category lo ON lo.id_category = hh.id_category "
        . "WHERE hh.product_name LIKE ? OR lo.category_name LIKE ?";
    return pdo_query($sql, '%' . $keyw . '%', '%' . $keyw . '%');
}

function exist_param($param_name)
{
    return (isset($_REQUEST[$param_name]) && $_REQUEST[$param_name] != "");
}

// function products_select_page(){
//     if(!isset($_SESSION['page_no'])){
//         $_SESSION['page_no'] = 0;
//     }
//     if(!isset($_SESSION['page_count'])){
//         $row_count = pdo_query_value("SELECT count(*) FROM products");
//         $_SESSION['page_count'] = ceil($row_count/10.0);
//     }
//     if(exist_param("page_no")){
//         $_SESSION['page_no'] = $_REQUEST['page_no'];
//     }
//     if($_SESSION['page_no'] < 0){
//         $_SESSION['page_no'] = $_SESSION['page_count'] - 1;
//     }
//     if($_SESSION['page_no'] >= $_SESSION['page_count']){
//         $_SESSION['page_no'] = 0;
//     }
//     $sql = "SELECT * FROM products ORDER BY ma_hh LIMIT ".$_SESSION['page_no'].", 10";
//     return pdo_query($sql);
// }

function get_discounted_products($price_filters = [])
{
    // Xây dựng câu điều kiện WHERE cho lọc giá
    $where_clauses = ["product_old_price IS NOT NULL", "product_new_price IS NOT NULL"];

    if (!empty($price_filters)) {
        foreach ($price_filters as $price) {
            if ($price == "all") {
                continue;
            }

            if ($price == ">3000") {
                $where_clauses[] = "product_new_price > 3000";
            } else {
                list($min, $max) = explode("-", $price);
                $where_clauses[] = "product_new_price BETWEEN $min AND $max";
            }
        }
    }

    // Kết hợp các điều kiện lọc thành một chuỗi
    $where_clause = "";
    if (!empty($where_clauses)) {
        $where_clause = " WHERE " . implode(" AND ", $where_clauses);
    }

    // Truy vấn cơ sở dữ liệu để lấy thông tin sản phẩm có giảm giá theo điều kiện lọc
    $sql = "SELECT id_product, product_name, product_image, product_old_price, product_new_price 
            FROM products" . $where_clause . " LIMIT 9";

    return pdo_query($sql);
}

function discounted_products($limit = 9)
{
    // Truy vấn cơ sở dữ liệu để lấy thông tin sản phẩm có giảm giá
    $sql = "SELECT id_product, product_name, product_image, product_old_price, product_new_price 
            FROM products 
            WHERE product_old_price IS NOT NULL AND product_new_price IS NOT NULL
            LIMIT :limit";

    // Thực hiện truy vấn và trả về kết quả
    $conn = pdo_get_connection();
    $stmt = $conn->prepare($sql);
    $stmt->bindValue(':limit', (int) $limit, PDO::PARAM_INT);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}
