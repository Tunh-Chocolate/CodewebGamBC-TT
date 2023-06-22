
<?php include('includes/config.php');?>
<?php include('chan-bieu-mau/cbm.php');?>


<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="News Portal.">
        <!-- Bieu do -->
        <script type="text/javascript" src="js/jquery.min.js"></script>
        <script type="text/javascript" src="js/Chart.min.js"></script>
        <!-- App title -->
        <LINK REL="SHORTCUT ICON"  HREF="./images/logo-team-1.png">
        <title>Newsportal | Manage Category</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
       
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
        <!-- App css -->    
        <link rel="stylesheet" href="css/style-dashboard.css">

        <!-- Font awesome -->
</head>
<body >
    <!-- ẩn hiện và đổi màu phần tử trong left bar -->
    
<style>
        #chart-container {
        width: 100%;
        height: 100%;
        }
        #tk{
            background-color: #141414;
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
                        <div class="txtTitle">THỐNG KÊ SỐ LƯỢNG GAME QUA TỪNG NĂM</div>
                        <div class="txtLink"><span>QUẢN TRỊ&nbsp;</span> / <span>&nbsp; Admin&nbsp;  </span> /&nbsp; T.K.Game </div>
                    </div>
                    <div class="insideBox">
                        <div id="chart-container">
                            <canvas style="height: 340px;width: 900px;" id="graph"></canvas>
                        </div>
                        
                    </div>
                </div>
                <footer>EPU - D14CNPM2 - PHAM VAN DONG - HA NOI</footer>
            </div>
        </div>
    </div>
    <script>
        $(document).ready(function () {
            showGraph();
        });

        function showGraph(){
        
            $.post("data.php",
                function (data){
                    console.log(data);
                    var formStatusVar = [];
                    var total = []; 

                    for (var i in data) {
                        formStatusVar.push(data[i].date);
                        total.push(data[i].size_date);
                    }

                    var options = {
                        legend: {
                            display: false
                        },
                        scales: {
                            xAxes: [{
                                display: true
                            }],
                        yAxes: [{
                                ticks: {
                                    beginAtZero: true
                                }
                            }]
                        }
                    };

                    var myChart = {
                        labels: formStatusVar,
                        datasets: [
                            {
                                label: 'Số lượng game',
                                backgroundColor: '#17cbd1',
                                borderColor: '#46d5f1',
                                hoverBackgroundColor: '#0ec2b6',
                                color:'white',
                                hoverBorderColor: '#42f5ef',
                                data: total
                            }
                        ]
                    };

                    var bar = $("#graph"); 
                    var barGraph = new Chart(bar, {
                        type: 'bar',
                        data: myChart,
                        options: options
                    });
                });
        }
    </script>
</body>
</html>