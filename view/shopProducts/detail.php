 <!-- Breadcrumb Start -->
 <div class="container-fluid">
     <div class="row px-xl-5">
         <div class="col-12">
             <nav class="breadcrumb bg-light mb-30">
                 <a class="breadcrumb-item text-dark" href="#">Home</a>
                 <a class="breadcrumb-item text-dark" href="#">Shop</a>
                 <span class="breadcrumb-item active">Shop Detail</span>
             </nav>
         </div>
     </div>
 </div>
 <!-- Breadcrumb End -->

 <!-- Shop Detail Start -->
 <div class="container-fluid pb-5">
     <div class="row px-xl-5">
         <div class="col-lg-5 mb-30">
             <div id="product-carousel" class="carousel slide" data-ride="carousel">
                 <div class="carousel-inner bg-light">
                     <div class="carousel-item active">
                         <?php
                            if ($sanpham) {
                                extract($sanpham);
                                if (isset($product_image)) {
                                    $img_path = ''; // Thay đổi đường dẫn hình ảnh tại đây nếu cần
                                    $img = $image_path . $product_image;
                                    echo "<img src='$img' width='554'>";
                                } else {
                                    echo "Không có hình ảnh sản phẩm.";
                                }
                            } else {
                                echo "Sản phẩm không tồn tại.";
                            }
                            ?>
                     </div>
                 </div>
             </div>
         </div>
         <div class="col-lg-7 h-auto mb-30">
             <div class="h-100 bg-light p-30">
                 <h3>
                     <?php echo $product_name; ?>
                 </h3>
                 <div class="d-flex mb-3">
                     <div class="text-primary mr-2">
                         <small class="fas fa-star"></small>
                         <small class="fas fa-star"></small>
                         <small class="fas fa-star"></small>
                         <small class="fas fa-star-half-alt"></small>
                         <small class="far fa-star"></small>
                     </div>
                     <small class="pt-1">(99 Reviews)</small>
                 </div>
                 <h3 class="font-weight-semi-bold mb-4"><?php $price = loadone_products(0);
                                                        echo '$';
                                                        echo $product_new_price ?></h3>
                 <p class="mb-4">Volup erat ipsum diam elitr rebum et dolor. Est nonumy elitr erat diam stet sit
                     clita ea. Sanc ipsum et, labore clita lorem magna duo dolor no sea
                     Nonumy</p>
                 <div class="d-flex align-items-center mb-4 pt-2">
                     <?php
                        echo '  
                                <form action="index.php?act=addtocart" method="post" class="product-form">
                                    <input type="hidden" name="id_product" value="' . $id_product . '">
                                    <input type="hidden" name="product_name" value="' . $product_name . '">
                                    <input type="hidden" name="product_image" value="' . $product_image . '">
                                    <input type="hidden" name="product_new_price" value="' . $product_new_price . '">
                                    <input type="hidden" name="product_quantity" value="1"> 
                                    <button type="submit" name="click" class="btn btn-primary px-3">
                                        <i class="fa fa-shopping-cart mr-1">Thêm vào giỏ hàng</i>
                                    </button>
                                </form>'
                        ?>
                 </div>
                 <div class="d-flex pt-2">
                     <strong class="text-dark mr-2">Chia sẻ:</strong>
                     <div class="d-inline-flex">
                         <a class="text-dark px-2" href="https://www.facebook.com/">
                             <i class="fab fa-facebook-f"></i>
                         </a>
                         <a class="text-dark px-2" href="https://www.instagram.com/">
                             <i class="fab fa-instagram"></i>
                         </a>
                         <a class="text-dark px-2" href="https://twitter.com/?lang=en">
                             <i class="fab fa-twitter"></i>
                         </a>
                     </div>
                 </div>
             </div>
         </div>
     </div>
     <div class="row px-xl-5">
         <div class="col">
             <div class="bg-light p-30">
                 <div class="nav nav-tabs mb-4">
                     <a class="nav-item nav-link text-dark active" data-toggle="tab" href="#tab-pane-1">Thông tin sản phẩm</a>
                     <a class="nav-item nav-link text-dark" data-toggle="tab" href="#tab-pane-3">Đánh giá sản phẩm</a>
                 </div>
                 <div class="tab-content">
                     <div class="tab-pane fade show active" id="tab-pane-1">
                         <h4 class="mb-3">Mô tả sản phẩm</h4>
                         <p><?php
                            echo "<p>$product_mota</p>"; ?>
                         </p>
                     </div>
                     <div class="tab-pane fade" id="tab-pane-3">
                         <div class="row">
                             <div class="col-md-6">
                                 <h4 class="mb-4">Đánh giá cho sản phẩm</h4>
                                 <div class="media mb-4">
                                     <div class="media-body">
                                         <?php if (!empty($binhluan)) : ?>
                                             <table class="table table-bordered">
                                                 <thead>
                                                     <tr>
                                                         <th scope="col">Nội dung bình luận</th>
                                                         <th scope="col">Tác giả</th>
                                                         <th scope="col">Ngày bình luận</th>
                                                     </tr>
                                                 </thead>
                                                 <tbody>
                                                     <?php foreach ($binhluan as $value) : ?>
                                                         <tr>
                                                             <td><?php echo $value['content']; ?></td>
                                                             <td><?php echo $value['user']; ?></td>
                                                             <td><?php echo date("d/m/Y", strtotime($value['date'])); ?></td>
                                                         </tr>
                                                     <?php endforeach; ?>
                                                 </tbody>
                                             </table>
                                         <?php else : ?>
                                             <p>Không có bình luận nào.</p>
                                         <?php endif; ?>
                                     </div>
                                 </div>
                             </div>
                             <div class="col-md-6">
                                 <h4 class="mb-4">Viết một đánh giá</h4>
                                 <div class="box_search">
                                     <?php if (isset($_SESSION['User']['iduser'])) : ?>
                                         <form action="index.php?act=product_detail&id_product=<?= $id_product ?>" method="POST">
                                             <div class="form-group">
                                                 <label for="message">Nội dung đánh giá của bạn</label>
                                                 <textarea id="message" name="content" cols="30" rows="5" class="form-control" required></textarea>
                                             </div>
                                             <input type="hidden" name="id_product" value="<?= $id_product ?>">
                                             <input type="hidden" name="iduser" value="<?= $_SESSION['User']['iduser'] ?>">
                                             <div class="form-group mb-0">
                                                 <input type="submit" name="guibinhluan" value="Gửi đánh giá" class="btn btn-primary px-3">
                                             </div>
                                         </form>
                                     <?php else : ?>
                                         <p>Vui lòng đăng nhập để đánh giá sản phẩm.</p>
                                     <?php endif; ?>
                                 </div>
                             </div>
                         </div>
                     </div>
                 </div>
             </div>
         </div>
     </div>
 </div>
 <!-- Shop Detail End -->

 <!-- Products Start -->
 <div class="container-fluid py-5">
     <h2 class="section-title position-relative text-uppercase mx-xl-5 mb-4">
         <span class="bg-secondary pr-3">Các sản phẩm khác</span>
     </h2>
     <div class="row px-xl-5">
         <div class="col">
             <div class="owl-carousel related-carousel">
                 <?php
                    foreach ($sanphamcl as $value) {
                        // Đường dẫn hình ảnh của sản phẩm
                        $img = $image_path . $value['product_image'];
                    ?>
                     <div class="item" style="display: flex; align-items:center; justify-content: center;">
                         <a href="index.php?act=product_detail&id_product=<?= $value['id_product'] ?>">
                             <img style="width: 321px; height: 270px;" src="<?= $img ?>" alt="<?= $value['product_name'] ?>" class="img-fluid">
                         </a>
                     </div>
                 <?php } ?>
             </div>
         </div>
     </div>
 </div>
 <!-- Products End -->

 <script>
     document.getElementById('click', function(event) {
         alert("Vui lòng đăng nhập tài khoản trước khi thực hiện thao tác này.");
         window.location.href("index.php?act=dangnhap");
     })
 </script>