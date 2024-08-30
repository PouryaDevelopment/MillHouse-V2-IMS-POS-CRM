<?php
require_once('../index/connection2data.php');
$startOfWeek = date('Y-m-d', strtotime('monday this week'));
$endOfWeek = date('Y-m-d', strtotime('sunday this week'));

// to sum up the revenue for each day of the current week
$sql = "SELECT DATE(order_date) as order_date, SUM(total) as daily_revenue 
        FROM orders 
        WHERE order_date BETWEEN ? AND ? 
        GROUP BY DATE(order_date)
        ORDER BY order_date ASC";

$stmt = $connection->prepare($sql);
$stmt->execute([$startOfWeek, $endOfWeek]);

$revenueData = [];
while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
    $revenueData[$row['order_date']] = (float)$row['daily_revenue'];
}

// fills in missing days 
$period = new DatePeriod(
    new DateTime($startOfWeek),
    new DateInterval('P1D'),
    (new DateTime($endOfWeek))->modify('+1 day')
);

foreach ($period as $date) {
    $dateKey = $date->format('Y-m-d');
    if (!isset($revenueData[$dateKey])) {
        $revenueData[$dateKey] = 0.0;
    }
}

ksort($revenueData); 

$chartData = [
    'labels' => array_keys($revenueData),
    'data' => array_values($revenueData)
];

header('Content-Type: application/json');
echo json_encode($chartData);
?>