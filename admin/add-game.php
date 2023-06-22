<?php
session_start();
include('includes/config.php');
$msg=0;
$internet="No";
if(isset($_POST['submit']))
    {
        $name=$_POST['name-game'];
        $developer=$_POST['developer'];
        $category=$_POST['category'];
        $intro=$_POST['intro'];

        $image = $_FILES['image']['name'];
        $image_tmp = $_FILES['image']['tmp_name'];

        $internet=$_POST['internet'];
        $version=$_POST['version']; 
        $size=$_POST['size'];
        $price=$_POST['price'];


        $status=1;// trang thai chua xoa
        $query=mysqli_query($con,"INSERT INTO games(name,developer,IdCategory,intro,version,price,size,image,internet,is_Active)
        values('$name','$developer','$category','$intro','$version','$price','$size','$image','$internet','$status')");
    if($query)
    {
        $msg = 'Thêm mới thành công!';
    }
    else{
        $msg = 'Query lỗi r cha. Kiểm tra quanh chỗ database xem sai chỗ nào k';
    } 
    move_uploaded_file($image_tmp, './../images/'.$image);
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
        <title>Newsportal | Add Category</title>
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
    <!-- hiện và đổi màu phần tử trong left bar -->  
    <style>
        #game{
            display: block;
        }
        #game>ul>li>.doimauchu-1{
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
                        <div class="txtTitle">Thêm danh mục</div>
                        <div class="txtLink"><span>Quản trị&nbsp;</span> / <span>&nbsp; Admin&nbsp;  </span> /&nbsp; Thêm trò chơi</div>
                    </div>
                    <div class="insideBox">
                        <div>
                            <span>Thêm trò chơi</span>
                            <?php if($msg){?>
                            <div class="alert alert-success" style="margin-top:10px;width: 100%;border:1px solid #4bd396;color:#4bd396" role="alert">
                                <?php echo $msg?>
                            </div>
                            <?php }?>   
                            <hr>
                            <div>
                                <form method="post" enctype="multipart/form-data">
                                    <table class="form-input">
                                        <tr>
                                            <td style="width:10%;">Tên trò chơi</td>
                                            <td><input name="name-game" class="inp" type="text"></td>
                                        </tr>
                                        <tr style="height:20px;"></tr>
                                        <tr>
                                            <td style="width:10%;">Nhà sản xuất</td>
                                            <td><input name="developer" class="inp" type="text"></td>
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
                                                <textarea name="intro" class="inp"></textarea>
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
                                                <input name="internet" type="radio"  value="Yes" <?php echo ($internet== 'Yes') ?  "checked" : "" ;  ?>/> Có
                                                <input name="internet" type="radio" style="margin-left:10px;"  value="No" <?php echo ($internet== 'No') ?  "checked" : "" ;  ?>/> Không
                                            </td>
                                        </tr>
                                        <tr style="height:20px;"></tr>
                                        <tr>
                                            <td>Phiên bản</td>
                                            <td>
                                                <input  name="version" class="inp">
                                            </td>
                                        </tr>
                                        <tr style="height:20px;"></tr>
                                        <tr>
                                            <td>Kích cỡ</td>
                                            <td>
                                                <input  name="size" class="inp">
                                            </td>
                                        </tr>
                                        <tr style="height:20px;"></tr>
                                        <tr>
                                            <td>Giá</td>
                                            <td>
                                                <input type="number" name="price" class="inp">
                                            </td>
                                        </tr>
                                        <tr style="height:20px;"></tr>
                                        <tr>
                                            <td></td>
                                            <td>
                                            <button type="submit" class="btn btnsubm" name="submit">Thêm</button></td>
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