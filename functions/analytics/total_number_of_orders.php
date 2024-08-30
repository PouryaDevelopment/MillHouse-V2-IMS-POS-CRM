<?php
include('../index/connection2data.php'); 

// count the number of orders
$sql = "SELECT COUNT(*) as total_orders FROM orders";

$stmt = $connection->prepare($sql);
$stmt->execute();
$totalOrders = $stmt->fetch(PDO::FETCH_ASSOC);

echo $totalOrders['total_orders'];
?>