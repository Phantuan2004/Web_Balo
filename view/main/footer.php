    <!-- Footer Start -->
    <div class="container-fluid bg-dark text-secondary mt-5 pt-5">
        <div class="row px-xl-5 pt-5">
            <div class="col-lg-4 col-md-12 mb-5 pr-3 pr-xl-5">
                <h5 class="text-secondary text-uppercase mb-4">Mọi thắc mắc hãy liên hệ:</h5>
                <p class="mb-2"><i class="fa fa-map-marker-alt text-primary mr-3"></i>Trịnh Văn Bô, Hà Nội</p>
                <p class="mb-2"><i class="fa fa-envelope text-primary mr-3"></i>@fptpoly.edu.vn</p>
                <p class="mb-0"><i class="fa fa-phone-alt text-primary mr-3"></i>+012 345 67890</p>
            </div>
            <div class="col-lg-8 col-md-12">
                <div class="row">
                    <div class="col-md-4 mb-5">
                        <h5 class="text-secondary text-uppercase mb-4">Cửa hàng tiện ích</h5>
                        <div class="d-flex flex-column justify-content-start">
                            <a class="text-secondary mb-2" href="index.php"><i class="fa fa-angle-right mr-2"></i>Trang chủ</a>
                            <a class="text-secondary mb-2" href="index.php?act=shop"><i class="fa fa-angle-right mr-2"></i>Cửa hàng</a>
                            <a class="text-secondary mb-2" href="index.php?act=detail"><i class="fa fa-angle-right mr-2"></i>Chi tiết cửa hàng</a>
                            <a class="text-secondary mb-2" href="index.php?act=cart"><i class="fa fa-angle-right mr-2"></i>Giỏ hàng</a>
                            <a class="text-secondary mb-2" href="index.php?act=checkout"><i class="fa fa-angle-right mr-2"></i>Thanh toán</a>
                            <a class="text-secondary" href="index.php?act=about"><i class="fa fa-angle-right mr-2"></i>Liên hệ</a>
                        </div>
                    </div>
                    <div class="col-md-4 mb-5">
                        <h5 class="text-secondary text-uppercase mb-4">Tài khoản</h5>
                        <div class="d-flex flex-column justify-content-start">
                            <a class="text-secondary mb-2" href="index.php?act=dangky"><i class="fa fa-angle-right mr-2"></i>Đăng ký</a>
                            <a class="text-secondary mb-2" href="index.php?act=dangnhap"><i class="fa fa-angle-right mr-2"></i>Đăng nhập</a>
                        </div>
                    </div>
                    <div class="col-md-4 mb-5">
                        <h5 class="text-secondary text-uppercase mb-4">Bản tin</h5>
                        <p>Chúng tôi luôn cập nhật những sản phẩm chất lượng đến tay khách hàng</p>
                        <form action="">
                            <div class="input-group">
                                <input type="text" class="form-control" placeholder="Your Email Address">
                                <div class="input-group-append">
                                    <button class="btn btn-primary">Sign Up</button>
                                </div>
                            </div>
                        </form>
                        <h6 class="text-secondary text-uppercase mt-4 mb-3">Theo dõi</h6>
                        <div class="d-flex">
                            <a class="btn btn-primary btn-square mr-2" href="https://twitter.com"><i class="fab fa-twitter"></i></a>
                            <a class="btn btn-primary btn-square mr-2" href="https://www.facebook.com"><i class="fab fa-facebook-f"></i></a>
                            <a class="btn btn-primary btn-square mr-2" href="https://linkedin.com"><i class="fab fa-linkedin-in"></i></a>
                            <a class="btn btn-primary btn-square" href="https://instagram.com"><i class="fab fa-instagram"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row border-top mx-xl-5 py-4" style="border-color: rgba(256, 256, 256, .1) !important;">
            <div class="col-md-6 px-xl-0">
                <p class="mb-md-0 text-center text-md-left text-secondary">
                    &copy; <a class="text-primary" href="#">Domain</a>. All Rights Reserved. Designed
                    by
                    <a class="text-primary" href="https://htmlcodex.com">HTML Codex</a>
                    <br>Distributed By: <a href="https://themewagon.com" target="_blank">ThemeWagon</a>
                </p>
            </div>
            <div class="col-md-6 px-xl-0 text-center text-md-right">
                <img class="img-fluid" src="img/payments.png" alt="">
            </div>
        </div>
    </div>
    <!-- Footer End -->
    <script>
        document.getElementById("addtocart").addEventListener("click", function(event) {
            // Kiểm tra trạng thái đăng nhập của người dùng trước khi thêm vào giỏ hàng
            if (!<?php echo isset($_SESSION['User']) && !empty($_SESSION['User']) ? 'true' : 'false'; ?>) {
                event.preventDefault();
                alert("Vui lòng đăng nhập để thêm sản phẩm vào giỏ hàng");
                window.location.href = "index.php?act=dangnhap";
            }
        });
    </script>

    <!-- Back to Top -->
    <a href="#" class="btn btn-primary back-to-top"><i class="fa fa-angle-double-up"></i></a>


    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
    <script src="view/lib/easing/easing.min.js"></script>
    <script src="view/lib/owlcarousel/owl.carousel.min.js"></script>

    <!-- Contact Javascript File -->
    <script src="view/mail/jqBootstrapValidation.min.js"></script>
    <script src="view/mail/contact.js"></script>

    <!-- Template Javascript -->
    <script src="view/js/main.js"></script>

    <!-- Jquery-Script -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    </body>

    </html>