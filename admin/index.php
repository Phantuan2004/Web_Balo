<?php
include "../model/pdo.php";
include "../model/category.php";
include "../model/products.php";
include "../model/account.php";
include "../model/comment.php";
include "../model/thongke.php";
include "../model/bill.php";
include "../model/cart.php";
include "../model/order_history.php";
include "../model/product_status.php";

include "view/main/header.php";

$id_product = isset($_GET['id_product']);
if (isset($_GET["act"])) {
    $act = $_GET["act"];
    switch ($act) {

            //* Start Case User Account: List, Add, Edit, Delete
        case 'user':
            if (isset($_POST['account']) && $_POST['account']) {
                $id_account = $_POST['id_account'];
            } else {
                $id_account = "";
            }
            $ds = loadall_account($id_account); // Đổi từ $dstk sang $ds
            include "view/account/list.php";
            break;

        case 'add_user':
            if (isset($_POST['themmoi']) && ($_POST['themmoi'])) {
                $user = $_POST['user'];
                $password = $_POST['password'];
                $name = $_POST['name'];
                $email = $_POST['email'];
                $phone = $_POST['phone'];
                $address = $_POST['address'];
                $role = $_POST['role'];
                account_insert($user, $password, $name, $email, $phone, $address, $role);
                $thongbao = "Thành công";
            }
            include "view/account/add.php";
            break;

        case "edit_user":
            if (isset($_GET["iduser"]) && ($_GET["iduser"] > 0)) {
                $account = account_select_by_id($_GET['iduser']);
            }
            $dsAccount = account_select_all();
            include "view/account/edit.php";
            break;

        case "update_user":
            if (isset($_POST['capnhat']) && ($_POST['capnhat'])) {
                $iduser = $_POST['iduser'];
                $user = $_POST['user'];
                $password = $_POST['password'];
                $email = $_POST['email'];
                $phone = $_POST['phone'];
                $address = $_POST['address'];
                $role = $_POST['role'];

                account_edit($iduser, $user, $password, $email, $phone, $address, $role);
                $thongbao = "Cập nhật thành công!";
            }
            $ds = loadall_account(""); // Cập nhật lại danh sách tài khoản
            include "view/account/list.php";
            break;

        case "delete_user":
            if (isset($_GET["iduser"]) && ($_GET["iduser"] > 0)) {
                account_delete($_GET['iduser']);
            }
            $ds = loadall_account(""); // Cập nhật lại danh sách tài khoản
            include 'view/account/list.php';
            break;

        case "delete_selected_account":
            if (isset($_POST['user_ids'])) {
                $user_ids = $_POST['user_ids'];
                foreach ($user_ids as $iduser) {
                    pdo_execute("DELETE FROM account WHERE iduser = ?", $iduser);
                }
            }
            $ds = loadall_account(""); // Cập nhật lại danh sách tài khoản
            include 'view/account/list.php';
            exit();
            break;
            //*End Case User Account


            //* Start Case Category: List, Add, Edit, Delete
        case 'danhmuc':
            //lấy all danh mục
            $dsdm = category_select_all();
            include "view/category/list.php";
            break;

        case 'adddm':
            if (isset($_POST['themmoi']) && $_POST['themmoi']) {
                $category_name = $_POST['category_name'];
                category_insert($category_name);
                $thongbao = "Thành công";
            }
            include "view/category/add.php";
            break;


        case "suadm":
            if (isset($_GET['id_category']) && $_GET['id_category'] > 0) {
                $id_category = intval($_GET['id_category']);
                $sql = "SELECT * FROM category WHERE id_category='" . $id_category . "'";
                $dm = pdo_query_one($sql);
            }
            include "view/category/update.php";
            break;

        case 'updatedm':
            if (isset($_POST['capnhat']) && $_POST['capnhat']) {
                $category_name = $_POST['category_name'];
                $id_category = intval($_POST['id_category']);

                $sql = "UPDATE category SET category_name='" . $category_name . "' WHERE id_category=" . $id_category;
                pdo_execute_all($sql);
                $thongbao = "Cập nhật thành công";
            }
            $sql = "SELECT * FROM category ORDER BY id_category DESC";
            $dsdm = pdo_query($sql);
            include "view/category/list.php";
            break;

        case 'xoadm':
            // kiểm tra GET "id" có được khai báo và có giá trị lớn hơn 0 hay không. 
            if (isset($_GET['id_category']) && ($_GET['id_category'] > 0)) {
                $sql = "delete from category where id_category=" . $_GET['id_category'];
                pdo_execute_all($sql);
            }
            // lấy danh sách các bản ghi trong bảng "danhmuc"
            $sql = " select* from category order by category_name";
            $dsdm = pdo_query($sql);
            // hiển thị danh sách các bản ghi trong bảng "danhmuc".
            include "view/category/list.php";
            break;
            //* End Case Category


            //* Start Case Product: List, Add, Edit, Delete
        case 'product':
            if (isset($_POST['clickOK']) && $_POST['clickOK']) {
                $keyw = $_POST['keyw'];
                $id_category = $_POST['id_category'];
            } else {
                $keyw = "";
                $id_category = 0;
            }
            $dsdm = loadall_category();
            $dssp = loadall_sanpham($keyw, $id_category);
            include "view/products/list.php";
            break;

        case 'add_product':
            if (isset($_POST['themmoi']) && ($_POST['themmoi'])) {
                // $category_name = $_POST['category_name'];
                $id_category = $_POST['id_category'];
                $product_name = $_POST['product_name'];
                $product_new_price = $_POST['product_new_price'];
                $product_mota = $_POST['product_mota'];
                $product_image = $_FILES['product_image']['name'];
                $id_status_product = $_POST['id_status_product'];
                //                    echo $hinh;
                $target_dir = "../upload/";
                $target_file = $target_dir . basename($_FILES['product_image']['name']);
                //                    echo $target_file;
                if (move_uploaded_file($_FILES['product_image']['tmp_name'], $target_file)) {
                    //                        echo "Bạn đã upload ảnh thành công";
                } else {
                    //                        echo "Upload ảnh không thành công";
                }
                //                    echo $id_category;
                products_insert($product_name, $product_new_price, $product_image, $product_mota, $id_category, $id_status_product);
                $thanhcong = "Thêm thành công";
            }

            $dsdm = category_select_all();
            $dsStatus = status_select_all();
            include "view/products/add.php";
            break;

        case "edit_product";
            if (isset($_GET["id_product"]) && ($_GET["id_product"] > 0)) {
                $products = products_select_by_id($_GET['id_product']);
            }
            $dsdm = category_select_all();
            include "view/products/update.php";
            break;

        case "update_product":
            if (isset($_POST['capnhat']) && ($_POST['capnhat'])) {
                $id_product = intval($_POST['id_product']);
                $id_category = $_POST['id_category'];
                $product_name = $_POST['product_name'];
                $product_new_price = $_POST['product_new_price'];
                $product_mota = $_POST['product_mota'];
                $product_image = $_FILES['product_image']['name'];
                $id_status_product = $_POST['id_status_product'];

                $target_dir = "../upload/";
                $target_file = $target_dir . basename($_FILES["product_image"]["name"]);
                if (move_uploaded_file($_FILES["product_image"]["tmp_name"], $target_file)) {
                    echo "The file " . htmlspecialchars(basename($_FILES["product_image"]["name"])) . " has been uploaded.";
                }

                products_update($id_product, $product_name, $product_new_price, $product_image, $product_mota, $id_category, $id_status_product);

                $sql = "UPDATE products SET product_name='$product_name', product_new_price='$product_new_price', product_image='$product_image', product_mota='$product_mota', id_category='$id_category', id_status_product='$id_status_product' WHERE id_product='$id_product'";
                pdo_execute_all($sql);

                $thongbao = "Cập nhật thành công!";
            }

            $sql = "SELECT * FROM products ORDER BY id_product DESC";
            $dsStatus = status_select_all();
            $dsdm = loadall_product($id_category);
            $dssp = products_select_all();
            include "view/products/list.php";
            break;



        case "delete_product":
            if (isset($_GET["id_product"]) && ($_GET["id_product"] > 0)) {
                products_delete($_GET['id_product']);
            }
            $dssp = products_select_all($id_product);
            include 'view/products/list.php';
            break;

        case "delete_selected_products":
            if (isset($_POST['product_ids'])) {
                $product_ids = $_POST['product_ids'];
                foreach ($product_ids as $id_product) {
                    pdo_execute("DELETE FROM products WHERE id_product = ?", $id_product);
                }
            }
            $dssp = loadall_product("");
            include 'view/products/list.php';
            exit();
            break;
            //* End Case Product


            //* Start Case Statistical
        case 'tables':
            $list_comment = list_comment();
            $list_product = list_product();
            $list_category = list_category();
            include "view/main/tables.php";
            break;
            //*End Case Statistical


            //* Start Case Comment (binhluan)
        case "binhluan":
            $dsbl = comment_select_all(0);
            include "view/comment/list.php";
            break;

        case 'xoabl':
            // kiểm tra GET "id" có được khai báo và có giá trị lớn hơn 0 hay không. 
            if (isset($_GET['id']) && ($_GET['id'] > 0)) {
                $sql = "delete from comment where id=" . $_GET['id'];
                pdo_execute_all($sql);
            }
            // lấy danh sách các bản ghi trong bảng "danhmuc"
            $sql = " select* from comment order by content";
            $dsbl = pdo_query($sql);
            // hiển thị danh sách các bản ghi trong bảng "danhmuc".
            include "view/comment/list.php";
            break;
            //* End Case Comment (binhluan)


            //* Start Case Cart
        case 'cart':
            $dsgiohang = loadall_cart($id_product);
            include 'view/buy/cart.php';
            break;

        case 'delete_id_cart':
            // kiểm tra GET "id" có được khai báo và có giá trị lớn hơn 0 hay không. 
            if (isset($_GET['id_cart']) && ($_GET['id_cart'] > 0)) {
                $sql = "DELETE from cart where id_cart=" . $_GET['id_cart'];
                pdo_execute_all($sql);
            }
            // lấy danh sách các bản ghi trong bảng "danhmuc"
            $sql = " select* from cart order by id_cart";
            $dsgiohang = pdo_query($sql);
            // hiển thị danh sách các bản ghi trong bảng "danhmuc".
            include "view/buy/cart.php";
            break;
            //* End Case Cart


            //* Start Case Bill
        case 'bill':
            $dshd = loadall_bill(0);
            include 'view/buy/bill.php';
            break;

        case 'delete_bill':
            if (isset($_GET['id_bill'])) {
                $id_bill = $_GET['id_bill'];
                bill_delete($id_bill);
                // Hiển thị thông báo xóa thành công
                echo "<script>alert('Đã xóa đơn hàng thành công'); window.location.href = 'index.php?act=bill';</script>";
                exit;
            } else {
                echo "<script>alert('Không có mã đơn hàng để xóa'); window.location.href = 'index.php?act=bill';</script>";
                exit;
            }
            include "view/buy/bill.php";
            break;
            //*End Case Bill


            //* Start Case Statistical
        case 'chart_category':
            $list_category = list_category();
            include 'view/main/home.php';
            break;

        case 'listed_product':
            $list_product = list_product();
            include 'view/statistical/list_product.php';
            break;

        case 'chart_product':
            $list_products = listed_products();
            include 'view/statistical/chart_product.php';
            break;

        case 'bieudosp':
            include 'view/statistical/chart_product.php';
            break;

        case 'listed_comment':
            $list_comment = list_comment();
            include 'view/statistical/list_comment.php';
            break;

        case 'chart_comment':
            $list_comment = listed_comment();
            include 'view/statistical/chart_comment.php';
            break;
            //* End Case Statistical

        default:
            include "view/home.php";
            break;
    }
} else {
    include "view/main/home.php";
}
include "view/main/footer.php";
