<!-- Breadcrumb Start -->
<div class="container-fluid">
    <div class="row px-xl-5">
        <div class="col-12">
            <nav class="breadcrumb bg-light mb-30">
                <a class="breadcrumb-item text-dark" href="index.php">Home</a>
                <a class="breadcrumb-item text-dark" href="index.php?act=shop">Shop</a>
                <span class="breadcrumb-item active">Balo Đa Năng</span>
            </nav>
        </div>
    </div>
</div>
<!-- Breadcrumb End -->

<!-- Shop Start -->
<div class="container-fluid">
    <div class="row px-xl-5">
        <!-- Shop Sidebar Start -->
        <div class="col-lg-3 col-md-4">
            <!-- Price Start -->
            <h5 class="section-title position-relative text-uppercase mb-3"><span class="bg-secondary pr-3">Filter by price</span></h5>
            <div class="bg-light p-4 mb-30">
                <form id="price-filter-form" method="post" action="">
                    <input type="hidden" name="id_category" value="<?php echo $id_category; ?>">
                    <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
                        <input type="checkbox" class="custom-control-input" name="price_filter[]" value="all" id="price-all">
                        <label class="custom-control-label" for="price-all">All Price</label>
                    </div>
                    <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
                        <input type="checkbox" class="custom-control-input" name="price_filter[]" value="0-500" id="price-1">
                        <label class="custom-control-label" for="price-1">$0 - $500</label>
                    </div>
                    <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
                        <input type="checkbox" class="custom-control-input" name="price_filter[]" value="501-1000" id="price-2">
                        <label class="custom-control-label" for="price-2">$501 - $1000</label>
                    </div>
                    <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
                        <input type="checkbox" class="custom-control-input" name="price_filter[]" value="1001-2000" id="price-3">
                        <label class="custom-control-label" for="price-3">$1001 - $2000</label>
                    </div>
                    <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
                        <input type="checkbox" class="custom-control-input" name="price_filter[]" value="2001-3000" id="price-4">
                        <label class="custom-control-label" for="price-4">$2001 - $3000</label>
                    </div>
                    <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between">
                        <input type="checkbox" class="custom-control-input" name="price_filter[]" value=">3000" id="price-5">
                        <label class="custom-control-label" for="price-5">> $3000</label>
                    </div>
                    <button type="submit" class="btn btn-primary">Filter</button>
                </form>
            </div>
            <!-- Price End -->


            <?php
            $id_category = isset($_POST['id_category']) ? intval($_POST['id_category']) : 3;
            $price_filters = isset($_POST['price_filter']) ? $_POST['price_filter'] : [];

            $where_clauses = [];

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

            $where_clause = " WHERE id_category = 3";
            if (!empty($where_clauses)) {
                $where_clause .= " AND (" . implode(" OR ", $where_clauses) . ")";
            }

            $sql = "SELECT * FROM products" . $where_clause . " LIMIT 9";
            $filtered_products = pdo_query($sql);
            ?>

            <!-- Color Start -->
            <h5 class="section-title position-relative text-uppercase mb-3"><span class="bg-secondary pr-3">Filter by color</span></h5>
            <div class="bg-light p-4 mb-30">
                <form>
                    <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
                        <input type="checkbox" class="custom-control-input" checked id="color-all">
                        <label class="custom-control-label" for="price-all">All Color</label>
                        <span class="badge border font-weight-normal">1000</span>
                    </div>
                    <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
                        <input type="checkbox" class="custom-control-input" id="color-1">
                        <label class="custom-control-label" for="color-1">Black</label>
                        <span class="badge border font-weight-normal">150</span>
                    </div>
                    <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
                        <input type="checkbox" class="custom-control-input" id="color-2">
                        <label class="custom-control-label" for="color-2">White</label>
                        <span class="badge border font-weight-normal">295</span>
                    </div>
                    <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
                        <input type="checkbox" class="custom-control-input" id="color-3">
                        <label class="custom-control-label" for="color-3">Red</label>
                        <span class="badge border font-weight-normal">246</span>
                    </div>
                    <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
                        <input type="checkbox" class="custom-control-input" id="color-4">
                        <label class="custom-control-label" for="color-4">Blue</label>
                        <span class="badge border font-weight-normal">145</span>
                    </div>
                    <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between">
                        <input type="checkbox" class="custom-control-input" id="color-5">
                        <label class="custom-control-label" for="color-5">Green</label>
                        <span class="badge border font-weight-normal">168</span>
                    </div>
                </form>
            </div>
            <!-- Color End -->
        </div>
        <!-- Shop Sidebar End -->


        <!-- Shop Product Start -->
        <div class="col-lg-9 col-md-8">
            <div class="row pb-3">
                <div class="col-12 pb-1">
                    <div class="d-flex align-items-center justify-content-between mb-4">
                        <div>
                            <button class="btn btn-sm btn-light"><i class="fa fa-th-large"></i></button>
                            <button class="btn btn-sm btn-light ml-2"><i class="fa fa-bars"></i></button>
                        </div>
                        <h1>BALO ĐA NĂNG</h1>
                        <div class="ml-2">
                            <div class="btn-group">
                                <button type="button" class="btn btn-sm btn-light dropdown-toggle" data-toggle="dropdown">Sorting</button>
                                <div class="dropdown-menu dropdown-menu-right">
                                    <a class="dropdown-item" href="#">Latest</a>
                                    <a class="dropdown-item" href="#">Popularity</a>
                                    <a class="dropdown-item" href="#">Best Rating</a>
                                </div>
                            </div>
                            <div class="btn-group ml-2">
                                <button type="button" class="btn btn-sm btn-light dropdown-toggle" data-toggle="dropdown">Showing</button>
                                <div class="dropdown-menu dropdown-menu-right">
                                    <a class="dropdown-item" href="#">10</a>
                                    <a class="dropdown-item" href="#">20</a>
                                    <a class="dropdown-item" href="#">30</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <?php
                $i = 0;
                $sql = "Select * from products where id_category= 3 limit 9";
                $spnew = pdo_query($sql);
                foreach ($spnew as $sp) {
                    extract($sp);
                    $hinh = $image_path . $product_image;
                    $mr = ($i == 2 || $i == 5 || $i == 8) ? "" : "mr";
                    $linksp = "index.php?act=product_detail&id_product=" . $id_product;

                    echo '<div class="col-lg-4 col-md-6 col-sm-6 pb-1 ' . $mr . '">
                                <style>
                                    .product-item .product-action {
                                        opacity: 0;
                                        visibility: hidden;
                                        transition: opacity 0.3s, visibility 0.3s;
                                    }

                                    .product-item:hover .product-action {
                                        opacity: 1;
                                        visibility: visible;
                                    }

                                    .product-item .product-action form {
                                        display: inline-block;
                                    }

                                    .product-item .product-action form button {
                                        display: inline-block;
                                    }
                                </style>
                                <div class="product-item bg-light mb-4">
                                    <div class="product-img position-relative overflow-hidden">
                                        <img style="width: 100%; height: 300px" class="img-fluid w-100" src="' . $hinh . '" alt="">
                                        <div class="product-action">
                                            <form action="index.php?act=addtocart" method="post" class="product-form">
                                                <input type="hidden" name="id_product" value="' . $id_product . '">
                                                <input type="hidden" name="product_name" value="' . $product_name . '">
                                                <input type="hidden" name="product_image" value="' . $product_image . '">
                                                <input type="hidden" name="product_new_price" value="' . $product_new_price . '">
                                                <input type="hidden" name="product_quantity" value="1"> 
                                                <button type="submit" id="addtocart" class="btn btn-outline-dark btn-square">
                                                    <i class="fa fa-shopping-cart"></i>
                                                </button>
                                            </form>
                                            <a class="btn btn-outline-dark btn-square" href=""><i class="far fa-heart"></i></a>
                                            <a class="btn btn-outline-dark btn-square" href=""><i class="fa fa-sync-alt"></i></a>
                                            <a class="btn btn-outline-dark btn-square" href="' . $linksp . '"><i class="fa fa-search"></i></a>    
                                        </div>
                                    </div>
                                    <div style="margin: 0 0 0 0.1rem; font-size: 14px; word-break: break-all; overflow-wrap: break-word; hyphens: auto" class="text-center py-4">
                                        <aclass="h6 text-decoration-none text-truncate" href="' . $linksp . '">' . $product_name . '</aclass=>
                                        <div class="d-flex align-items-center justify-content-center mt-2">
                                            <h4><p style="margin: 0 9px 0 0;" class="text-muted ml-2">$' . $product_new_price . '</p></h4>
                                        </div>
                                        <div class="d-flex align-items-center justify-content-center mb-1">
                                            <small class="fa fa-star text-primary mr-1"></small>
                                            <small class="fa fa-star text-primary mr-1"></small>
                                            <small class="fa fa-star text-primary mr-1"></small>
                                            <small class="fa fa-star text-primary mr-1"></small>
                                            <small class="fa fa-star text-primary mr-1"></small>
                                            <small>(99)</small>
                                        </div>
                                    </div>
                                </div>
                            </div>';
                    $i += 1;
                }
                ?>

                <div class="col-12">
                    <nav>
                        <ul class="pagination justify-content-center">
                            <li class="page-item"><a class="page-link" href="index.php?act=shop2">Previous</span></a></li>
                            <li class="page-item"><a class="page-link" href="index.php?act=shop">1</a></li>
                            <li class="page-item"><a class="page-link" href="index.php?act=shop2">2</a></li>
                            <li class="page-item active"><a class="page-link" href="index.php?act=shop3">3</a></li>
                            <li class="page-item"><a class="page-link" href="index.php?act=shop4">4</a></li>
                            <li class="page-item"><a class="page-link" href="index.php?act=shop5">5</a></li>
                            <li class="page-item"><a class="page-link" href="index.php?act=shop6">6</a></li>
                            <li class="page-item"><a class="page-link" href="index.php?act=shop4">Next</a></li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
        <!-- Shop Product End -->
    </div>
</div>
<!-- Shop End -->