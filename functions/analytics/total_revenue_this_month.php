<?php
include('../index/connection2data.php'); 

$firstDayOfTheMonth = date('Y-m-01');

//  sum the total column for the current month's orders
$sql = "SELECT SUM(total) as total_revenue 
        FROM orders 
        WHERE order_date >= ? AND order_date < DATE_ADD(LAST_DAY(NOW()), INTERVAL 1 DAY)";

$stmt = $connection->prepare($sql);
$stmt->execute([$firstDayOfTheMonth]);
$totalRevenue = $stmt->fetch(PDO::FETCH_ASSOC);

echo number_format((float)$totalRevenue['total_revenue'], 2, '.', '');
?>