<?php
    $conn = mysqli_connect("localhost","root","","web_gamenew2");
    mysqli_set_charset($conn,"utf8");
	if (isset($_POST['contacter'])) {
		$name = $_POST['name'];
		$dienthoai = $_POST['dienthoai'];
		$email = $_POST['email'];
		$about = $_POST['about'];
		$sql = "INSERT INTO contact(name, dienthoai, email, about)
		VALUES ('$name', '$dienthoai', '$email','$about')";
  		$last_id = mysqli_insert_id($conn);
		$query = mysqli_query($conn,$sql);
		$id = "SELECT * FROM contact";
		$msg = "Gửi kiến nghị thành công!";
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

?>
