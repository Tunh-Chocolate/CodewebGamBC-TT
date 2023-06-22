<?php
session_start();
include('includes/config.php');

if(isset($_POST['update']))
    {
        $scatid=intval($_GET['scid']);
        $idcat=$_POST['category'];
        $subcategory=$_POST['subcategory'];
        $description=$_POST['description'];
        $today = date("y-m-d h:i:s");
        $status=1;// trang thai chua xoa
        $query=mysqli_query($con,"update tblsubcategory set CategoryId = '$idcat', Subcategory='$subcategory',SubCatDescription='$description',Is_Active='$status',UpdationDate='$today' where SubCategoryId='$scatid'");
    if($query)
    {
        echo "<script type='text/javascript' >alert('Category Updated!');document.location = 'manage-category.php'</script>";
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
                        <div class="txtLink"><span>NewsPortal&nbsp;</span> / <span>&nbsp; Admin&nbsp;  </span> /&nbsp; Edit Category </div>
                    </div>
                    <div class="insideBox">
                        <div>
                            <span>Edit Category</span>   
                            <hr>
                            <div>
                            <?php 
                            $subcatid=intval($_GET['scid']);
                            $query=mysqli_query($con,"Select tblcategory.CategoryName as catname,tblcategory.id as catid,tblsubcategory.Subcategory as Subcategory,tblsubcategory.SubCatDescription as SubCatDescription,tblsubcategory.PostingDate as subcatpostingdate,tblsubcategory.UpdationDate as subcatupdationdate,tblsubcategory.SubCategoryId as subcatid from tblsubcategory join tblcategory on tblsubcategory.CategoryId=tblcategory.id where tblsubcategory.Is_Active=1 and  SubCategoryId='$subcatid'");
                            
                            while($row=mysqli_fetch_array($query))
                            {

                            ?>
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
                                            <td><input name="subcategory" class="inp" type="text" required value="<?php echo $row['Subcategory']; ?>"></td>
                                        </tr>
                                        <tr style="height:20px;"></tr>
                                        <tr>
                                            <td style="float: right;">Sub-Category Description </td>
                                            <td>
                                                <textarea name="description" class="inp" rows="5" required ><?php echo $row['SubCatDescription']; ?></textarea>
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
                <footer> EPU - D14CNPM2 - PHAM VAN DONG - HA NOI</footer>
            </div>
        </div>
    </div>
</body>
</html>