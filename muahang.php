<?php
    $conn = mysqli_connect("localhost","root","","web_game");
    mysqli_set_charset($conn,"utf8");


    session_start();
    if(!isset($_SESSION['giohang'])) $_SESSION['giohang']=[];
    //làm rỗng giỏ hàng
    if(isset($_GET['delcart'])&&($_GET['delcart']==1)) unset($_SESSION['giohang']);
    //xóa sp trong giỏ hàng
    if(isset($_GET['delid'])&&($_GET['delid']>=0)){
       array_splice($_SESSION['giohang'],$_GET['delid'],1);
    }
    //lấy dữ liệu từ form
    if(isset($_POST['addcart'])&&($_POST['addcart'])){
        $image=$_POST['image'];
        $name=$_POST['name'];
        $price=$_POST['price'];
        $Category=$_POST['Category'];

        //kiem tra sp co trong gio hang hay khong?

        //neu khong trung sp trong gio hang thi them moi
      
            $sp=[$image,$name,$price,$Category];
            $_SESSION['giohang'][]=$sp;
        }

       // var_dump($_SESSION['giohang']);
    

    function showgiohang(){
        if(isset($_SESSION['giohang'])&&(is_array($_SESSION['giohang']))){
            if(sizeof($_SESSION['giohang'])>0){
                $tong=0;
                for ($i=0; $i < sizeof($_SESSION['giohang']); $i++) { 
                    $tt=$_SESSION['giohang'][$i][2]-$_SESSION['giohang'][$i][2]*27/100 ;
                    $tong+=$tt;
                    echo '<tr>
                            <td>'.($i+1).'</td>
                            <td><img style="width: 100px;" src="images/'.$_SESSION['giohang'][$i][0].'" alt=""></td>
                            <td>'.$_SESSION['giohang'][$i][1].'</td>
                            <td>'.$_SESSION['giohang'][$i][2].' VNĐ -27%</td>
                            <td>'.$_SESSION['giohang'][$i][3].'</td>
                            <td>
                                <div>'.$tt.' VNĐ</div>
                            </td>
                            <td>
                                <a href="muahang.php?delid='.$i.'">Xóa</a>
                            </td>
                        </tr>';
                }
                echo '<tr>
                        <th colspan="5">Tổng đơn hàng</th>
                        <th>
                            <div>'.$tong.' VNĐ</div>
                        </th>
    
                    </tr>';
            }else{
                echo "Giỏ hàng rỗng!";
            }    
        }
    }
?>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<script type="text/javascript" src="danhsach.js"></script>
<div class="container-fluid" style="height: 100%;">
  <div class="card">
  <div class="card-header" style="background-image: url('./images./bg-game-1.jpg');width: 100%;height: 100%;">
    <h2 style="color: snow;">Sản phẩm của bạn </h2>
  </div>
  <div style="flex-direction: column;width: 550px;margin-left: 12px;margin-top: 20px;">
        <style type="text/css">
            .thongtinnhanhang tr td {
                text-align: left;
                padding: 10px;
                margin-left: 100px;
            }

            .thongtinnhanhang input {
                width: 100%;
                border: 1px #CCC solid;
                padding: 5px;
                border-radius: 5px;
            }
        </style>
             <form action="./mailer/mailer/mailer.php" method="post">
                    <h2>THÔNG TIN NHẬN HÀNG</h2><br>
                    <table class="thongtinnhanhang">
                        <tr>
                            <td width="20%">Họ tên</td>
                            <td><input type="text" name="name" required></td>
                        </tr>
                        <tr>
                            <td>Thẻ ngân hàng</td>
                            <td><input type="text" name="atm" required></td>
                        </tr>
                        <tr>
                            <td>Điện thoại</td>
                            <td><input type="number" name="dienthoai" required></td>
                        </tr>
                        <tr>
                            <td>Email</td>
                            <td><input type="text" name="email" required></td>
                        </tr>
                    </table>
                </div>
  <div class="card-body">
    <table class="table">
        <thead class="thead-dark">
            <tr>
                <th>STT</th>
                <th>Hình ảnh</th>
                <th>Tên Game</th>
                <th>Đơn giá</th>
                <th>Thể loại</th>
                <th>Thành tiền</th>
                <th>Xóa</th>
            </tr>
        </thead>
        <tbody>
                <?php showgiohang(); ?>            
        </tbody>
    </table>
    <div style="text-align: center;">
        <?php
            //include "phan_trang.php";
        ?>
    </div>
        <div class="row mb mx-auto" >       
                    <input class="btn btn-primary" style="margin-right: 50px;" type="submit" value="ĐỒNG Ý ĐẶT HÀNG" name="dongydathang">
                    <a style="margin-right: 50px;" href="muahang.php?delcart=1"><input class="btn btn-warning" type="button" value="XÓA GIỎ HÀNG"></a>
                    <a style="margin-right: 50px;" href="../webgame/san_pham.php"><input class="btn btn-success" type="button" value="TIẾP TỤC ĐẶT HÀNG"></a>
                    <a style="margin-right: 50px;" href="../webgame/vnpay.php"><img src="https://pay.vnpay.vn/images/brands/logo-en.svg" alt="Thanh toán VNPAY"><input class="btn btn-success" type="button" value="VNPAY"></a>
        </div>
        </form>
  </div>
</div>
</div>
