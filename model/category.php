<?php
require_once 'pdo.php';

/**
 * Thêm loại mới
 * @param String $category_name là tên loại
 * @throws PDOException lỗi thêm mới
 */

function category_insert($category_name)
{
    $sql = "INSERT INTO category(category_name) VALUES(?)";
    pdo_execute_all($sql, $category_name);
}

/**
 * Cập nhật tên loại
 * @param int $id_category là mã loại cần cập nhật
 * @param String $category_name là tên loại mới
 * @throws PDOException lỗi cập nhật
 */

function load_name_category($id_category)
{
    if ($id_category > 0) {
        $sql = "SELECT * FROM category WHERE id_category = " . $id_category;
        $dm = pdo_query_one($sql);
        extract($dm);
        return $category_name;
    } else {
        return "";
    }
}

/**
 * Xóa một hoặc nhiều loại
 * @param mix $id_category là mã loại hoặc mảng mã loại
 * @throws PDOException lỗi xóa
 */
function category_delete($id_category)
{
    $sql = "DELETE FROM category WHERE id_category=" . $id_category;
    if (is_array($id_category)) {
        foreach ($id_category as $id) {
            pdo_execute($sql, $id);
        }
    } else {
        pdo_execute_all($sql, $id_category);
    }
}
/**
 * Truy vấn tất cả các loại
 * @return array mảng loại truy vấn được
 * @throws PDOException lỗi truy vấn
 */
function category_select_all()
{
    $sql = "SELECT * FROM category";
    return pdo_query($sql);
}

function loadall_category()
{
    $sql = "SELECT * FROM category ORDER BY id_category DESC";
    return pdo_query($sql);
}
/**
 * Truy vấn một loại theo mã
 * @param int $id_category là mã loại cần truy vấn
 * @return array mảng chứa thông tin của một loại
 * @throws PDOException lỗi truy vấn
 */
function category_select_by_id($id_category)
{
    $sql = "SELECT * FROM category WHERE id_category=?";
    return pdo_query_one($sql, $id_category);
}
/**
 * Kiểm tra sự tồn tại của một loại
 * @param int $id_category là mã loại cần kiểm tra
 * @return boolean có tồn tại hay không
 * @throws PDOException lỗi truy vấn
 */
function category_exist($id_category)
{
    $sql = "SELECT count(*) FROM category WHERE id_category=?";
    return pdo_query_value($sql, $id_category) > 0;
}
