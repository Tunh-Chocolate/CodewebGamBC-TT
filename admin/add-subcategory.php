<?php
session_start();
include('includes/config.php');
include('chan-bieu-mau/cbm.php');
$msg=0;
if(isset($_POST['submit']))
    {
        $scategory=$_POST['subcategory'];
        $description=$_POST['scdescription'];
        $status=1;// trang thai chua xoa
        $categoryID=$_POST['category'];
        $query=mysqli_query($con,"insert into tblsubcategory(CategoryId,Subcategory,SubCatDescription,Is_Active) values('$categoryID','$scategory','$description','$status')");
    if($query)
    {
        $msg = 'Sub-Category created!';
    }
    else{
        $msg = 'Query lỗi r cha. Kiểm tra quanh chỗ database xem sai chỗ nào k';
    } 
}
?>
<?php include('chan-bieu-mau/cbm.php');?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <LINK REL="SHORTCUT ICON"  HREF="./images/logo-team-1.png">
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="News Portal.">
        <!-- App title -->
        <title>Newsportal | Add Sub-Category</title>
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
        #sub-collapseExample{
            display: block;
        }
        #sub-collapseExample>ul>li>.doimauchu-1{
            color: #7fc1fc;
        }
    </style>
    <div class="wrapper" id="header-d">
        <div class="row">
            <?php include('includes/left-dashb.php');?>
            <div id="noidung">
                <?php include('includes/top-dashb.php');?> 
                <div class="divBox">
                    <div class="divTitle">
                        <div class="txtTitle">Thêm danh mục phụ</div>
                        <div class="txtLink"><span>Quản trị&nbsp;</span> / <span>&nbsp; Admin&nbsp;  </span> /&nbsp; Thêm danh mục phụ </div>
                    </div>
                    <div class="insideBox">
                        <div>
                            <span>Thêm danh mục phụ</span>
                            <?php if($msg){?>
                            <div class="alert alert-success" style="margin-top:10px;width: 100%;border:1px solid #4bd396;color:#4bd396" role="alert">
                                <?php echo $msg?>
                            </div>
                            <?php }?>   
                            <hr>
                            <div>
                                <form method="post" >
                                    <table class="form-input">
                                        <tr>
                                            <td>Category</td>
                                            <td>
                                                <select class="inp" style="margin-bottom: 10px;" name="category">
                                                <?php
                                                $ret=mysqli_query($con,"select id,CategoryName from tblcategory where Is_Active=1");
                                                while($result=mysqli_fetch_array($ret))
                                                { ?>
                                                    <option value="<?php echo $result['id']?>"><?php echo $result['CategoryName'] ?></option>
                                                <?php } ?>
                                                </select>
                                            </td>
                                        </tr>
                                
                                        <tr>
                                            <td style="width:10%;">Sub-Category</td>
                                            <td><input name="subcategory" class="inp" type="text"></td>
                                        </tr>
                                        <tr style="height:20px;"></tr>
                                        <tr>
                                            <td style="float: right;">Sub-Category Description </td>
                                            <td>
                                                <textarea name="scdescription" class="inp"></textarea>
                                            </td>
                                        </tr>
                                        <tr style="height:20px;"></tr>
                                        <tr>
                                            <td></td>
                                            <td>
                                            <button type="submit" class="btn btnsubm" name="submit">Submit</button></td>
                                        </tr>
                                    </table>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <footer> EPU - D14CNPM2 - PHAM VAN DONG - HA NOI</footer>
            </div>
        </div>
    </div>
</body>
</html>