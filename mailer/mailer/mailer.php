<?php
include '../../ttt.php';

include  "../storage/PHPMailer-master/src/PHPMailer.php";
include  "../storage/PHPMailer-master/src/Exception.php";
include  "../storage/PHPMailer-master/src/OAuth.php";
include  "../storage/PHPMailer-master/src/POP3.php";
include  "../storage/PHPMailer-master/src/SMTP.php";
 
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
$email = $_POST['email'];
$mail = new PHPMailer(true);                              // Passing `true` enables exceptions
try {
    //Server settings
    $mail->SMTPDebug = 2;                                 // Enable verbose debug output
    $mail->isSMTP();                                      // Set mailer to use SMTP
    $mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
    $mail->SMTPAuth = true;                               // Enable SMTP authentication
    $mail->Username = 'moonauz23@gmail.com';                 // SMTP username
    $mail->Password = 'rcfgkrqybnfvphgd';                           // SMTP password
    $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
    $mail->Port = 587;
    $mail->isHTML(true);
    $mail->Subject = 'Payment Success';
    $mail->Body    = '<br>Cảm ơn bạn đã mua hàng !<br> Bạn đã mua Game thành công ! Mã id người dùng của bạn là: WUUIDOstw459 <br>Vui lòng liên hệ tới email <b>gamestore@gmail.com</b> nếu bạn gặp sự cố.<br><img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQ6ydb2Ci0eV81JLXEb-I36aHoWQ7V8S4p4vQ&usqp=CAU" alt="Game Store"></a><br>';
    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';                                    // TCP port to connect to
 
    //Recipients
    $mail->setFrom('moonauz24@gmail.com', 'GameStore');
    $mail->addAddress($email, 'User'); 
 
    $mail->send();
    echo 'Message has been sent';
} catch (Exception $e) {
    echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
}
?>

<?php
	
	if (isset($_POST['dongydathang'])) {
        $name = $_POST['name'];
		$atm = $_POST['atm'];
		$dienthoai = $_POST['dienthoai'];
		$email = $_POST['email'];
		$total = tongdonhang();
		$sql = "INSERT INTO bill(name, atm, dienthoai, email,total) VALUES ('$name', '$atm','$dienthoai', '$email','$total')";
  		$last_id = mysqli_insert_id($conn);
		$query = mysqli_query($conn,$sql);
		$id = "SELECT * FROM bill";
		$msg = "Đặt hàng thành công!";
        if($query)
    {
        $msg = 'Đã thanh toán thành công ,Thông tin đã gửi về địa chỉ gmail của bạn !!!';
        echo "<script type='text/javascript' >alert('$msg');;history.go(-2);</script>";
        
    }
    else{
        echo "<script type='text/javascript' >alert('$msg');</script>";
        
        $msg = 'Query lỗi r cha. Kiểm tra quanh chỗ database xem sai chỗ nào k';
    } 

        
	}
	$conn = null;

?>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<script type="text/javascript" src="danhsach.js"></script>
<div class="container-fluid" style="height: 100%;">
  <div class="card">
  <div class="card-header" style="  background-image: linear-gradient(#4eaf8f, #3fbb00);width: 100%;height: 100%;background-size: cover;">
    <h2 style="color: white">CẢM ƠN BẠN ĐÃ MUA HÀNG, ĐƠN HÀNG SẼ GỬI VÀO EMAIL CỦA BẠN. VUI LÒNG KIỂM TRA EMAIL VÀ LIÊN HỆ NẾU GẶP SỰ CỐ</h2>
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
            <form action="bill.php" method="post">
            <table class="thongtinnhanhang">
                        <tr>
                            <td width="20%">Họ tên</td>
                            <td><?php echo $name; ?></td>
                        </tr>
                        <tr>
                            <td>Số Thẻ</td>
                            <td><?php echo $atm; ?></td>
                        </tr> 
                        <tr>
                            <td>Điện thoại</td>
                            <td><?php echo $dienthoai; ?></td>
                        </tr>
                        <tr>
                            <td>Email</td>
                            <td><?php echo $email; ?></td>
                        </tr>
                        
                    </table>
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
                    <a style="margin-left: 50px;" href=""><input class="btn btn-success" style="width: 172.67px;" type="button" value="Bạn gặp sự cố ?"></a>
        </div>
  </div>
</div>
</div>
