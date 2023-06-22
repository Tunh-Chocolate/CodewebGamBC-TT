<?php
session_start();
include('includes/config.php');
if(isset($_POST['update']))
    {
        $catid=intval($_GET['cid']);
        $category=$_POST['category'];
        $description=$_POST['description'];
        $today = date("y-m-d h:i:s");
        $status=1;// trang thai chua xoa
        $query=mysqli_query($con,"update category set CategoryName='$category',Description='$description',is_Active='$status',UpdationDate='$today' where idCategory='$catid'");
    if($query)
    {
        echo "<script type='text/javascript' >alert('Cập nhật thể loại thành công!');document.location = 'manage-category.php'</script>";
    }
    else{
        echo "<script type='text/javascript' >alert('Query lỗi r cha. Kiểm tra quanh chỗ database xem sai chỗ nào k);</script>";
    } 
}
?>
<?php include('chan-bieu-mau/cbm.php');?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="News Portal.">
        <!-- App title -->
        <title>Newsportal | Edit Category</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
        <!-- App css -->    
        <link rel="stylesheet" href="css/style-dashboard.css">
        <LINK REL="SHORTCUT ICON"  HREF="./images/logo-team-1.png">

        <!-- Font awesome -->
</head>
<body >
    <div class="wrapper" id="header-d">
        <div class="row">
            <?php include('includes/left-dashb.php');?>
            <div  id="noidung">
                <?php include('includes/top-dashb.php');?> 
                <div class="divBox">
                    <div class="divTitle">
                        <div class="txtTitle">Edit Category</div>
                        <div class="txtLink"><span>Game&nbsp;</span> / <span>&nbsp; Admin&nbsp;  </span> /&nbsp; Edit Category </div>
                    </div>
                    <div class="insideBox">
                        <div>
                            <span>Edit Category</span>   
                            <hr>
                            <div>
                            <?php 
                            $catid=intval($_GET['cid']);
                            $query=mysqli_query($con,"select idCategory,CategoryName,Description,PostingDate
                            ,UpdationDate from  category where is_Active=1 and idCategory='$catid'");
                            while($row=mysqli_fetch_array($query))
                            {
                            ?>
                                <form method="post" >
                                    <table class="form-input">
                                        <tr>
                                            <td style="width:10%;">Category</td>
                                            <td><input name="category" class="inp" type="text" required value="<?php echo $row['CategoryName']; ?>"></td>
                                        </tr>
                                        <tr style="height:20px;"></tr>
                                        <tr>
                                            <td style="float: right;">Category Description </td>
                                            <td>
                                                <textarea name="description" class="inp" rows="5" required ><?php echo $row['Description']; ?></textarea>
                                            </td>
                                        </tr>
                            <?php } ?>
                                        <tr style="height:20px;"></tr>
                                        <tr>
                                            <td></td>
                                            <td>
                                            <button type="submit" class="btn btnsubm" name="update">Update</button></td>
                                        </tr>
                                    </table>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <footer>TRUONG - DAT - EPU - D14CNPM2 - PHAM VAN DONG - HA NOI</footer>
            </div>
        </div>
    </div>
</body>
</html>