<?php
include('../index/connection2data.php'); 

$currentDate = date('Y-m-d');

// an SQL to sum the total sales for today
$sql = "SELECT SUM(total) as total_sales FROM orders WHERE DATE(order_date) = ?";
$stmt = $connection->prepare($sql);
$stmt->execute([$currentDate]);

$result = $stmt->fetch(PDO::FETCH_ASSOC);

//  if result is nul it will set to zero
$totalSalesToday = $result['total_sales'] ?? 0;

header('Content-Type: application/json');
echo json_encode(['total_sales' => $totalSalesToday]);
?>