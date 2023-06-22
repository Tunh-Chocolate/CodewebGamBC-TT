<?php
session_start();
include('../admin/includes/config.php');

if(isset($_POST['submit']))
    {
        $name=$_POST['name'];     
        $email=$_POST['email'];
        $comment=$_POST['comment'];
        $gameid=intval($_GET['gid']);
        $status=0;//trang thai chua dc duyet
        $query=mysqli_query($con,"INSERT INTO comments (name,email,comment,status,postId)
        values('$name','$email','$comment','$status','$gameid')");
    if($query)
    {
        echo "<script>alert('comment successfully submit. Comment will be display after admin review ');</script>";
    }
    else{
        echo "<script>alert('Something went wrong. Please try again.');</script>";  
    } 
    
}
$gameid=intval($_GET['gid'])
?>
<?php include('../admin/chan-bieu-mau/cbm.php');?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html lang="en">
 <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Game Details</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/modern-business.css" rel="stylesheet">
<link href="ctsp1.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" href="https://d19m59y37dris4.cloudfront.net/universal/2-0-1/vendor/font-awesome/css/font-awesome.min.css">
</head>
<body>
  <?php 
     $query=mysqli_query($con,"Select * from games where is_Active=1 and id= '$gameid'");
     while($row=mysqli_fetch_array($query))
     {

     
   ?>
  <!-- Header -->
<div>
<header class="" style="background-color: #171a21;">
      <nav class="navbar navbar-expand-lg">
        <div class="container">
          <a class="navbar-brand" href="http://localhost/DA-LT-WebNC/webgame./index.php"><h2 style="color: #dbe0f1;">Team14<em style="color: #4c729e;">.</em></h2></a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto"  style="font-size: 15px;font-weight: 800;text-transform: uppercase;letter-spacing: 0.5px;color: #818181;transition: all 0.3s;">
            <li class="nav-item active">
                <a class="nav-link" href="http://localhost/DA-LT-WebNC/webgame./index.php">Trang Chủ
                  <span class="sr-only">(current)</span>
                </a>
              </li> 
              <li class="nav-item"> 
                <a class="nav-link" href="http://localhost/DA-LT-WebNC/webgame./san_pham.php">Nổi bật</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="http://localhost/DA-LT-WebNC/webgame./ctsp/gioithieu.php">Giới thiệu</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="http://localhost/DA-LT-WebNC/webgame./muahang.php">Giỏ hàng</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="http://localhost/DA-LT-WebNC/webgame./lienhe.php">Liên Hệ</a>
              </li>
            </ul>
          </div>
        </div>
      </nav>
    </header>
</div>
<div class="a1"> 

<div>
  <div class="tengame" style="font-size: 26px;
    margin-top: 70px;
    margin-left: 161px;
    color: white;"><?php echo $row['name'];?> </div>
  

  <div class="spacer">
   
  </div>
</div>
<div class="left-div-wrapper">
  
 
  <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
  <ol class="carousel-indicators" style="bottom: 240px;">
    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="3"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="4"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="5"></li>
    
  </ol>
  <div class="carousel-inner">
    <style type="" >
      .img1{width: 542.22px;
  height: 304.54px;}
    </style>
    <div class="carousel-item active">
      <img  class="img1" style="width: 542.22px;height: 304.54px;" src="../images/<?php echo $row['image'];?>" alt="Second slide">
      
     
    </div>
    <div class="carousel-item">
      <video id="video1" class="d-block w-100"  alt="First slide" style="width: 542.22px;
  height: 304.54px;" autoplay="1" muted loop controls="controls"><source src="./video/pubg.mp4" ></video>
    </div>
    <div class="carousel-item">
<img class="img1" src="images/11a.jpg" alt="Third slide">
    </div>
    <div class="carousel-item">
      <img class="img1" src="images/11b.jpg" alt="Third slide">
    </div>
    <div class="carousel-item">
      <img class="img1" src="images/11c.jpg" alt="Third slide">
    </div>
    <div class="carousel-item">
      <img class="img1" src="images/11d.jpg" alt="Third slide">
    </div>
  </div>
  <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>
  <img id="a1" src="images/2a.jpg " style="width: 100%; height: 100%; display: none;">
  <img id="a2" src="images/2b.jpg " style="width: 100%; height: 100%;display: none;">
  <img id="a3"src="images/2c.jpg " style="width: 100%; height: 100%;display: none;">

  <div class="spacer">&nbsp; </div>

<div class="div03" style="background-color: #00000059;
    padding: 29px;
    height: 45%;
    margin-top: 7rem;
    border-radius: 10px; ">

<div style="display: inline-block;
    position: relative;
    top: -10px;">
  <div style="border-bottom: 0.5px solid #305972;font-size: 13px; width: 215%;">CẤU HÌNH BẮT BUỘC</div>
  <div style="margin-top: 7px;" class="aa" >TỐI THIỂU</div>
  <div class="ab">Yêu cầu hệ điều hành 64-bit và bộ xử lý</div>
  <div class="hedieuhanh"><span>Hệ điều hành:</span>  Windows 10 (phiên bản 64-bit)</div>
  <div class="boxuly" style="max-width: 22em;"><span>Bộ xử lý:</span> Intel i5 8400</div>
  <div class="ram"> <span>Kích cỡ game:</span> <?php echo $row['size'];?>MB</div>
  <div class="dohoa"><span>Đồ hoạ:</span> Nvidia GTX 1060 6GB</div>
  <div class="directx"><span>Phiên bản:</span> <?php echo $row['version'];?></div>
  <div class="dungluong"><span>Dung lượng đĩa:</span> 70 GB dung lượng đĩa khả dụng</div>
  <div class="directx"><span>Nhà phát hành:</span> <?php echo $row['developer'];?></div>
</div>

<div id="div02" style="display: inline-block;
    width: 46%;
    position: relative;
    top: -28px;left: 15px;">
 
  <div style="margin-top: 7px;" class="aa" >KHUYẾN KHÍCH</div>
  <div class="ab">Yêu cầu hệ điều hành 64-bit và bộ xử lý</div>
  <div class="hedieuhanh"><span>Hệ điều hành:</span>  Windows 10 (phiên bản 64-bit)</div>
  <div class="boxuly" style="max-width: 22em;"><span>Bộ xử lý:</span>  Intel i7-9700</div>
  <div class="ram"> <span>Kích cỡ game:</span> <?php echo $row['size'];?>MB</div>
  <div class="dohoa"><span>Đồ hoạ:</span>  NVIDIA RTX 3060ti</div>
  <div class="directx"><span>Phiên bản:</span> <?php echo $row['version'];?></div>
<div class="dungluong"><span>Dung lượng đĩa:</span> 70 GB dung lượng đĩa khả dụng</div>
</div>

</div>
<div>
<div class="div04" style="background-color: #51606e;
    padding: 29px;
    height: 15%;
    margin-top: 3rem;
    border-radius: 10px; ">
    <div style="font-size: 21px;margin-top: -15px; color: white;">Mua <?php echo $row['name'];?> </div>
    <img src="images/logo.png" style="width:20px; height: 20px; margin-left: 485px;
    margin-top: -25px;;"> 
    <div class="div05" style="background-color: black;
    padding: 21px;
    height: 4%;
    margin-left: 206px;
    width: 50%;
    margin-top: 9px;
    border-radius: 5px; ">
    <div class="price" style="font-size: 13px;margin-top: -9px;color: #c6d4df;"><?php echo $row['price'];?> đ</div>
    
    <button class="btn" style="border-radius: 2px;
    border: none;
    padding: 6px;
    margin-top: -27px;
    margin-left: 79px;
    width: 70%;
    display: inline-block;
    text-decoration: none !important;
    color: #d2efa9;
    font-size: 15px;
    background: transparent;
    background-color: #75b022;
    text-shadow: 1px 1px 0px rgb(0 0 0 / 30%);">Thêm vào giỏ hàng</button>
    
    </div>
    </div>
    </div>
</div>

<div class="right-div-wrapper">
  
  <div><?php echo $row['intro'];?> </div>
  <p class="divider-body">&nbsp;</p>

  <p class="game-image"><a href="http://localhost/gamezone/ctsp/images/9a.jpg" onclick="hta1()" class="pic"><img src="../images/<?php echo $row['image'];?>" alt="" width="120" height="90" /></a><br />
    <a href="#">Demo Game 1</a></p>
  <p class="game-image"><a href="http://localhost/gamezone/ctsp/images/11b.jpg" class="pic"><img src="images/11b.jpg" alt="" width="120" height="90" /></a><br />
    <a href="#">Demo Game 2</a></p>
  <p class="game-image"><a href="http://localhost/gamezone/ctsp/images/11c.jpg" class="pic"><img src="images/11c.jpg" alt="" width="120" height="90" /></a><br />
    <a href="#">Demo Game 3</a></p>
  <p class="game-image"><a href="http://localhost/gamezone/ctsp/images/11d.jpg" class="pic"><img src="images/11d.jpg" alt="" width="120" height="90" /></a><br />
    <a href="#">Demo Game 4 </a></p>
  <p class="game-image"><a href="http://localhost/gamezone/ctsp/images/11e.jpg" class="pic"><img src="images/11e.jpg" alt="" width="120" height="90" /></a><br />
    <a href="#">Demo Game 5 </a></p>
  <p class="game-image"><a href="http://localhost/gamezone/ctsp/images/11f.jpg" class="pic"><img src="images/11f.jpg" alt="" width="120" height="90" /></a><br />
    <a href="#">Demo Game 6 </a></p>
  <div class="spacer">&nbsp;</div>
  <p class="divider-body">&nbsp;</p>
 <div class="a3">
  <ul>
    <li><a href="#">Sinh tồn</a></li>
    <li><a href="#">Nhiều người chơi</a></li>
    <li><a href="#">Thế giới mở </a></li>
    <li><a href="#">Chế tạo</a></li>
    <li><a href="#">Thăm dò</a></li>
    <li><a href="#">Xây dựng căn cứ</a></li>
  </ul>
  <ul>
    <li><a href="#">PvE</a></li>
<li><a href="#">Phiêu lưu</a></li>
    <li><a href="#">Cốt truyện</a></li>
    <li><a href="#">Thiên nhiên</a></li>
    <li><a href="#">Khoa học</a></li>
    <li><a href="#">Không gian</a></li>
  </ul>
  </div>
  
</div>
<?php }?>
<div class="row" style="margin-top: 60%">
   <div class="col-md-8">
<div style="    width: 61%;padding: 10px;
    margin-left: 159px;
    border-radius: 10px;background-color: #1b2838;" class="card my-4">
            <h5 class="card-header">Bình luận:</h5>
            <div class="card-body">
              <form name="Comment" method="post" enctype="multipart/form-data">
      <input type="hidden" name="csrftoken" value="" />
 <div class="form-group">
<input type="text" name="name" class="form-control" placeholder="Nhập tên của bạn" required>
</div>

 <div class="form-group">
 <input type="email" name="email" class="form-control" placeholder="Nhập email của bạn" required>
 </div>


                <div class="form-group">
                  <textarea class="form-control" name="comment" rows="3" placeholder="Comment" required></textarea>
                </div>

                <button type="submit" class="btn btn-primary" name="submit">Bình luận</button>
              </form>
            </div>
          </div>

<?php 
$query=mysqli_query($con,"Select * from comments where postId='$gameid' and status=0");
$cnt=1;
while($row=mysqli_fetch_array($query))
{
?>
<div style="    width: 61%;padding: 10px; margin-top: 20px;
    margin-left: 159px;
    border-radius: 10px;background-color: #1b2838;" class="card my-4">         
   <div class="card-body">
    <form name="Comment" method="post" enctype="multipart/form-data">
    <input type="hidden" name="csrftoken" value="" />
 <div class="form-group">
    <div>
    <img class="d-flex mr-3 rounded-circle" src="./images/usericon.png" alt="">
    </div>
    <div style="margin-top: -50px;
    margin-left: 55px;
    color: #c1dbf4;
    font-size: 15px;">
    <td><?php echo htmlentities($row['name']);?></td>
    <div>
     <span style="font-size:11px;"><b>at</b> <?php echo htmlentities($row['postingDate']);?></span></div>
     </div>
</div>
     <div class="form-group" style=" font-size: 15px;margin-left: 55px;">
      <td><?php echo htmlentities($row['comment']);?></td>
      </div>
    </form>
            </div>
          </div>
 <tr>
 <?php } ?>

<div class="footer1">
 
  
  <p class="footer">Copyright @ 2021, <a href="http://localhost/webgame/index.php">www.Team14.com</a>, all rights reserved.<br />
     Liên hệ với chúng tôi qua +91 7568 54 3012 hoặc truongdattung@gmail.com.</p>
</div>
</div> 
<script type="text/javascript">
    function hta1(){
      document.getElementById('a1').style= 'display:block;width:100%;';
      document.getElementById('video1').style= 'display:none';
      document.getElementById('a2').style= 'display:none';
      document.getElementById('a3').style= 'display:none';
    }

  </script>

</body>

</html>