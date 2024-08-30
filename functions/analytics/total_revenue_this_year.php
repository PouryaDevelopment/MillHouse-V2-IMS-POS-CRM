<?php
include('../index/connection2data.php'); 
$firstDayOfTheYear = date('Y-01-01');
$lastDayOfTheYear = date('Y-12-31');

$sql = "SELECT SUM(total) as total_revenue 
        FROM orders 
        WHERE order_date BETWEEN ? AND ?";

$stmt = $connection->prepare($sql);
$stmt->execute([$firstDayOfTheYear, $lastDayOfTheYear]);
$totalRevenue = $stmt->fetch(PDO::FETCH_ASSOC);

echo number_format((float)$totalRevenue['total_revenue'], 2, '.', '');
?>