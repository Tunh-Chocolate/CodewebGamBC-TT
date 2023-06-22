<?php include('includes/config.php');?>
<?php include('chan-bieu-mau/cbm.php');?>
<?php 
//Delete    
$msg=0;
if($_GET==null){

}else if($_GET['action']=='del' && $_GET['rid'])
    {
        $id=intval($_GET['rid']);
        $query=mysqli_query($con,"delete from games where id='$id' and  is_Active='0'");
        $msg="Xóa thành công! ";
}
else if($_GET['action']=='rem' && $_GET['cid'])
    {
        $id=intval($_GET['cid']);
        $query=mysqli_query($con,"update games set is_Active='1' where id='$id'");
        $msg="Restore thành công!";
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
        #game>ul>li>.doimauchu-3{
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
                        <div class="txtTitle">Game đã xóa</div>
                        <div class="txtLink"><span>QUẢN TRỊ&nbsp;</span> / <span>&nbsp; Admin&nbsp;  </span> /&nbsp; Game đã xóa </div>
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
                                        <th>Tên trò chơi</th>
                                        <th>Nhà sản xuất</th>
                                        <th>Loại</th>
                                        <th>Giới thiệu</th>
                                        <th>Ảnh</th>
                                        <th>Trực tuyến</th>
                                        <th>Phiên bản</th>
                                        <th>Kích cỡ</th>
                                        <th>Giá</th>
                                        <th>Ngày tạo</th>
                                        <th>Hành động</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php 
                                $query=mysqli_query($con,"Select * from games g join category c on g.IdCategory = c.IdCategory where g.is_Active=0;");
                                $stt=1;
                                while($row=mysqli_fetch_array($query))
                                {
                                ?>
                                <tr>
                                    <th scope="row"><?php echo htmlentities($stt);?></th>
                                    <td><?php echo htmlentities($row['name']);?></td>
                                    <td><?php echo htmlentities($row['developer']);?></td>
                                    <td><?php echo htmlentities($row['CategoryName']);?></td>
                                    <td><?php echo htmlentities($row['intro']);?></td>
                                    <td><img class="intro-img" src="./../images/<?php echo htmlentities($row['image']);?>" alt=""></td>
                                    <td><?php echo htmlentities($row['internet']);?></td>
                                    <td><?php echo htmlentities($row['version']);?></td>
                                    <td><?php echo htmlentities($row['size']);?>GB</td>
                                    <td><?php echo htmlentities($row['price']);?>vnd</td>
                                    <td><?php echo htmlentities($row['date']);?></td>
                                    <td><a href="trash-game.php?cid=<?php echo htmlentities($row['id']);?>&&action=rem"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-return-left" viewBox="0 0 16 16">
                                    <path fill-rule="evenodd" d="M14.5 1.5a.5.5 0 0 1 .5.5v4.8a2.5 2.5 0 0 1-2.5 2.5H2.707l3.347 3.346a.5.5 0 0 1-.708.708l-4.2-4.2a.5.5 0 0 1 0-.708l4-4a.5.5 0 1 1 .708.708L2.707 8.3H12.5A1.5 1.5 0 0 0 14 6.8V2a.5.5 0 0 1 .5-.5z"/>
                                    </svg>
                                    &nbsp;<a href="trash-game.php?rid=<?php echo htmlentities($row['id']);?>&&action=del"><svg style="color: #f05050" xmlns="http://www.w3.org/2000/svg" width="14" height="14" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                                    <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
                                    <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
                                    </svg></a> </td>
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