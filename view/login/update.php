<div class="row ">
    <div class="boxtral mr">
        <div class="row2 ">

        <div class="row2 font_title"> Cập nhật tài khoản</div> <br>
        <div class="row2 form_content">
            <?php
            $user="";
            $pass="";
            $email="";
            $address="";
            $tel="";
                if(isset($_SESSION['user'])&&(is_array($_SESSION['user']))){
                    extract($_SESSION['user']);

                }
            ?>
            <form action="index.php?act=edit_taikhoan" method="post" style="text-align: left;">
                <div class="row2 mb10">
                    Tên đăng nhập
                    <input type="text" name="user" value="<?=$user?>">
                </div>

                <div class="row2 mb10">
                    Mật khẩu
                    <input type="password" name="pass" value="<?=$pass?>">
                </div>

                <div class="row2 mb10">
                    Email
                    <input type="email" name="email" value="<?=$email?>">
                </div>

                <div class="row2 mb10">
                    Địa chỉ
                    <input type="text" name="address" value="<?=$address?>">
                </div>

                <div class="row2 mb10">
                    Số điện thoại
                    <input type="text" name="tel" value="<?=$tel?>">
                </div>
                
                <div class="row2 mb10">
                    <input type="hidden" name="id" value="<?=$id?>">
                    <input type="submit" value="Cập nhật" name="capnhat">
                    <input type="reset" value="Nhập lại">
                </div>
            </form>
                <h2 class="thongbao">
                    <?php 
                        if(isset($thongbao)&&($thongbao!="")){
                            echo $thongbao;
                        }
                    ?>
                </h2>
        </div>
        </div>
    </div>
</div>