<?php
session_start();
ob_start();
if (!isset($_SESSION['giohang'])) {
    $_SESSION['giohang'] = [];
}

if (isset($_GET['deletecart']) && ($_GET['deletecart'] == 1)) {
    unset($_SESSION['giohang']);
    header('location: index.php?act=cart');
    exit();
}

error_reporting(E_ALL);
ini_set('display_errors', 1);

// các hàm model
include "model/pdo.php";
include "model/products.php";
include "model/category.php";
include "model/comment.php";
include "model/account.php";
include "model/cart.php";
include "model/bill.php";

include "view/main/header.php";
include "global.php";

$spnew = loadall_products_home();
$dsdm = category_select_all();
$dstop10 = products_select_top10();
if (isset($_GET['act']) && ($_GET['act'] != "")) {
    $act = $_GET["act"];
    switch ($act) {
        case 'about':
            include "view/mail/about.php";
            break;

        case 'dangky':
            if (isset($_POST['dangky']) && ($_POST['dangky'] != "")) {
                $user = $_POST['user'];
                $password = $_POST['password'];
                $name = $_POST['name'];
                $email = $_POST['email'];
                $phone = $_POST['phone'];
                $address = $_POST['address'];
                $role = 2;
                account_insert($user, $password, $name, $email, $phone, $address, $role);
                $thongbao = "Đăng ký thành công";
            }
            include "view/login/dangnhap.php";
            break;

        case 'dangnhap':
            if (isset($_POST['dangnhap']) && $_POST['dangnhap']) {
                $user = $_POST['user'];
                $password = $_POST['password'];
                $role = $_POST['role'];
                $checkuser = checkuser($user, $password, $role);
                if (is_array($checkuser)) {
                    $_SESSION['User'] = $checkuser;
                    $_SESSION['role'] = $role;
                    if ($role == 1) {
                        $_SESSION['role'] = $role;
                        header('location: admin/index.php');
                    } else {
                        $_SESSION['role'] = $role;
                        header('location: index.php');
                    }
                } else {
                    $thongbao = "Sai tên đăng nhập hoặc mật khẩu";
                }
            }
            include "view/login/dangnhap.php";
            break;


        case 'dangxuat':
            session_unset();
            session_destroy();
            header('location: index.php');
            break;

        case "quenmk":
            if (isset($_POST['guiemail']) && ($_POST['guiemail'])) {
                $email = $_POST['email'];

                $checkemail = checkemail($email);
                if (is_array($checkemail)) {
                    $thongbao = "Mật khẩu của bạn là: " . $checkemail['password'];
                } else {
                    $thongbao = "Email không tồn tại";
                }
            }
            include "view/login/quenmk.php";
            break;

        case 'cart':
            include "view/cart/cart.php";
            break;

        case 'addtocart':
            // Kiểm tra trạng thái đăng nhập của người dùng
            if (!isset($_SESSION['User']) || empty($_SESSION['User'])) {
                // Hiển thị thông báo và chuyển hướng đến trang đăng nhập
                echo '<script>
                        alert("Bạn cần đăng nhập để thêm sản phẩm vào giỏ hàng.");
                        window.location.href = "index.php?act=dangnhap";
                    </script>';
            } else {
                // Người dùng đã đăng nhập, thực hiện thêm sản phẩm vào giỏ hàng
                if (isset($_POST['id_product']) && $_POST['id_product']) {
                    $id_product = $_POST['id_product'];
                    $product_name = $_POST['product_name'];
                    $product_image = $_POST['product_image'];
                    $product_new_price = $_POST['product_new_price'];
                    $product_quantity = isset($_POST['product_quantity']) && $_POST['product_quantity'] > 0 ? $_POST['product_quantity'] : 1;
                    $product_total = $product_new_price * $product_quantity;
                    $date = date('H:i:s d/m/Y');

                    // Kiểm tra nếu giỏ hàng chưa được khởi tạo
                    if (!isset($_SESSION['giohang'])) {
                        $_SESSION['giohang'] = [];
                    }

                    $found = false;
                    foreach ($_SESSION['giohang'] as $index => $item) {
                        if ($item[0] == $id_product) {
                            // Cập nhật số lượng sản phẩm đã có trong giỏ hàng
                            $_SESSION['giohang'][$index][4] += $product_quantity;
                            $_SESSION['giohang'][$index][5] = $_SESSION['giohang'][$index][3] * $_SESSION['giohang'][$index][4];
                            $found = true;
                            break;
                        }
                    }

                    // Thêm sản phẩm mới vào giỏ hàng
                    if (!$found) {
                        $sp = [$id_product, $product_name, $product_image, $product_new_price, $product_quantity, $product_total];
                        array_push($_SESSION['giohang'], $sp);
                    }
                    include "view/cart/cart.php";
                }
            }
            break;


        case 'updatecart':
            // Kiểm tra xem các biến 'index' và 'delta' có được gửi trong yêu cầu POST không
            if (isset($_POST['index']) && isset($_POST['delta'])) {
                $index = $_POST['index']; // Lấy giá trị của chỉ mục sản phẩm trong giỏ hàng
                $delta = $_POST['delta']; // Lấy giá trị thay đổi số lượng (1 hoặc -1)

                // Ghi log giá trị nhận được
                error_log("Index: $index, Delta: $delta");

                // Kiểm tra xem sản phẩm có tồn tại trong giỏ hàng với chỉ mục đã cho không
                if (isset($_SESSION['giohang'][$index])) {
                    // Cập nhật số lượng sản phẩm
                    $_SESSION['giohang'][$index][4] += $delta;

                    // Đảm bảo số lượng sản phẩm không nhỏ hơn 1
                    if ($_SESSION['giohang'][$index][4] < 1) {
                        $_SESSION['giohang'][$index][4] = 1;
                    }

                    // Cập nhật tổng giá sản phẩm
                    $_SESSION['giohang'][$index][5] = $_SESSION['giohang'][$index][3] * $_SESSION['giohang'][$index][4];

                    // Ghi log giá trị sau khi cập nhật
                    error_log("New Quantity: " . $_SESSION['giohang'][$index][4]);
                }
            }
            exit;
            break;

        case 'deletecart':
            if (isset($_GET['idcart'])) {
                array_splice($_SESSION['giohang'], $_GET['idcart'], 1);
            } else {
                $_SESSION['giohang'] = [];
            }
            header('location: index.php?act=cart');
            break;

        case 'checkout':
            include "view/cart/checkout.php";
            break;

        case 'bill':
            if (isset($_SESSION['User'])) {
                $iduser = $_SESSION['User']['iduser'];
                echo '<script>
                        alert("Đặt hàng thành công");
                    </script>';
            } else {
                $iduser = 0;
                echo '<script>
                        alert("Bạn cần đăng nhập để đặt hàng.");
                        window.location.href = "index.php?act=dangnhap";
                    </script>';
            }

            if (isset($_POST['dathang']) && ($_POST['dathang'])) {
                $order_code = "ABC-" . uniqid();
                $name = $_POST['name'];
                $email = $_POST['email'];
                $phone = $_POST['phone'];
                $address = $_POST['address'];
                $payment_methods = $_POST['payment_methods'];
                $bill_date = date('H:i:s d/m/Y');
                $total_price = tongdonhang();
                $status = 0;

                // Tạo bill và lấy ID của bill vừa tạo
                $id_bill = insert_bill($iduser, $order_code, $name, $email, $phone, $address, $total_price, $payment_methods, $bill_date, $status);

                if ($id_bill) { // Kiểm tra nếu insert_bill trả về ID hợp lệ
                    for ($i = 0; $i < sizeof($_SESSION['giohang']); $i++) {
                        $id_product = $_SESSION['giohang'][$i]['0'];
                        $product_name = $_SESSION['giohang'][$i]['1'];
                        $product_image = $_SESSION['giohang'][$i]['2'];
                        $product_quantity = $_SESSION['giohang'][$i]['4'];
                        $product_new_price = $_SESSION['giohang'][$i]['3'];
                        $product_total = $product_quantity * $product_new_price;
                        $date = date('H:i:s d/m/Y');

                        // Chèn vào bảng cart với id_bill đã xác minh
                        insert_cart($iduser, $id_product, $product_name, $product_image, $product_quantity, $product_new_price, $product_total, $date, $id_bill);
                    }
                }
            }
            include "view/cart/bill.php";
            break;


        case 'mybill':
            if (isset($_SESSION['User'])) {
                $iduser = $_SESSION['User']['iduser'];
                $listbill = loadone_bill($iduser);
            }
            include "view/cart/mybill.php";
            break;

        case 'delete_bill':
            if (isset($_GET['id_bill'])) {
                $id_bill = $_GET['id_bill'];
                bill_delete($id_bill);
                // Hiển thị thông báo xóa thành công
                echo "<script>alert('Đã xóa đơn hàng thành công'); window.location.href = 'index.php?act=mybill';</script>";
                exit;
            } else {
                echo "<script>alert('Không có mã đơn hàng để xóa'); window.location.href = 'index.php?act=mybill';</script>";
                exit;
            }
            break;

        case 'shop':
            include "view/shopProducts/shop.php";
            break;

        case 'shop2':
            include "view/shopProducts/shop2.php";
            break;

        case 'shop3':
            include "view/shopProducts/shop3.php";
            break;

        case 'shop4':
            include "view/shopProducts/shop4.php";
            break;

        case 'shop5':
            include "view/shopProducts/shop5.php";
            break;

        case 'shop6':
            include "view/shopProducts/shop6.php";
            break;

        case 'products':
            if (isset($_GET['id_category']) &&  ($_GET['id_category'] > 0)) {
                $id_category = $_GET['id_category'];
                $dssp = loadone_products("", $id_category);
                include "view/shopProducts/shop.php";
            } else {
                include "view/main/home.php";
            }
            break;

        case 'product_detail':
            if (isset($_POST['guibinhluan']) && ($_POST['guibinhluan'])) {
                $content = $_POST['content'];
                $id_product = $_POST['id_product'];
                $iduser = $_SESSION['User']['iduser'];
                insert_comment($_SESSION['User']['iduser'], $_POST['id_product'], $_POST['content']);
            }

            if (isset($_GET['id_product']) && $_GET['id_product'] > 0) {
                $id_product = $_GET['id_product'];  //Khai báo id_product
                $sanpham = loadone_products($id_product);
                if ($sanpham) {
                    $sanphamcl = products_select_by_loai($sanpham['id_product'], $sanpham['id_category']);
                    $binhluan = loadall_comment($id_product);
                } else {
                    echo "Sản phẩm không tồn tại.";
                }
            } else {
                echo "ID sản phẩm không hợp lệ.";
            }

            include "view/shopProducts/detail.php";
            break;

        case 'search_product':
            if (isset($_POST['search']) && !empty($_POST['search'] != "")) {
                $search = $_POST['search'];
            } else {
                $search = "";
            }

            if (isset($_GET['$id_category']) && ($_GET['$id_category'] > 0)) {
                $id_category = $_GET['id_category'];
            } else {
                $id_category = 0;
            }
            $list_product = loadall_products($search, $id_category);
            $name_category = load_name_category($id_category);

            include "view/shopProducts/shop7.php";
            break;
    }
} else {
    include "view/main/home.php";
}

include "view/main/footer.php";
