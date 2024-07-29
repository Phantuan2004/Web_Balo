<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Backpack world</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Free HTML Templates" name="keywords">
    <meta content="Free HTML Templates" name="description">

    <!-- Favicon -->
    <link href="view/img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="view/lib/animate/animate.min.css" rel="stylesheet">
    <link href="view/lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="view/css/style.css" rel="stylesheet">
</head>

<body>
    <!-- Topbar Start -->
    <div class="container-fluid">
        <div class="row bg-secondary py-1 px-xl-5">
            <div class="col-lg-6 d-none d-lg-block">
                <div class="d-inline-flex align-items-center h-100">
                    <a class="text-body mr-3" href="">Về chúng tôi</a>
                    <a class="text-body mr-3" href="">Liên hệ</a>
                    <a class="text-body mr-3" href="">Hỗ trợ</a>
                    <a class="text-body mr-3" href="">Câu hỏi thường gặp</a>
                </div>
            </div>
            <div class="col-lg-6 text-center text-lg-right">
                <div class="d-inline-flex align-items-center">
                    <?php
                    if (isset($_SESSION['User'])) {
                        echo '<div class="btn-group">';
                        if (isset($_SESSION['User']['role']) && $_SESSION['User']['role'] == 1) {
                            echo '<button type="button" style="margin: 0 9px 0 0" class="btn btn-sm btn-light"><a style="text-decoration: none; color: black; font-weight: 500; font-size: 16px;" href="admin/index.php">' . $_SESSION['User']['user'] . '</a></button>';
                        } else {
                            echo '<button type="button" style="margin: 0 9px 0 0" class="btn btn-sm btn-light"><a style="text-decoration: none; color: black; font-weight: 500; font-size: 16px;" href="index.php?act=userinfo">' . $_SESSION['User']['user'] . '</a></button>';
                        }
                        if (isset($_SESSION['User']['role']) && $_SESSION['User']['role'] == 1) {
                            echo '';
                        } else {
                            echo '<button type="button" style="margin: 0 9px 0 0" class="btn btn-sm btn-light"><a style="text-decoration: none; color: black; font-weight: 500; font-size: 16px;" href="index.php?act=mybill">Đơn hàng của tôi</a></button>';
                        }
                        echo '<button type="button" class="btn btn-sm btn-light"><a style="text-decoration: none; color: black; font-weight: 500; font-size: 16px;" href="index.php?act=dangxuat">Đăng xuất</a></button>';
                        echo '</div>';
                    } else { ?>
                        <div class="btn-group">
                            <button type="button" class="btn btn-sm btn-light dropdown-toggle" data-toggle="dropdown">My Account</button>
                            <div class="dropdown-menu dropdown-menu-right">
                                <a href="index.php?act=dangnhap"><button class="dropdown-item" type="button">Login</button></a>
                            </div>
                        </div>
                    <?php } ?>

                    <div class="btn-group mx-2">
                        <button type="button" class="btn btn-sm btn-light dropdown-toggle" data-toggle="dropdown">USD</button>
                        <div class="dropdown-menu dropdown-menu-right">
                            <button class="dropdown-item" type="button">EUR</button>
                            <button class="dropdown-item" type="button">GBP</button>
                            <button class="dropdown-item" type="button">CAD</button>
                        </div>
                    </div>
                    <div class="btn-group">
                        <button type="button" class="btn btn-sm btn-light dropdown-toggle" data-toggle="dropdown">EN</button>
                        <div class="dropdown-menu dropdown-menu-right">
                            <button class="dropdown-item" type="button">FR</button>
                            <button class="dropdown-item" type="button">AR</button>
                            <button class="dropdown-item" type="button">RU</button>
                        </div>
                    </div>
                </div>
                <div class="d-inline-flex align-items-center d-block d-lg-none">
                    <a href="" class="btn px-0 ml-2">
                        <i class="fas fa-heart text-dark"></i>
                        <span class="badge text-dark border border-dark rounded-circle" style="padding-bottom: 2px;">0</span>
                    </a>
                    <a href="" class="btn px-0 ml-2">
                        <i class="fas fa-shopping-cart text-dark"></i>
                        <span class="badge text-dark border border-dark rounded-circle" style="padding-bottom: 2px;">0</span>
                    </a>
                </div>
            </div>
        </div>
        <div class="row align-items-center bg-light py-3 px-xl-5 d-none d-lg-flex">
            <div class="col-lg-4">
                <a href="" class="text-decoration-none">
                    <span class="h1 text-uppercase text-primary bg-dark px-2">Thế giới</span>
                    <span class="h1 text-uppercase text-dark bg-primary px-2 ml-n1">Balo</span>
                </a>
            </div>
            <div class="col-lg-4 col-6 text-left">
                <form action="index.php?act=search_product" method="post">
                    <div class="input-group">
                        <input type="text" class="form-control" name="search" placeholder="Tìm kiếm sản phẩm">
                        <div class="input-group-append">
                            <button class="input-group-text bg-transparent text-primary">
                                <i class="fa fa-search"></i>
                            </button>
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-lg-4 col-6 text-right">
                <p class="m-0">Dịch vụ chăm sóc khách hàng</p>
                <h5 class="m-0">+012 345 6789</h5>
            </div>
        </div>
    </div>
    <!-- Topbar End -->


    <!-- Navbar Start -->
    <div class="container-fluid bg-dark mb-30">
        <div class="row px-xl-5">
            <div class="col-lg-3 d-none d-lg-block">
                <a class="btn d-flex align-items-center justify-content-between bg-primary w-100" data-toggle="collapse" href="#navbar-vertical" style="height: 65px; padding: 0 30px;">
                    <h6 class="text-dark m-0"><i class="fa fa-bars mr-2"></i>Danh mục sản phẩm</h6>
                    <i class="fa fa-angle-down text-dark"></i>
                </a>
                <nav class="collapse position-absolute navbar navbar-vertical navbar-light align-items-start p-0 bg-light" id="navbar-vertical" style="width: calc(100% - 30px); z-index: 999;">
                    <div class="navbar-nav w-100">
                        <a href="index.php?act=shop" class="nav-item nav-link">Balo học sinh - sinh viên</a>
                        <a href="index.php?act=shop2" class="nav-item nav-link">Balo thê thao</a>
                        <a href="index.php?act=shop3" class="nav-item nav-link">Balo đa năng</a>
                        <a href="index.php?act=shop4" class="nav-item nav-link">Balo laptop</a>
                        <a href="index.php?act=shop5" class="nav-item nav-link">Balo du lịch</a>
                    </div>
                </nav>
            </div>
            <div class="col-lg-9">
                <nav class="navbar navbar-expand-lg bg-dark navbar-dark py-3 py-lg-0 px-0">
                    <a href="" class="text-decoration-none d-block d-lg-none">
                        <span class="h1 text-uppercase text-dark bg-light px-2">Thế giới</span>
                        <span class="h1 text-uppercase text-light bg-primary px-2 ml-n1">Balo</span>
                    </a>
                    <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
                        <div class="navbar-nav mr-auto py-0">
                            <a href="index.php" class="nav-item nav-link active">Trang chủ</a>
                            <div class="nav-item dropdown">
                                <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">Sản phẩm<i class="fa fa-angle-down mt-1"></i></a>
                                <div class="dropdown-menu bg-primary rounded-0 border-0 m-0">
                                    <a href="index.php?act=shop" class="dropdown-item">Balo Học sinh - sinh viên</a>
                                    <a href="index.php?act=shop2" class="dropdown-item">Balo Thể Thao</a>
                                    <a href="index.php?act=shop3" class="dropdown-item">Balo Đa năng</a>
                                    <a href="index.php?act=shop4" class="dropdown-item">Balo Laptop</a>
                                    <a href="index.php?act=shop5" class="dropdown-item">Balo Du lịch</a>
                                    <a href="index.php?act=shop6" class="dropdown-item">Sản Phẩm Giảm Giá</a>
                                </div>
                            </div>
                            <a href="index.php?act=cart" class="nav-item nav-link">Giỏ hàng</a>
                            <a href="index.php" class="nav-item nav-link">Tin tức</a>
                            <a href="index.php?act=about" class="nav-item nav-link">Liên hệ</a>
                        </div>
                        <div class="navbar-nav ml-auto py-0 d-none d-lg-block">
                            <a href="index.php?act=cart" class="btn px-0 ml-3">
                                <i class="fas fa-shopping-cart text-primary"></i>
                                <span class="badge text-secondary border border-secondary rounded-circle" style="padding-bottom: 2px;"><?= count($_SESSION['giohang']) ?></span>
                            </a>
                        </div>
                    </div>
                </nav>
            </div>
        </div>
    </div>
    <!-- Navbar End -->