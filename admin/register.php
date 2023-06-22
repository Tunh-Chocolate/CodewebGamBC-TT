<?php
 session_start();
include('includes/config.php');
include('chan-bieu-mau/cbm.php');
if(isset($_POST['register'] )){
    if($_POST['username'] !='' && $_POST['email'] !='' && $_POST['password']!=''&& $_POST['repassword']!='')
    {
        $uname=$_POST['username'];
        $email=$_POST['email'];
        $password=$_POST['password'];
        $repassword=$_POST['repassword'];
        $status = 1;
        $today = date("y-m-d h:i:s");
        if ($password != $repassword) {
            echo "<script>alert('Password and re-entered password do not match, please try again !');</script>";
        }
        $check = "SELECT * FROM admin WHERE AdminUserName = '$uname'";
        $old = mysqli_query($con,$check);
        if(mysqli_num_rows($old) > 0){
            echo "<script>alert('Someone has registered for this account, please try again!');</script>";
        }else{
        $password = password_hash("$password", PASSWORD_BCRYPT);//mã hash mật khẩu
        $query=mysqli_query($con,"insert into admin(AdminUserName,AdminPassword,AdminEmailId,Is_Active,CreationDate) values ('$uname','$password','$email','$status','$today')");
        if($query){
            echo "<script type='text/javascript' >alert('Sign Up Success! Log in now!');document.location = 'index.php'</script>";
        }else{
            echo "<script type='text/javascript' >alert('Could not 'query' data!');</script>";
        }
        }
    }else{ 
        echo "<script>alert('Information cannot be empty!');</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="News Portal.">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- App title -->
        <title>News Portal | Register</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
        <!-- App css -->    
        <link rel="stylesheet" href="./css/style1.css">
    </head>
<body style="background-image: url('images/banner-04.jpg');" >
<style>
    input{
        background-color: #0c1d2830;
    }
    .but{
        background-color: #478aed00;
    border: 1px solid white;
    color: white;
    border-radius: 5px;
    }
</style>
<div class=" container align-self-center" style="margin-top: 100px;">
  <div class="row"> 
    <div class="mx-auto col-6" style="background-color: #161a21;
    padding: 25px;
    border-radius: 10px;
    box-shadow: 11px 11px 2px #0c0e12;">
    
    <form class="rounded" method="post" id="signInBox">
        <div class="text-center account-logo-box" id="accountLogo-1" >
            <a href="index.php" class="">
                <span >
                    <img src="images/logo-team.png" alt="" height="35">
                    <h5 class="text-uppercase font-bold m-b-0" id="txtSignIn" style="margin-bottom:10px;">Sign Up</h5>
                </span>
            </a>
        </div>
        <div class="form-group inputSignin mx-auto" style="margin-top: 30px;">
            <div class="col-xs-6">
                <input class="form-control" type="text" required="" name="username" placeholder="Username" autocomplete="off">
            </div>
        </div>
        <div class="form-group inputSignin mx-auto" >
            <div class="col-xs-6">
                <input class="form-control" type="text" required="" name="email" placeholder="Email" autocomplete="off">
            </div>
        </div>
        <div class="form-group inputSignin mx-auto">
            <div class="col-xs-6">
                <input class="form-control" type="password" name="password" required="" placeholder="Password" autocomplete="off">
            </div>
        </div>
        <div class="form-group inputSignin mx-auto">
            <div class="col-xs-6">
                <input class="form-control" type="password" name="repassword" required="" placeholder="Re-Password" autocomplete="off">
            </div>
        </div>
        <div class="qs" style="    color: #b6b7db;text-align:center;">
            Already have an account?<span><a href="index.php">&nbsp;Sign In!</a></span>
        </div>
        <div class="form-group account-btn text-center m-t-10" style="height: 22px;margin-top: 10px;">
            <div class="col-xs-24">
                <button class="but" type="submit" name="register">Đăng kí</button>
            </div>  
        </div>
    </form>
    </div>
  </div>
  </div>
</div>
    </body>
</html>