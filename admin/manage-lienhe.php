<?php 
define('DB_SERVER','localhost');
define('DB_USER','root');
define('DB_PASS' ,'');
define('DB_NAME','web_gamenew');
$con = mysqli_connect(DB_SERVER,DB_USER,DB_PASS,DB_NAME);
// Check connection
if (mysqli_connect_errno())
{
 echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
?>
<?php include('chan-bieu-mau/cbm.php');?>
<?php 
//Delete    
$msg=0;
if($_GET==null){

}else if($_GET['action']=='del' && $_GET['rid'])
    {
        $id=intval($_GET['rid']);
        $query=mysqli_query($con,"update games set is_Active='0' where id='$id'");
        $msg="Xóa thành công! ";
    }
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="News Portal.">
        <!-- App title -->
        <LINK REL="SHORTCUT ICON"  HREF="./images/logo-team-1.png">
        <title>Newsportal | Manage Category</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
        <!-- App css -->    
        <link rel="stylesheet" href="css/style-dashboard.css">

        <!-- Font awesome -->
</head>
<body >
    <!-- ẩn hiện và đổi màu phần tử trong left bar -->
<style>
        #game{
            display: block;
        }
        #game>ul>li>.doimauchu-2{
            color: #7fc1fc;
        }
        .intro-img{
            width: 100px;
        }
        thead{
            font-size: 12px;
        }
        tbody{
            font-size: 11px;
        }
        .table td{
            padding: .5rem;
        }
    </style>
    <div class="wrapper" id="header-d">
        <div class="row">
            <?php include('includes/left-dashb.php');?>
            <div  id="noidung">
                <?php include('includes/top-dashb.php');?> 
                <div class="divBox">
                    <div class="divTitle">
                        <div class="txtTitle">PHẢN HỒI Ý KIẾN CỦA KHÁCH HÀNG</div>
                        <div class="txtLink"><span>QUẢN TRỊ&nbsp;</span> / <span>&nbsp; Admin&nbsp;  </span> /&nbsp; Games </div>
                    </div>
                    <div class="insideBox">
                        <div class="table-responsive">
                        <?php if($msg){?>
                            <div class="alert alert-success" style="width: 100%;border:1px solid #4bd396;color:#4bd396" role="alert">
                                <?php echo $msg?>
                            </div>
                        <?php }?>
                        
                            <table class="table m-0 table-colored-bordered table-bordered-primary">
                                <thead>
                                    <tr style="color: white;">
                                        <th>#</th>
                                        <th>Tên</th>
                                        <th>Ngày viết</th>
                                        <th>Email</th>
                                        <th>Số điện thoại</th>
                                        <th>Ý kiến phản hồi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php 
                                $query=mysqli_query($con,"Select * from contact");
                                $stt=1;
                                while($row=mysqli_fetch_array($query))
                                {
                                ?>
                                <tr>
                                    <th scope="row"><?php echo htmlentities($stt);?></th>
                                    <td><?php echo htmlentities($row['name']);?></td>
                                    <td><?php echo htmlentities($row['ngay']);?></td>
                                    <td><?php echo htmlentities($row['email']);?></td>
                                    <td><?php echo htmlentities($row['dienthoai']);?></td>
                                    <td><?php echo htmlentities($row['about']);?></td>
                                </tr>
                                <?php
                                $stt++;
                                } ?>
                                </tbody>
                                                    
                            </table>
                        </div>
                    </div>
                </div>
                <footer>EPU - D14CNPM2 - PHAM VAN DONG - HA NOI</footer>
            </div>
        </div>
    </div>
</body>
</html>