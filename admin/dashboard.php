<?php
 session_start();
//Database Configuration File
include('includes/config.php');
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <LINK REL="SHORTCUT ICON"  HREF="./images/logo-team-1.png">
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="Quan tri.">
        <!-- App title -->
        <title>Quản lý | DashBoard</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
        <!-- App css -->    
        <link rel="stylesheet" href="css/style-dashboard.css">

        <!-- Font awesome -->
</head>
<body >
    <style>
        #dm{
            background-color: #141414;
        }
    </style>
    <div class="wrapper" id="header-d">
        
        <div class="row">
            <?php include('includes/left-dashb.php');?>
            <div class="" id="noidung">
                <?php include('includes/top-dashb.php');?> 
                <div class="divBox">
                    <div class="divTitle">
                        <div class="txtTitle">BẢNG ĐIỀU KHIỂN</div>
                        <div class="txtLink"><span>GAME&nbsp;</span> / <span>&nbsp; Admin&nbsp;  </span> /&nbsp; Bảng điều khiển </div>
                    </div>
                    <div class="insideBox">
                        <ul>
                            <li>
                                <div onclick="window.location='./manage-category.php';">
                                    <div>
                                        <div>Danh mục chính</div>
                                    </div>
                                    <div class="icon-tc">
                                        <div style="display: inline-block;">
                                        <?php $query=mysqli_query($con,"select * from category where is_Active=1");
                                        $countcat=mysqli_num_rows($query);
                                        ?>

                                        <h2><?php echo htmlentities($countcat);?> <small></small></h2>
                                        </div>
                                        <svg xmlns="http://www.w3.org/2000/svg" width="60" height="60" fill="currentColor" class="bi bi-clipboard-data" viewBox="0 0 16 16">
                                        <path d="M4 11a1 1 0 1 1 2 0v1a1 1 0 1 1-2 0v-1zm6-4a1 1 0 1 1 2 0v5a1 1 0 1 1-2 0V7zM7 9a1 1 0 0 1 2 0v3a1 1 0 1 1-2 0V9z"/>
                                        <path d="M4 1.5H3a2 2 0 0 0-2 2V14a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V3.5a2 2 0 0 0-2-2h-1v1h1a1 1 0 0 1 1 1V14a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1V3.5a1 1 0 0 1 1-1h1v-1z"/>
                                        <path d="M9.5 1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-3a.5.5 0 0 1-.5-.5v-1a.5.5 0 0 1 .5-.5h3zm-3-1A1.5 1.5 0 0 0 5 1.5v1A1.5 1.5 0 0 0 6.5 4h3A1.5 1.5 0 0 0 11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3z"/>
                                        </svg>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div onclick="window.location='./manage-games.php';">
                                    <div>
                                        <div>Trò chơi</div>
                                    </div>
                                    <div class="icon-tc">
                                        <div style="display: inline-block;">
                                        <?php $query=mysqli_query($con,"select * from games where is_Active=1");
                                        $counsubtcat=mysqli_num_rows($query);
                                        ?>

                                        <h2><?php echo htmlentities($counsubtcat);?> <small></small></h2>
                                        </div>
                                        <svg xmlns="http://www.w3.org/2000/svg" width="60" height="60" fill="currentColor" class="bi bi-controller" viewBox="0 0 16 16">
                                        <path d="M11.5 6.027a.5.5 0 1 1-1 0 .5.5 0 0 1 1 0zm-1.5 1.5a.5.5 0 1 0 0-1 .5.5 0 0 0 0 1zm2.5-.5a.5.5 0 1 1-1 0 .5.5 0 0 1 1 0zm-1.5 1.5a.5.5 0 1 0 0-1 .5.5 0 0 0 0 1zm-6.5-3h1v1h1v1h-1v1h-1v-1h-1v-1h1v-1z"/>
                                        <path d="M3.051 3.26a.5.5 0 0 1 .354-.613l1.932-.518a.5.5 0 0 1 .62.39c.655-.079 1.35-.117 2.043-.117.72 0 1.443.041 2.12.126a.5.5 0 0 1 .622-.399l1.932.518a.5.5 0 0 1 .306.729c.14.09.266.19.373.297.408.408.78 1.05 1.095 1.772.32.733.599 1.591.805 2.466.206.875.34 1.78.364 2.606.024.816-.059 1.602-.328 2.21a1.42 1.42 0 0 1-1.445.83c-.636-.067-1.115-.394-1.513-.773-.245-.232-.496-.526-.739-.808-.126-.148-.25-.292-.368-.423-.728-.804-1.597-1.527-3.224-1.527-1.627 0-2.496.723-3.224 1.527-.119.131-.242.275-.368.423-.243.282-.494.575-.739.808-.398.38-.877.706-1.513.773a1.42 1.42 0 0 1-1.445-.83c-.27-.608-.352-1.395-.329-2.21.024-.826.16-1.73.365-2.606.206-.875.486-1.733.805-2.466.315-.722.687-1.364 1.094-1.772a2.34 2.34 0 0 1 .433-.335.504.504 0 0 1-.028-.079zm2.036.412c-.877.185-1.469.443-1.733.708-.276.276-.587.783-.885 1.465a13.748 13.748 0 0 0-.748 2.295 12.351 12.351 0 0 0-.339 2.406c-.022.755.062 1.368.243 1.776a.42.42 0 0 0 .426.24c.327-.034.61-.199.929-.502.212-.202.4-.423.615-.674.133-.156.276-.323.44-.504C4.861 9.969 5.978 9.027 8 9.027s3.139.942 3.965 1.855c.164.181.307.348.44.504.214.251.403.472.615.674.318.303.601.468.929.503a.42.42 0 0 0 .426-.241c.18-.408.265-1.02.243-1.776a12.354 12.354 0 0 0-.339-2.406 13.753 13.753 0 0 0-.748-2.295c-.298-.682-.61-1.19-.885-1.465-.264-.265-.856-.523-1.733-.708-.85-.179-1.877-.27-2.913-.27-1.036 0-2.063.091-2.913.27z"/>
                                        </svg>
                                    </div>
                                </div>
                            </li>
                            <li>
                            <div onclick="window.location='./manage-comments.php';">
                                    <div>
                                        <div>Bình luận</div>
                                    </div>
                                    <div class="icon-tc">
                                        <div style="display: inline-block;">
                                        <?php $query=mysqli_query($con,"select * from comments where status >=0");
                                        $countposts=mysqli_num_rows($query);
                                        ?>
                                        <h2><?php echo htmlentities($countposts);?> <small></small></h2>
                              
                                        </div>
                                        <svg xmlns="http://www.w3.org/2000/svg" width="60" height="60" fill="currentColor" class="bi bi-layers-fill" viewBox="0 0 16 16">
                                        <path d="M7.765 1.559a.5.5 0 0 1 .47 0l7.5 4a.5.5 0 0 1 0 .882l-7.5 4a.5.5 0 0 1-.47 0l-7.5-4a.5.5 0 0 1 0-.882l7.5-4z"/>
                                        <path d="m2.125 8.567-1.86.992a.5.5 0 0 0 0 .882l7.5 4a.5.5 0 0 0 .47 0l7.5-4a.5.5 0 0 0 0-.882l-1.86-.992-5.17 2.756a1.5 1.5 0 0 1-1.41 0l-5.17-2.756z"/>
                                        </svg>
                                    </div>
                                </div>
                            </li>
                            <li>
                            <div onclick="window.location='./manage-hoadon.php';">
                                    <div>
                                        <div>Hóa đơn</div>
                                    </div>
                                    <div class="icon-tc">
                                        <div style="display: inline-block;">
                                        <?php $query=mysqli_query($con,"select * from bill");
                                        $countposts=mysqli_num_rows($query);
                                        ?>
                                        <h2><?php echo htmlentities($countposts);?> <small></small></h2>
                              
                                        </div>
                                        <svg xmlns="http://www.w3.org/2000/svg" width="60" height="60" fill="currentColor" class="bi bi-layers-fill" viewBox="0 0 16 16">
                                        <path d="M7.765 1.559a.5.5 0 0 1 .47 0l7.5 4a.5.5 0 0 1 0 .882l-7.5 4a.5.5 0 0 1-.47 0l-7.5-4a.5.5 0 0 1 0-.882l7.5-4z"/>
                                        <path d="m2.125 8.567-1.86.992a.5.5 0 0 0 0 .882l7.5 4a.5.5 0 0 0 .47 0l7.5-4a.5.5 0 0 0 0-.882l-1.86-.992-5.17 2.756a1.5 1.5 0 0 1-1.41 0l-5.17-2.756z"/>
                                        </svg>
                                    </div>
                                </div>
                            </li>
                            <li>
                            <div onclick="window.location='./manage-lienhe.php';">
                                    <div>
                                        <div>Liên hệ</div>
                                    </div>
                                    <div class="icon-tc">
                                        <div style="display: inline-block;">
                                        <?php $query=mysqli_query($con,"select * from contact");
                                        $countposts=mysqli_num_rows($query);
                                        ?>
                                        <h2><?php echo htmlentities($countposts);?> <small></small></h2>
                              
                                        </div>
                                        <svg xmlns="http://www.w3.org/2000/svg" width="60" height="60" fill="currentColor" class="bi bi-layers-fill" viewBox="0 0 16 16">
                                        <path d="M7.765 1.559a.5.5 0 0 1 .47 0l7.5 4a.5.5 0 0 1 0 .882l-7.5 4a.5.5 0 0 1-.47 0l-7.5-4a.5.5 0 0 1 0-.882l7.5-4z"/>
                                        <path d="m2.125 8.567-1.86.992a.5.5 0 0 0 0 .882l7.5 4a.5.5 0 0 0 .47 0l7.5-4a.5.5 0 0 0 0-.882l-1.86-.992-5.17 2.756a1.5 1.5 0 0 1-1.41 0l-5.17-2.756z"/>
                                        </svg>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div>
                                <div onclick="window.location='./trash-game.php';">
                                        <div>Thùng rác</div>
                                    </div>
                                    <div class="icon-tc">
                                        <div style="display: inline-block;">
                                        <?php $query=mysqli_query($con,"select * from games where Is_Active=0");
                                        $countposts=mysqli_num_rows($query);
                                        ?>
                                        <h2><?php echo htmlentities($countposts);?> <small></small></h2>
                              
                                        </div>
                                        <svg xmlns="http://www.w3.org/2000/svg" width="60" height="60" fill="currentColor" class="bi bi-trash-fill" viewBox="0 0 16 16">
                                        <path d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0z"/>
                                        </svg>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
                <footer> EPU - D14CNPM2 - PHAM VAN DONG - HA NOI</footer>
            </div>
        </div>
    </div>
</body>
</html>