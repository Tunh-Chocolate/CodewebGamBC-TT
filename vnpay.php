<?php

    $code_sp = rand(0,9999);
    $_SESSION["giohang"] = $code_sp ;
    session_start();	
    if(isset($_SESSION['giohang'])&&(is_array($_SESSION['giohang']))){
		if(sizeof($_SESSION['giohang'])>0){
			$tong=0;
			for ($i=0; $i < sizeof($_SESSION['giohang']); $i++) { 
				$tt=$_SESSION['giohang'][$i][2]-$_SESSION['giohang'][$i][2]*27/100 ;
				$tong+=$tt;
			}}
	}

date_default_timezone_set('Asia/Ho_Chi_Minh');
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */



  
$vnp_TmnCode = "NYA6P44N"; //Website ID in VNPAY System
$vnp_HashSecret = "WGNQFARYZBWFAMBGTAOJZAWWGATUBRBN"; //Secret key
$vnp_Url = "https://sandbox.vnpayment.vn/paymentv2/vpcpay.html";
$vnp_Returnurl = "http://localhost/DA-LT-WebNC/webgame/vnpay_cmt.php";
$vnp_apiUrl = "http://sandbox.vnpayment.vn/merchant_webapi/merchant.html";
//Config input format
//Expire
$startTime = date("YmdHis");
$expire = date('YmdHis',strtotime('+15 minutes',strtotime($startTime)));
$vnp_TxnRef = $code_sp; //Mã đơn hàng. Trong thực tế Merchant cần insert đơn hàng vào DB và gửi mã này sang VNPAY
        $name          ='Nguyen Van A';
		$vnp_OrderInfo = $name;

		$vnp_OrderType = '9704198526191432198';
		
		$vnp_Amount = $tong * 100;
		$vnp_Locale = 'vn';
		$vnp_BankCode = 'NCB';
		$vnp_IpAddr = $_SERVER['REMOTE_ADDR'];
		
		$vnp_ExpireDate = $expire;

		$inputData = array(
		    "vnp_Version" => "2.1.0",
		    "vnp_TmnCode" => $vnp_TmnCode,
		    "vnp_Amount" => $vnp_Amount,
		    "vnp_Command" => "pay",
		    "vnp_CreateDate" => date('YmdHis'),
		    "vnp_CurrCode" => "VND",
		    "vnp_IpAddr" => $vnp_IpAddr,
		    "vnp_Locale" => $vnp_Locale,
		    "vnp_OrderInfo" => $vnp_OrderInfo,
		    "vnp_OrderType" => $vnp_OrderType,
		    "vnp_ReturnUrl" => $vnp_Returnurl,
		    "vnp_TxnRef" => $vnp_TxnRef,
		    "vnp_ExpireDate"=>$vnp_ExpireDate,
		   
		);

		if (isset($vnp_BankCode) && $vnp_BankCode != "") {
		    $inputData['vnp_BankCode'] = $vnp_BankCode;
		}
		// if (isset($vnp_Bill_State) && $vnp_Bill_State != "") {
		//     $inputData['vnp_Bill_State'] = $vnp_Bill_State;
		// }

		//var_dump($inputData);
		ksort($inputData);
		$query = "";
		$i = 0;
		$hashdata = "";
		foreach ($inputData as $key => $value) {
		    if ($i == 1) {
		        $hashdata .= '&' . urlencode($key) . "=" . urlencode($value);
		    } else {
		        $hashdata .= urlencode($key) . "=" . urlencode($value);
		        $i = 1;
		    }
		    $query .= urlencode($key) . "=" . urlencode($value) . '&';
		}

		$vnp_Url = $vnp_Url . "?" . $query;
		if (isset($vnp_HashSecret)) {
		    $vnpSecureHash =   hash_hmac('sha512', $hashdata, $vnp_HashSecret);//  
		    $vnp_Url .= 'vnp_SecureHash=' . $vnpSecureHash;
		}
		$returnData = array('code' => '00'
		    , 'message' => 'success'
		    , 'data' => $vnp_Url);
		header('Location: ' . $vnp_Url);
		        die();
			// vui lòng tham khảo thêm tại code demo

?>