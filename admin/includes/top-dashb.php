<style>
    #logoAdmin{
    width: 40px;
    height: 40px;
    float: right;
    margin: 7px;
    margin-right: 12px;
}
#logoAdmin>img{
    width: 100%;
}
marquee{
    display: inline-block;
    width: 15%;
    margin-left: 18rem;
    color: #ededed;
    text-shadow: 1px 1px 3px black;
    font-size: 17px;
    letter-spacing: 3px;
}

</style>
<script>
    var delayInMilliseconds = 3600;

    setTimeout(function() {
        document.getElementById('bien-mat').style="display:none"
    }, delayInMilliseconds);
</script>
<!-- ***** Preloader Start ***** -->
    <div id="preloader">
        <div class="jumper">
            <div></div>
            <div></div>
            <div></div>
        </div>
    </div>  
    <script>
        var delayWal = 600;
        setTimeout(function() {
            document.getElementById('preloader').style="display:none"
}, delayWal);
    </script>
<!-- ***** Preloader End ***** -->
<div class="header-dash">
    <div>ADMIN</div>
    <marquee direction='up' scrollamount='1.5' behavior='slide' id="bien-mat">Welcome!</marquee>
    <ul>
        <li>
            <div id="logoAdmin" data-toggle="collapse" href="#admin" role="button" aria-expanded="false" aria-controls="collapseExample">
                <img src="images/usericon.png" alt="user-img" class="rounded-circle">
            </div>
        </li>
        <li>
            <div class="collapse" id="admin">
                <ul>
                    <li>
                        <h5>Xin chào, Admin!</h5>
                    </li>
                    <li><a href="change-password.php"><i class="ti-settings m-r-5"></i>Đổi mật khẩu</a></li>
                    <li><a href="index.php"><i class="ti-power-off m-r-5"></i>Đăng xuất</a></li>
                </ul>
            </div>
        </li>
    </ul>
</div>