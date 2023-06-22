<?php
    $conn = mysqli_connect("localhost","root","","web_gamenew");
    mysqli_set_charset($conn,"utf8");
    $sql = "SELECT * FROM bill";
    $query = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($query);

    session_start();
    if(!isset($_SESSION['giohang'])) $_SESSION['giohang']=[];
    //làm rỗng giỏ hàng
    if(isset($_GET['delcart'])&&($_GET['delcart']==1)) unset($_SESSION['giohang']);
    //xóa sp trong giỏ hàng
    if(isset($_GET['delid'])&&($_GET['delid']>=0)){
       array_splice($_SESSION['giohang'],$_GET['delid'],1);
    }
    //lấy dữ liệu từ form
    if(isset($_POST['addcart'])&&($_POST['addcart'])){
        $image=$_POST['image'];
        $name=$_POST['name'];
        $price=$_POST['price'];
        $Category=$_POST['Category'];

        //kiem tra sp co trong gio hang hay khong?

        $fl=0; //kiem tra sp co trung trong gio hang khong?

        for ($i=0; $i < sizeof($_SESSION['giohang']); $i++) { 
            
            if($_SESSION['giohang'][$i][1]==$name){
                $fl=1;
                $soluongnew=$soluong+$_SESSION['giohang'][$i][3];
                $_SESSION['giohang'][$i][3]=$soluongnew;
                break;

            }
            
        }
        //neu khong trung sp trong gio hang thi them moi
        if($fl==0){
            //them moi sp vao gio hang
            $sp=[$image,$name,$price,$Category];
            $_SESSION['giohang'][]=$sp;
        }

       // var_dump($_SESSION['giohang']);
    }

    function tongdonhang(){
        if(isset($_SESSION['giohang'])&&(is_array($_SESSION['giohang']))){
            if(sizeof($_SESSION['giohang'])>0){
                $tong=0;
                for ($i=0; $i < sizeof($_SESSION['giohang']); $i++) { 
                    $tt=$_SESSION['giohang'][$i][2];
                    $tong+=$tt;
                }
            }    
        }
        return $tong;
    }
    function showgiohang(){
        if(isset($_SESSION['giohang'])&&(is_array($_SESSION['giohang']))){
            if(sizeof($_SESSION['giohang'])>0){
                $tong=0;
                for ($i=0; $i < sizeof($_SESSION['giohang']); $i++) { 
                    $tt=$_SESSION['giohang'][$i][2] ;
                    $tong+=$tt;
                    echo '<tr>
                            <td>'.($i+1).'</td>
                            <td><img style="width: 100px;" src="images/'.$_SESSION['giohang'][$i][0].'" alt=""></td>
                            <td>'.$_SESSION['giohang'][$i][1].'</td>
                            <td>'.$_SESSION['giohang'][$i][2].'VNĐ</td>
                            <td>'.$_SESSION['giohang'][$i][3].'</td>
                            <td>
                                <div>'.$tt.'VNĐ</div>
                            </td>
                            <td>
                                <a href="muahang.php?delid='.$i.'">Xóa</a>
                            </td>
                        </tr>';
                }
                echo '<tr>
                        <th colspan="5">Tổng đơn hàng</th>
                        <th>
                            <div>'.$tong.'VNĐ</div>
                        </th>
    
                    </tr>';
            }else{
                echo "Giỏ hàng rỗng!";
            }    
        }
    }
?>