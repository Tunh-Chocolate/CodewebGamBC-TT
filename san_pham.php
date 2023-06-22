<?php
	$conn = mysqli_connect("localhost","root","","web_gamenew");
	mysqli_set_charset($conn,"utf8");
?>
<?php
    $sql = "SELECT * FROM games";
    $query = mysqli_query($conn, $sql);
            $result = mysqli_query($conn, 'select count(image) as total from games');
            $row = mysqli_fetch_assoc($result);
            $total_records = $row['total'];
            $current_page = isset($_GET['page']) ? $_GET['page'] : 1;
            $limit = 4;
             
            $total_page = ceil($total_records / $limit);
             
            if ($current_page > $total_page){
                $current_page = $total_page;
            }
            else if ($current_page < 1){
                $current_page = 1;
            }
             
            $start = ($current_page - 1) * $limit;
            $result = mysqli_query($conn, "SELECT * FROM games LIMIT $start, $limit");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Trò chơi nổi bật</title>
  <LINK REL="SHORTCUT ICON"  HREF="./admin/images/logo-team-1.png">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <link href="san_pham1.css" rel="stylesheet" type="text/css" />
  <link rel="stylesheet" type="text/css" href="header.css">
  <link rel="stylesheet" type="text/css" href="tablesp.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">  
      <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>


</head>
<body>
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
<div >
<!-- Header -->
<div>
<header class="" style="background-color: #171a21;">
      <nav class="navbar navbar-expand-lg">
        <div class="container">
          <a class="navbar-brand" href="index.html"><h2 style="color: #dbe0f1;">Team14<em style="color: #4c729e;">.</em></h2></a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto"  style="font-size: 15px;font-weight: 800;text-transform: uppercase;letter-spacing: 0.5px;color: #818181;transition: all 0.3s;">
              <li class="nav-item active">
                <a class="nav-link" href="index.php">Trang Chủ
                  <span class="sr-only">(current)</span>
                </a>
              </li> 
              <li class="nav-item"> 
                <a class="nav-link" href="san_pham.php">Nổi bật</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="gioithieu.php">Giới thiệu</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="muahang.php">Giỏ hàng</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="lienhe.php">Liên Hệ</a>
              </li>
            </ul>
          </div>
        </div>
      </nav>
    </header>
</div>

     <!-- Banner Starts Here-->
    <div class="first-div">
      <div class="menu">
        <div class="danhSach">
          <ul>
            <li>
              <div class="dropdown">
                <button class="dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                  Cửa hàng của bạn
                </button>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                  <a class="dropdown-item" href="san_pham.php">Action</a>
                  <a class="dropdown-item" href="san_pham.php">Another action</a>
                  <a class="dropdown-item" href="san_pham.php">Something else here</a>
                </div>
              </div>
            </li>
            <li>
              <div class="dropdown">
                <button class="dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                  Tin tức và xu hướng
                </button>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                  <a class="dropdown-item" href="#">Action</a>
                  <a class="dropdown-item" href="#">Another action</a>
                  <a class="dropdown-item" href="#">Something else here</a>
                </div>
              </div>
            </li>
            <li>
              <div class="dropdown">
                <button class="dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                  Thể loại
                </button>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                  <a class="dropdown-item" href="san_pham.php">Action</a>
                  <a class="dropdown-item" href="san_pham.php">Another action</a>
                  <a class="dropdown-item" href="san_pham.php">Something else here</a>
                </div>
              </div>
            </li>
            <li style="border-right: none;">
              <div class="dropdown">
                <button class="dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                  Tìm kiếm
                </button>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                  <a class="dropdown-item" href="#">Action</a>
                  <a class="dropdown-item" href="#">Another action</a>
                  <a class="dropdown-item" href="#">Something else here</a>
                </div>
              </div>
            </li>
          </ul>
        </div>
      </div>
    </div> 
<div id="wrapper">
  
<style>
      
      #preloader {
    overflow: hidden;
    background-image: url("admin/images/banner-04.jpg");
    left: 0;
    right: 0;
    top: 0;
    bottom: 0;
    position: fixed;
    z-index: 9999999;
    color: #fff;
  }
  
  #preloader .jumper {
    left: 0;
    top: 0;
    right: 0;
    bottom: 0;
    display: block;
    position: absolute;
    margin: auto;
    width: 50px;
    height: 50px;
  }
  
  #preloader .jumper > div {
    background-color: #fff;
    width: 10px;
    height: 10px;
    border-radius: 100%;
    -webkit-animation-fill-mode: both;
    animation-fill-mode: both;
    position: absolute;
    opacity: 0;
    width: 50px;
    height: 50px;
    -webkit-animation: jumper 2s 0s linear infinite;
    animation: jumper 2s 0s linear infinite;
  }
  
  #preloader .jumper > div:nth-child(2) {
    -webkit-animation-delay: 0.5s;
    animation-delay: 0.5s;
  }
  
  #preloader .jumper > div:nth-child(3) {
    -webkit-animation-delay: 0.5s;
    animation-delay: 0.5s;
  }
  
  @-webkit-keyframes jumper {
    0% {
      opacity: 0;
      -webkit-transform: scale(0);
      transform: scale(0);
    }
    5% {
      opacity: 1;
    }
    100% {
      -webkit-transform: scale(1);
      transform: scale(1);
      opacity: 0;
    }
  }
  
  @keyframes jumper {
    0% {
      opacity: 0;
      -webkit-transform: scale(0);
      transform: scale(0);
    }
    5% {
      opacity: 1;
    }
    100% {
      opacity: 0;
    }
  }
      table,tr,td{
        
      }
      table{
        width: 110%;
        border-spacing:100px 20px;
      }
      h1{
        text-align: center;
        font-weight: bold;
        font-family: Cambria, Cochin, Georgia, Times, 'Times New Roman', serif;
        font-size: 20px;
        margin-bottom: 10px;
        text-shadow: 1px 1px 3px black;
      }
      
      .readmore{
        text-align: center;
        width: 93px;
        height: 1.8rem;
        border-radius: 10px;
        text-align: center;
        padding-top: 6px;
        border: 1px solid lightblue;
        font-weight: bold;
        cursor: pointer;
        color: #1b2838;
      }
      .readmore1{
        text-align: center;
        width: 93px;
        height: 1.8rem;
        border-radius: 10px;
        text-align: center;
        padding-top: 6px;
        border: 1px solid lightgoldenrodyellow;
        font-weight: bold;
      }
      .readmore:hover{
        box-shadow: 3px 3px 5px black;
        color: white;
        color: #d8951c;
        font-weight: bold;
      }
      a:hover{
        text-decoration: none;
        color: white;
      }
      .leftbox{
        
        margin-top: 10px;
        margin-bottom: 10px;
        margin-right: 10px;
        width: 300px;
        height: 299px;
        border: 1px solid white;
        padding: 10px;
        border-radius: 10px;
        background-image: linear-gradient(
        45deg, lightblue, #001d4c);
        background-color: #1a222c82;
        color: snow;
        box-shadow: 1px 1px 5px black;
        background-image: url('./images/bg-game-1.jpg');
        background-repeat: no-repeat;
        background-size: cover;
        cursor: pointer;
      }
      .leftboxt{
        
        margin-top: 10px;
        margin-bottom: 10px;
        margin-right: 10px;
        width: 220px;
        height: 229px;
        border: 1px solid white;
        padding: 10px;
        border-radius: 20px;
        background-image: linear-gradient(
        45deg, lightblue, #001d4c);
        background-color: #1a222c82;
        color: snow;
        box-shadow: 1px 1px 5px black;
        background-image: url('./images/bg-game-1.jpg');
        background-repeat: no-repeat;
        background-size: cover;
        cursor: pointer;
      }
      .leftbox:hover{
        box-shadow: 6px 5px 6px black;
        border:1px solid #c2e1f8;
      }
      img{
        box-shadow: 1px 1px 5px black;
        border-radius: 5px;
      }
      c{
        color: #A8C1F0;
        font-weight: bold;
      }
      bf{
        color: #d8951c;
        font-weight: bold;
      }
      vs{
    margin-top: 3px;
    height: 70px;
    font-size: 12px;
    line-height: 1.16667;
    font-weight: 500;
    color: #585858;
    letter-spacing: .009em;
    font-family: system-ui;
}
      pf{
        display: none;
      }
      pf{
        display: block;
      }
      at{ font-weight: bold;

      }
      .banner{
        width:125%;
        width: 716px;
      }
      .teec{
        color:snow;
        font-weight: bolder;
        text-align: center;
      }
    ec{
    font-size: 2rem;
    }

      
    </style>
    <div  class="teec"><ec>TRÒ CHƠI CỔ ĐIỂN<ec></div>
    <div style="margin-left: -125px;margin-top:-64px;"><img src="images/bgtopgame.png" width="1000" height="100" alt="photo 1" class="left" />        
     </div>
    <table style="margin-left: -250px;" >
      <?php while ($row = mysqli_fetch_assoc($query)) {
       while ($row = mysqli_fetch_assoc($result)){?>
        <td><div class="leftbox"><form action="muahang.php" method="post">
          <h1><?php echo $row['name']?></h1>
          <img width="93" height="95" alt="photo 1"name="image" class="left" src="images/<?php echo $row['image']; ?>">
          <div><c>Nội dung : </c><?php echo $row['version']?></div>
          <p><c>Nhà phát triển : </c><?php echo $row['developer']?></p>
          <p><c>Thể loại : </c><?php echo $row['Category']?></p>
          <p><c>Cập nhật : </c><?php echo $row['date']?></p>
          <p><c>Giá : </c> <bf><?php echo $row['price']?></bf> VNĐ  ⬇-27%</p>
         <p ><input class="readmore mx-auto" type="submit" name="addcart" value="Mua Game"></p>
                                <input type="hidden" name="name" value="<?php echo $row['name']; ?>">
                                <input type="hidden" name="price" value="<?php echo $row['price']; ?>">
                                <input type="hidden" name="image" value="<?php echo $row['image']; ?>">	
                                <input type="hidden" name="version" value="<?php echo $row['version']; ?>">
                                <input type="hidden" name="Category" value="<?php echo $row['Category']; ?>">
                                <input type="hidden" name="date" value="<?php echo $row['date']; ?>">	
                              </form>
          <div class="clear"></div>
        </div></td>
     <?php }}?>
    </table>


    <div style="margin-top: 30px;">  
    <div class="teec"><ec>TRÒ CHƠI MIỄN PHÍ<ec></div>
    <div style="margin-left: -125px;margin-top:-64px;"><img src="images/bgtopgame.png" width="1000" height="100" alt="photo 1" class="left" />        
     </div>
    <?php
                include "tablesp.php";
            ?>

<!--_________________________________________Banner__________________________________________________________________________________!-->
<div style="margin-top: 30px;">  
    <div class="teec"><ec>HÀNH ĐỘNG NHẬP VAI<ec></div>
    <div style="margin-left: -125px;margin-top:-64px;"><img src="images/bgtopgame.png" width="1000" height="100" alt="photo 1" class="left" />        
     </div>
     <div style="margin-top: 120px;">  
<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
					 <ol class="carousel-indicators">
					    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
					    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
					    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
					 </ol>
					  <div class="carousel-inner">
					    <div class="carousel-item active">
					      <img class="banner" src="./images./banner1.png" alt="First slide">
					    </div>
					    <div class="carousel-item">
					      <img class="banner" src="./images./banner2.png" alt="Second slide">
					    </div>
					    <div class="carousel-item">
					      <img class="banner" src="./images./banner3.png" alt="Third slide">
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
</div>

<div style="margin-top: 30px;">  
    <div class="teec"><ec>CÂU ĐỐ TRÍ TỤÊ<ec></div>
    <div style="margin-left: -125px;margin-top:-64px;"><img src="images/bgtopgame.png" width="1000" height="100" alt="photo 1" class="left" />        
     </div>
     <div style="margin-top: 120px;">  
<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
					 <ol class="carousel-indicators">
					    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
					    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
					    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
					 </ol>
					  <div class="carousel-inner">
					    <div class="carousel-item active">
					      <img class="banner" src="./images./banner6.png" alt="First slide">
					    </div>
					    <div class="carousel-item">
					      <img class="banner" src="./images./banner4.png" alt="Second slide">
					    </div>
					    <div class="carousel-item">
					      <img class="banner" src="./images./banner5.png" alt="Third slide">
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
</div>
<!--____________________________________________end banner______________________________________________________________________!-->
<div style="margin-left: -125px;margin-top:21px;"><img src="images/topgame2.png" width="1000" height="100" alt="photo 1" class="left" />        
     </div>

    <div style="margin-top: 100px;"></div>
    <?php
    
                include "tablesp2.php";
            ?>        






    <!-----------------------------------------------cut---------------------------------------------------------------------------!-->
    
     
       <!-------------------------------------------------endcut-----------------------------!-->
       <div style="margin-left: -123px;margin-top: 34px;"><img src="images/cutgame.png" width="1000" height="100" alt="photo 1" class="left" /></div>
       
    
    <div class="clear"></div>
    <div id="footer"> <a href="https://www.facebook.com/Tunhchocolate">Online Game Store</a> &nbsp;
      <div id="footnav"> <a href="#">Legal</a> | <a href="#">Home</a> </div>
      <!-- end footnav -->
    </div>
    <!-- end footer -->
  </div>
  <!-- end inner -->
</div>
<!-- end wrapper -->
</div>

</body>
</html>
