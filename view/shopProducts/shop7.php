<!-- Breadcrumb Start -->
<div class="container-fluid">
    <div class="row px-xl-5">
        <div class="col-12">
            <nav class="breadcrumb bg-light mb-30">
                <a class="breadcrumb-item text-dark" href="index.php">Home</a>
                <a class="breadcrumb-item text-dark" href="index.php?act=shop">Shop</a>
            </nav>
        </div>
    </div>
</div>
<!-- Breadcrumb End -->

<!-- Shop Start -->
<div class="container-fluid">
    <div class="row px-xl-5">
        <!-- Shop Product Start -->
        <div class="col-lg-12 col-md-8">
            <div class="row pb-3">
                <div class="col-12 pb-1">
                    <div class="d-flex align-items-center justify-content-between mb-4">
                        <div>
                            <button class="btn btn-sm btn-light"><i class="fa fa-th-large"></i></button>
                            <button class="btn btn-sm btn-light ml-2"><i class="fa fa-bars"></i></button>
                        </div>
                        <h1>Từ khóa tìm kiếm: <?= $search ?></h1>
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
                // Kiểm tra nếu có sản phẩm tìm kiếm
                $i = 0;
                if (!empty($list_product)) {
                    foreach ($list_product as $product) {
                        extract($product);
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
                } else {
                    echo '<p>Không tìm thấy sản phẩm nào.</p>';
                }
                ?>

                <div class="col-12">
                    <nav>
                        <ul class="pagination justify-content-center">
                            <li class="page-item"><a class="page-link" href="index.php?act=shop5">Previous</a></li>
                            <li class="page-item"><a class="page-link" href="index.php?act=shop0">1</a></li>
                            <li class="page-item"><a class="page-link" href="index.php?act=shop2">2</a></li>
                            <li class="page-item"><a class="page-link" href="index.php?act=shop3">3</a></li>
                            <li class="page-item"><a class="page-link" href="index.php?act=shop4">4</a></li>
                            <li class="page-item"><a class="page-link" href="index.php?act=shop5">5</a></li>
                            <li class="page-item"><a class="page-link" href="index.php?act=shop6">6</a></li>
                            <li class="page-item"><a class="page-link" href="index.php?act=shop1">Next</a></li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
        <!-- Shop Product End -->
    </div>
</div>
<!-- Shop End -->