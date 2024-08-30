<?php
include('../index/connection2data.php'); 
$currentDate = date('Y-m-d');

// an SQL statement to count the number of sales entries for today
$sql = "SELECT COUNT(*) as total_sales FROM orders WHERE DATE(order_date) = ?";
$stmt = $connection->prepare($sql);
$stmt->execute([$currentDate]);

$result = $stmt->fetch(PDO::FETCH_ASSOC);


header('Content-Type: application/json');
echo json_encode($result);
?>