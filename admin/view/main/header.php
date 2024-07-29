<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <link rel="apple-touch-icon" sizes="76x76" href="view/paper-dashboard-master/paper-dashboard-master/assets/img/apple-icon.png" />
    <link rel="icon" type="image/png" href="view/paper-dashboard-master/paper-dashboard-master/assets/img/favicon.png" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>Admin Backpack World</title>
    <meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no" name="viewport" />
    <!--     Fonts and icons     -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet" />
    <!-- CSS Files -->
    <link href="view/paper-dashboard-master/paper-dashboard-master/assets/css/bootstrap.min.css" rel="stylesheet" />
    <link href="view/paper-dashboard-master/paper-dashboard-master/assets/css/paper-dashboard.css?v=2.0.1" rel="stylesheet" />
    <!-- CSS Just for demo purpose, don't include it in your project -->
    <link href="view/paper-dashboard-master/paper-dashboard-master/assets/demo/demo.css" rel="stylesheet" />
    <script src="https://kit.fontawesome.com/9046a62732.js" crossorigin="anonymous"></script>
</head>
<style>
    .nav-items a :hover {
        color: orangered;
    }

    .nav-items font {
        color: orangered;
    }

    .nav-items :hover {
        animation: navbar ease-in 0.5s;
    }

    @keyframes navbar {
        from {
            left: 0%;
            top: 0;
        }

        to {
            left: 10px;
            top: 0;
        }
    }
</style>

<body class="">
    <div class="wrapper">
        <div class="sidebar" data-color="white" data-active-color="danger">
            <div class="logo">
                <a href="index.php" class="simple-text logo-mini">
                    <div class="logo-image-small">
                        <img src="view/paper-dashboard-master/paper-dashboard-master/assets/img/logo-small.png" />
                    </div>
                    <!-- <p>CT</p> -->
                </a>
                <a href="index.php" class="simple-text logo-normal">
                    ADMIN
                    <!-- <div class="logo-image-big">
            <img src="../assets/img/logo-big.png">
          </div> -->
                </a>
            </div>
            <div class="sidebar-wrapper">
                <ul class="nav">
                    <li class="nav-items">
                        <a href="index.php">
                            <i class="nc-icon nc-bank "></i>
                            <p>Dashboard</p>
                        </a>
                    </li>
                    <li class="nav-items">
                        <a href="index.php?act=danhmuc">
                            <i class="nc-icon nc-bullet-list-67 "></i>
                            <p>Danh mục sản phẩm</p>
                        </a>
                    </li>
                    <li class="nav-items">
                        <a href="index.php?act=product">
                            <i class="nc-icon nc-basket"></i>
                            <p>Sản phẩm</p>
                        </a>
                    </li>
                    <li class="nav-items">
                        <a href="index.php?act=user">
                            <i class="nc-icon nc-single-02"></i>
                            <p>Tài khoản người dùng</p>
                        </a>
                    </li>
                    <li class="nav-items">
                        <a href="index.php?act=binhluan">
                            <i class="nc-icon nc-chat-33"></i>
                            <p>Bình luận sản phẩm</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <div class="nav-item btn-rotate dropdown" style="padding-left: 0.4vw" ;>
                            <button class="btn btn-sm btn-light dropdown-toggle bg-secondary" data-toggle="dropdown"><i class="nc-icon nc-bag-16"></i>Đơn hàng</button>
                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                                <a href="index.php?act=cart" class="dropdown-item bg-light "><i class="nc-icon nc-cart-simple"></i>Giỏ hàng</a>
                                <a href="index.php?act=bill" class="dropdown-item bg-light"><i class="nc-icon nc-paper"></i>Hóa đơn</a>
                            </div>
                        </div>
                    </li>
                    <li class="nav-items">
                        <a href=" index.php?act=tables">
                            <i class="nc-icon nc-tile-56"></i>
                            <p>Danh sách thống kê</p>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="main-panel">
            <!-- Navbar -->
            <nav class="navbar navbar-expand-lg navbar-absolute fixed-top navbar-transparent">
                <div class="container-fluid">
                    <div class="navbar-wrapper">
                        <div class="navbar-toggle">
                            <button type="button" class="navbar-toggler">
                                <span class="navbar-toggler-bar bar1"></span>
                                <span class="navbar-toggler-bar bar2"></span>
                                <span class="navbar-toggler-bar bar3"></span>
                            </button>
                        </div>
                        <a class="navbar-brand" style="font-family: 'Times New Roman', Times, serif;" href="javascript:;">Chào mừng bạn quay trở lại</a>
                    </div>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-bar navbar-kebab"></span>
                        <span class="navbar-toggler-bar navbar-kebab"></span>
                        <span class="navbar-toggler-bar navbar-kebab"></span>
                    </button>
                    <div class="collapse navbar-collapse justify-content-end" id="navigation">
                        <form>
                            <div class="input-group no-border">
                                <input type="text" value="" class="form-control" placeholder="Search..." />
                                <div class="input-group-append">
                                    <div class="input-group-text">
                                        <i class="nc-icon nc-zoom-split"></i>
                                    </div>
                                </div>
                            </div>
                        </form>
                        <ul class="navbar-nav">
                            <li class="nav-item">
                                <a class="nav-link btn-magnify" href="javascript:;">
                                    <i class="nc-icon nc-layout-11"></i>
                                    <p>
                                        <span class="d-lg-none d-md-block">Stats</span>
                                    </p>
                                </a>
                            </li>
                            <li class="nav-item btn-rotate dropdown">
                                <a class="nav-link dropdown-toggle" href="http://example.com" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="nc-icon nc-bell-55"></i>
                                    <p>
                                        <span class="d-lg-none d-md-block">Some Actions</span>
                                    </p>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                                    <a class="dropdown-item" href="#">Action</a>
                                    <a class="dropdown-item" href="#">Another action</a>
                                    <a class="dropdown-item" href="#">Something else here</a>
                                </div>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link btn-rotate" href="javascript:; " style="margin-bottom: -0.8vh;">
                                    <a href="../index.php"><i class="fa-solid fa-right-from-bracket"></i></a>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
            <!-- End Navbar -->