<?php
 session_start();
include('includes/config.php');
include('chan-bieu-mau/cbm.php');
$msg=0;
if(isset($_POST['login']))
  {
    $uname=$_POST['username'];
    $password=$_POST['password'];
    // Fetch data from database on the basis of username/email and password
$sql =mysqli_query($con,"SELECT AdminUserName,AdminEmailId,AdminPassword FROM admin WHERE (AdminUserName='$uname' || AdminEmailId='$uname')");
$num=mysqli_fetch_array($sql);
if($num>0)
{
$hashpassword=$num['AdminPassword']; // Lấy Password đã được mã từ csdl
//verifying Password with password_verify()
if (password_verify($password, $hashpassword)) {
$_SESSION['login']=$_POST['username'];
    echo "<script type='text/javascript'> document.location = 'dashboard.php'; </script>";
  } else {
    $msg='Wrong Password!';
  }
}
else{
    $msg='User not registered with us!';
}
 
}
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <LINK REL="SHORTCUT ICON"  HREF="./images/logo-team-1.png">
        <!-- App title -->
        <title>Quản lý | Đăng nhập</title>
        <!-- App css -->   
        <link rel="stylesheet" href="css/style-lg1.css">
    </head>
<body style="background-image: url('images/banner-04.jpg');" >
<?php if($msg){?>
            <div class="alert alert-success mx-auto" style="display: inline-block;margin-top:50px;margin-left: 25rem;width: 40%;border:1px solid #4bd396;color:#4bd396;border-radius: 9px;padding:3px;text-align:center;" role="alert">
                <?php echo $msg?>
            </div>
        <?php }?>
    <div class="sub-div"></div>
    <form class="box" method="post" type='box'>
        <h1>ĐĂNG NHẬP</h1>
        <input type="text" name="username" required placeholder="Tên đăng nhập hoặc email">
        <input type="password" name="password" required placeholder="Mật khẩu">
        <input type="submit" name="login" value="Đăng nhập">
    </form>
    <div class="txt-ques">Chưa có tài khoản? <a  href="register.php">Đăng kí ngay!</a></div>
</body>
</html>