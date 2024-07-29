<?php
function loadall_comment($id_product)
{
    try {
        $conn = pdo_get_connection();
        $sql = "SELECT c.*, a.user 
                    FROM comment c 
                    JOIN account a ON c.iduser = a.iduser 
                    WHERE c.id_product = ?
                    ORDER BY c.id DESC";
        $params = [$id_product];

        $list_comment = pdo_query($sql, $params);

        return $list_comment;
    } catch (PDOException $e) {
        throw $e;
    } finally {
        unset($conn);
    }
}

function comment_select_all($id_product)
{
    $sql = "SELECT * FROM comment WHERE 1";
    // khi nối câu lệnh sql (chuỗi mới), thì sau dấu nháy kép mở đầu lệnh, phải có một khoảng trống
    if ($id_product > 0) $sql .= " AND id_product='" . $id_product . "'";
    $sql .= " ORDER by id DESC";
    $listcomment = pdo_query($sql);
    return $listcomment;
}

// function tạo comment và lấy tên sản phẩm cho bảng comment dựa vào id_product của bảng products
function insert_comment_name($iduser, $id_product, $content)
{
    $date = date('Y-m-d');

    // Lấy tên sản phẩm dựa trên id_product
    $sql_get_product_name = "SELECT product_name FROM products WHERE id_product = ?";
    $product_name = pdo_query_one_name($sql_get_product_name, [$id_product])['product_name'];

    $sql = "INSERT INTO `comment`(`iduser`, `id_product`, `product_name`, `content`, `date`) 
                VALUES (?, ?, ?, ?, ?)";
    try {
        pdo_execute($sql, [$iduser, $id_product, $product_name, $content, $date]);
    } catch (PDOException $e) {
        throw $e;
    }
}

function insert_comment($iduser, $id_product, $content)
{
    $date = date('Y-m-d');
    $sql = "INSERT INTO comment(iduser, id_product, content, date) 
                VALUES (?, ?, ?, ?)";
    try {
        pdo_execute($sql, [$iduser, $id_product, $content, $date]);
    } catch (PDOException $e) {
        throw $e;
    }
}



function comment_delete($id)
{
    $sql = "DELETE FROM comment WHERE id=" . $id;
    if (is_array($id)) {
        foreach ($id as $ma) {
            pdo_execute_all($sql, $ma);
        }
    } else {
        pdo_execute_all($sql, $id);
    }
}

// function loadall_comment($id_user){
//     $sql = "
//         SELECT comment.id, comment.content, taikhoan.user, comment.ngaycomment FROM `comment` 
//         LEFT JOIN taikhoan ON comment.iduser = taikhoan.id
//         LEFT JOIN sanpham ON comment.idpro = sanpham.id
//         WHERE sanpham.id = $idsp;
//     ";
//     $result =  pdo_query($sql);
//     return $result;
// }
