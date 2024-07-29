<main class="catalog mb">
    <div class="boxleft">
        <h1 class="box_title">Quên mật khẩu</h1>
        <div class="box_content form_account">
            <h5>Vui lòng điền email để lấy lại mật khẩu</h5>
            <p>Bạn muốn thử đăng nhập lại? Vui lòng <a href="index.php?act=dangnhap">Đăng nhập</a></p>
            <form action="index.php?act=quenmk" method="post">
                <div>
                    <p>Email</p>
                    <input type="email" name="email" placeholder="Nhập email" required>
                </div>
                <input type="submit" value="Gửi" name="guiemail">
                <button type="reset">Nhập lại</button>
                <br>
                <?php
                if (isset($thongbao) && ($thongbao != '')) {
                    echo $thongbao;
                }
                ?>
            </form>
        </div>
    </div>
</main>