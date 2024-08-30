<?php
require_once('../index/connection2data.php');

$startOfWeek = date('Y-m-d', strtotime('monday this week'));
$endOfWeek = date('Y-m-d', strtotime('sunday this week'));

// SQL statement to get the total number of orders for the current week
$sql = "SELECT COUNT(*) as total_sales 
        FROM orders 
        WHERE order_date >= ? AND order_date <= ?";

$stmt = $connection->prepare($sql);
$stmt->execute([$startOfWeek, $endOfWeek]);
$totalSales = $stmt->fetch(PDO::FETCH_ASSOC);

echo $totalSales['total_sales'];
?>