<?php
	$conn = mysqli_connect("localhost","root","","web_gamenew");
	mysqli_set_charset($conn,"utf8");
?>
<?php
    $sql = "SELECT * FROM gamesfree";
    $query = mysqli_query($conn, $sql);
            $result = mysqli_query($conn, 'select count(version) as total from gamesfree');
            $row = mysqli_fetch_assoc($result);
            $total_records = $row['total'];
            $current_page = isset($_GET['page']) ? $_GET['page'] : 1;
            $limit = 4;
             
            $total_page = ceil($total_records / $limit);
             
            if ($current_page > $total_page){
                $current_page = $total_page;
            }
            else if ($current_page < 1){
                $current_page = 1;
            }
             
            $start = ($current_page - 1) * $limit;
            $result = mysqli_query($conn, "SELECT * FROM games LIMIT $start, $limit");
?>

<table style="margin-left: -250px"; >
      <?php while ($row = mysqli_fetch_assoc($query)) {
      {?>
        <td><div class="leftbox"><form action="muahang.php" method="post">
          <h1><?php echo $row['name']?></h1>
          <img width="93" height="95" alt="photo 1"name="image" class="left" src="images/<?php echo $row['image']; ?>">
          <div><c>Nội dung : </c><?php echo $row['version']?></div>
          <p><c>Nhà phát triển : </c><?php echo $row['developer']?></p>
          <p><c>Thể loại : </c><?php echo $row['Category']?></p>
          <p><c>Cập nhật : </c><?php echo $row['date']?></p>
          <p><c>Giá : </c> <bf><?php echo $row['price']?></bf> VNĐ</p>
         <p ><input class="readmore mx-auto" type="submit" name="addcart" value="Mua Game"></p>
                                <input type="hidden" name="name" value="<?php echo $row['name']; ?>">
                                <input type="hidden" name="price" value="<?php echo $row['price']; ?>">
                                <input type="hidden" name="image" value="<?php echo $row['image']; ?>">	
                                <input type="hidden" name="version" value="<?php echo $row['version']; ?>">
                                <input type="hidden" name="Category" value="<?php echo $row['Category']; ?>">
                                <input type="hidden" name="date" value="<?php echo $row['date']; ?>">	
                              </form>
          <div class="clear"></div>
        </div></td>
     <?php }}?>
    </table>  