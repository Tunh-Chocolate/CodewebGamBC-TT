<?php include('includes/config.php');?>
<?php include('chan-bieu-mau/cbm.php');?>
<?php 
//Delete    
$msg=0;
if($_GET==null){

}else if($_GET['action']=='del' && $_GET['rid'])
    {
        $id=intval($_GET['rid']);
        $query=mysqli_query($con,"update category set is_Active='0' where idCategory='$id'");
        $msg="Category deleted! ";
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
        #collapseExample{
            display: block;
        }
        #collapseExample>ul>li>.doimauchu-2{
            color: #7fc1fc;
        }
    </style>
    <div class="wrapper" id="header-d">
        <div class="row">
            <?php include('includes/left-dashb.php');?>
            <div  id="noidung">
                <?php include('includes/top-dashb.php');?> 
                <div class="divBox">
                    <div class="divTitle">
                        <div class="txtTitle">Danh mục</div>
                        <div class="txtLink"><span>QUẢN TRỊ&nbsp;</span> / <span>&nbsp; Admin&nbsp;  </span> /&nbsp; Danh mục </div>
                    </div>
                    <div class="insideBox">
                        <div class="table-responsive">
                        <?php if($msg){?>
                            <div class="alert alert-success" style="width: 100%;border:1px solid #4bd396;color:#4bd396" role="alert">
                                <?php echo $msg?>
                            </div>
                        <?php }?>
                        <a href="add-category.php" ><button class="btn btn-success" style="margin-bottom: 10px;background-color:#67d396;border:none;">Add&nbsp;&nbsp;<svg style="padding-top: 8px;" xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-plus-circle" viewBox="0 0 16 16">
                        <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                        <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z"/>
                        </svg></button></a>
                        
                            <table class="table m-0 table-colored-bordered table-bordered-primary">
                                <thead>
                                    <tr style="color: white;">
                                        <th>#</th>
                                        <th>Thể loại</th>
                                        <th>Giới thiệu</th>
                                        <th>Ngày tạo</th>
                                        <th>Lần cập nhật cuối</th>
                                        <th>Hành động</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php 
                                $query=mysqli_query($con,"Select idCategory,CategoryName,Description,PostingDate,UpdationDate from  category where is_Active=1");
                                $stt=1;
                                while($row=mysqli_fetch_array($query))
                                {
                                ?>
                                <tr>
                                    <th scope="row"><?php echo htmlentities($stt);?></th>
                                    <td><?php echo htmlentities($row['CategoryName']);?></td>
                                    <td><?php echo htmlentities($row['Description']);?></td>
                                    <td><?php echo htmlentities($row['PostingDate']);?></td>
                                    <td><?php echo htmlentities($row['UpdationDate']);?></td>
                                    <td><a href="edit-category.php?cid=<?php echo htmlentities($row['idCategory']);?>"><svg style="color: #29b6f6;" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-fill" viewBox="0 0 16 16">
                                    <path d="M12.854.146a.5.5 0 0 0-.707 0L10.5 1.793 14.207 5.5l1.647-1.646a.5.5 0 0 0 0-.708l-3-3zm.646 6.061L9.793 2.5 3.293 9H3.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.207l6.5-6.5zm-7.468 7.468A.5.5 0 0 1 6 13.5V13h-.5a.5.5 0 0 1-.5-.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.5-.5V10h-.5a.499.499 0 0 1-.175-.032l-.179.178a.5.5 0 0 0-.11.168l-2 5a.5.5 0 0 0 .65.65l5-2a.5.5 0 0 0 .168-.11l.178-.178z"/>
                                    </svg>

                                    &nbsp;<a href="manage-category.php?rid=<?php echo htmlentities($row['idCategory']);?>&&action=del"><svg style="color: #f05050" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
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