<?php
    header('Content-Type: application/json');
    require_once("database.php");
    $data = array();
    $query = "SELECT year(date) as date, COUNT(year(date)) AS size_date FROM games GROUP BY year(date);";
    $stmt = $conn->prepare($query);
    if($stmt->execute()){
        if($stmt->rowCount()>0){
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        }
    }
    foreach($result as $row){
        $data[] = $row;
    }
    echo json_encode($data);
?>