<!-- Contact Start -->
<div class="container-fluid">
    <h2 class="section-title position-relative text-uppercase mx-xl-5 mb-4"><span class="bg-secondary pr-3">Liên hệ:</span></h2>
    <div class="row px-xl-5">
        <div class="col-lg-7 mb-5">
            <div class="contact-form bg-light p-30">
                <div id="success"></div>
                <form name="sentMessage" id="contactForm" novalidate="novalidate">
                    <div class="control-group">
                        <input type="text" class="form-control" id="name" placeholder="Họ và tên" required="required" data-validation-required-message="Vui lòng nhập họ và tên!" />
                        <p class="help-block text-danger"></p>
                    </div>

                    <div class="control-group">
                        <input type="text" class="form-control" id="phone" placeholder="Số điện thoại" required="required" data-validation-required-message="Vui lòng nhập số điện thoại!" />
                        <p class="help-block text-danger"></p>
                    </div>

                    <div class="control-group">
                        <input type="email" class="form-control" id="email" placeholder="Email" required="required" data-validation-required-message="Vui lòng nhập email!" />
                        <p class="help-block text-danger"></p>
                    </div>

                    <div class="control-group">
                        <textarea class="form-control" rows="8" id="message" placeholder="Nội dung" required="required" data-validation-required-message="Vui lòng nhập nội dung!"></textarea>
                        <p class="help-block text-danger"></p>
                    </div>

                    <div>
                        <button class="btn btn-primary py-2 px-4" type="submit" id="sendMessageButton">Gửi nội dung</button>
                    </div>
                </form>
            </div>
        </div>
        <div class="col-lg-5 mb-5">
            <div class="bg-light p-30 mb-30">
                <iframe style="width: 100%; height: 250px;" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3001156.4288297426!2d-78.01371936852176!3d42.72876761954724!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x4ccc4bf0f123a5a9%3A0xddcfc6c1de189567!2sNew%20York%2C%20USA!5e0!3m2!1sen!2sbd!4v1603794290143!5m2!1sen!2sbd" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
            </div>
            <div class="bg-light p-30 mb-3">
                <p class="mb-2"><i class="fa fa-map-marker-alt text-primary mr-3"></i>Trịnh Văn Bô, Hà Nội</p>
                <p class="mb-2"><i class="fa fa-envelope text-primary mr-3"></i>@fptpoly.edu.vn</p>
                <p class="mb-2"><i class="fa fa-phone-alt text-primary mr-3"></i>+012 345 67890</p>
            </div>
        </div>
    </div>
</div>
<!-- Contact End -->

<script>
    document.getElementById('sendMessageButton').addEventListener('click', function(event) {
        event.preventDefault(); // Ngăn chặn hành vi mặc định của nút submit
        alert('Gửi thông tin thành công!!!');
        window.location.reload();
    });
</script>