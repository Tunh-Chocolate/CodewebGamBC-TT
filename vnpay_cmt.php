<?php

	  $conn = mysqli_connect("localhost","root","","web_gamenew");
      mysqli_set_charset($conn,"utf8");
      $sql = "SELECT * FROM bill";
      $query = mysqli_query($conn, $sql);
      $row = mysqli_fetch_assoc($query);
  
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
  
          $fl=0; //kiem tra sp co trung trong gio hang khong?
  
          for ($i=0; $i < sizeof($_SESSION['giohang']); $i++) { 
              
              if($_SESSION['giohang'][$i][1]==$name){
                  $fl=1;
                  $soluongnew=$soluong+$_SESSION['giohang'][$i][3];
                  $_SESSION['giohang'][$i][3]=$soluongnew;
                  break;
  
              }
              
          }
          //neu khong trung sp trong gio hang thi them moi
          if($fl==0){
              //them moi sp vao gio hang
              $sp=[$image,$name,$price,$Category];
              $_SESSION['giohang'][]=$sp;
          }
  
         // var_dump($_SESSION['giohang']);
      }



      
	if (isset($_POST[''])) {
        $vnp_OrderInfo = $_POST['name'];
		$vnp_OrderType = $_POST['atm'];
		$total = tongdonhang();
		$sql = "INSERT INTO bill(name, atmtotal) VALUES ('$name', '$atm','$total')";
  		$last_id = mysqli_insert_id($conn);
		$query = mysqli_query($conn,$sql);
		$id = "SELECT * FROM bill";
		$msg = "Đặt hàng thành công!";
        if($query)
    {
        $msg = 'Thanh toán thành công';
        echo "<script type='text/javascript' >alert('$msg');</script>";
        
    }
    else{
        echo "<script type='text/javascript' >alert('$msg');</script>";
        
        $msg = 'Query lỗi r cha. Kiểm tra quanh chỗ database xem sai chỗ nào k';
    } 

        
	}
	$conn = null;

    function showgiohang(){
        if(isset($_SESSION['giohang'])&&(is_array($_SESSION['giohang']))){
            if(sizeof($_SESSION['giohang'])>0){
                $tong=0;
                for ($i=0; $i < sizeof($_SESSION['giohang']); $i++) { 
                    $tt=$_SESSION['giohang'][$i][2] ;
                    $tong+=$tt;
                    echo '<tr>
                            <td>'.($i+1).'</td>
                            <td><img style="width: 100px;" src="images/'.$_SESSION['giohang'][$i][0].'" alt=""></td>
                            <td>'.$_SESSION['giohang'][$i][1].'</td>
                            <td>'.$_SESSION['giohang'][$i][2].'VNĐ</td>
                            <td>'.$_SESSION['giohang'][$i][3].'</td>
                            <td>
                                <div>'.$tt.'VNĐ</div>
                            </td>
                            <td>
                                <a href="muahang.php?delid='.$i.'">Xóa</a>
                            </td>
                        </tr>';
                }
                echo '<tr>
                        <th colspan="5">Tổng đơn hàng</th>
                        <th>
                            <div>'.$tong.'VNĐ</div>
                        </th>
    
                    </tr>';
            }else{
                echo "Giỏ hàng rỗng!";
            }    
        }
    }

?>
<?php include('cbm.php');?>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<script type="text/javascript" src="danhsach.js"></script>
<div class="container-fluid" style="height: 100%;">
  <div class="card">
  <div class="card-header" style="  background-image: linear-gradient(#4eaf8f, #3fbb00);width: 100%;height: 100%;background-size: cover;">
    <h2 style="color: white">Thanh Toán Thành Công</h2>
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
            
                </div>
                <h2 style="text-align: center;margin-bottom: 21px;font-weight: 700;">Mặt hàng đã mua</h2>
                <table class="table">
							        <thead class="thead-dark">
							            <tr>
							                <th>STT</th>
							                <th>Hình ảnh</th>
							                <th>Tên game</th>
							                <th>Đơn giá</th>
							                <th>Thể loại</th>
							                <th>Thành tiền</th>
							            </tr>
							        </thead>
							        <tbody>
							                <?php showgiohang(); ?>            
							        </tbody>
							    </table>
  <div class="card-body">
        <div class="row mb mx-auto" >       
                    <a style="margin-right: 50px;" href="san_pham.php"><input class="btn btn-primary" type="button" value="Tiếp tục đặt hàng"></a>
                    <a style="margin-left: 50px;" href="lienhe.php"><input class="btn btn-success" style="width: 172.67px;" type="button" value="Bạn gặp sự cố ?"></a>
        </div>
  </div>
</div>
</div>
