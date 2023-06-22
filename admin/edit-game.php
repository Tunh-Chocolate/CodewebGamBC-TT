<?php
session_start();
include('includes/config.php');
$internet="No";
if(isset($_POST['update']))
    {
        $catid=intval($_GET['cid']);
        $name=$_POST['name-game'];
        $developer=$_POST['developer'];
        $category=$_POST['category'];
        $intro=$_POST['intro'];

        if ($_FILES['image']['name']=="") {
			$image = $row_up['name'];
   		}else{
   			$image = $_FILES['image']['name'];
            $image_tmp = $_FILES['image']['tmp_name'];
            move_uploaded_file($image_tmp, './../images/'.$image);
   		}
        $internet=$_POST['internet'];
        $version=$_POST['version'];
        $size=$_POST['size'];
        $price=$_POST['price'];

        $status=1;// trang thai chua xoa
        $query=mysqli_query($con,"update games set name='$name',developer='$developer',
        IdCategory='$category',intro='$intro',image='$image',internet='$internet',version='$version',
        size='$size',price='$price',is_Active='$status' where  id='$catid'");
    if($query)
    {
        echo "<script type='text/javascript' >alert('Cập nhật game thành công!');document.location = 'manage-games.php'</script>";
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
        <meta name="description" content="Game.">
        <!-- App title -->
        <title>GAME | Edit Game</title>
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
                        <div class="txtTitle">Edit Game</div>
                        <div class="txtLink"><span>Game &nbsp;</span> / <span>&nbsp; Admin&nbsp;  </span> /&nbsp; Edit Game </div>
                    </div>
                    <div class="insideBox">
                        <div>
                            <span>Edit Game</span>   
                            <hr>
                            <div>
                            <?php 
                            $catid=intval($_GET['cid']);
                            $query=mysqli_query($con,"select * from  games where is_Active=1 and id='$catid'");
                            while($row=mysqli_fetch_array($query))
                            {
                            ?>
                                <form method="post"  enctype="multipart/form-data">
                                    <table class="form-input">
                                        <tr>
                                            <td style="width:10%;">Tên trò chơi</td>
                                            <td><input name="name-game" class="inp"value="<?php echo $row['name']; ?>" type="text"></td>
                                        </tr>
                                        <tr style="height:20px;"></tr>
                                        <tr>
                                            <td style="width:10%;">Nhà sản xuất</td>
                                            <td><input name="developer" class="inp" type="text" value="<?php echo $row['developer']; ?>"></td>
                                        </tr>
                                        <tr style="height:20px;"></tr>
                                        <tr>
                                            <td>Loại</td>
                                            <td>
                                                <select class="inp" style="margin-bottom: 10px;" name="category">
                                                <?php
                                                $ret=mysqli_query($con,"select IdCategory,CategoryName from category where Is_Active=1");
                                                while($result=mysqli_fetch_array($ret))
                                                { ?>
                                                    <option value="<?php echo $result['IdCategory']?>"><?php echo $result['CategoryName'] ?></option>
                                                <?php } ?>
                                                </select>
                                            </td>
                                        </tr>
                                        <tr style="height:20px;"></tr>
                                        <tr>
                                            <td>Giới thiệu</td>
                                            <td>
                                                <textarea name="intro" class="inp"><?php echo $row['intro']; ?></textarea>
                                            </td>
                                        </tr>
                                        <tr style="height:20px;"></tr>
                                        <tr>
                                            <td>Ảnh</td>
                                            <td>
                                                <input type="file" name="image" class="inp" id="">
                                            </td>
                                        </tr>
                                        <tr style="height:20px;"></tr>
                                        <tr>
                                            <td>Trực tuyến:</td>
                                            <td>
                                                <input name="internet" type="radio"  value="Yes" <?php echo ($internet== 'Yes') ?  "checked" : "" ;  ?>> Có
                                                <input name="internet" type="radio" style="margin-left:10px;"  value="No" <?php echo ($internet== 'No') ?  "checked" : "" ;  ?>/> Không
                                            </td>
                                        </tr>
                                        <tr style="height:20px;"></tr>
                                        <tr>
                                            <td>Phiên bản</td>
                                            <td>
                                                <input type="number" name="version" class="inp" value="<?php echo $row['version']; ?>">
                                            </td>
                                        </tr>
                                        <tr style="height:20px;"></tr>
                                        <tr>
                                            <td>Kích cỡ</td>
                                            <td>
                                                <input type="number" name="size" class="inp" value="<?php echo $row['size']; ?>">
                                            </td>
                                        </tr>
                                        <tr style="height:20px;"></tr>
                                        <tr>
                                            <td>Giá</td>
                                            <td>
                                                <input type="number" name="price" class="inp" value="<?php echo $row['price']; ?>">
                                            </td>
                                        </tr>
                                        <tr style="height:20px;"></tr>
                                        <tr>
                                            <td></td>
                                            <td>
                                            <button type="submit" class="btn btnsubm" name="update">Sửa</button></td>
                                        </tr>
                                    </table>
                                </form>
                                <?php } ?>
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