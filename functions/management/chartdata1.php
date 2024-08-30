<?php 
include('../index/connection2data.php');

$sql = "SELECT DATE(created_at) as created_date, COUNT(*) as user_count 
        FROM users 
        GROUP BY DATE(created_at) 
        ORDER BY DATE(created_at)";

$result = $connection->query($sql);

$chartData = [];
while($row = $result->fetch(PDO::FETCH_ASSOC)) { 
    $chartData[] = $row;
}

header('Content-Type: application/json');
echo json_encode($chartData);
?>