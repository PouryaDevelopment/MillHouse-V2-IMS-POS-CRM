<?php
include('../index/connection2data.php'); 

$firstDayOfTheMonth = date('Y-m-01');
$lastDayOfTheMonth = date('Y-m-t');

// count the number of orders for each day of the current month
$sql = "SELECT DATE(order_date) as order_date, COUNT(*) as order_count 
        FROM orders 
        WHERE order_date BETWEEN ? AND ? 
        GROUP BY DATE(order_date)
        ORDER BY order_date ASC";

$stmt = $connection->prepare($sql);
$stmt->execute([$firstDayOfTheMonth, $lastDayOfTheMonth]);

$salesData = [];
while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
    $salesData[$row['order_date']] = (int)$row['order_count'];
}

// fills the missing dates with zero orders
$period = new DatePeriod(
    new DateTime($firstDayOfTheMonth),
    new DateInterval('P1D'),
    new DateTime($lastDayOfTheMonth)
);

foreach ($period as $date) {
    $dateKey = $date->format('Y-m-d');
    if (!isset($salesData[$dateKey])) {
        $salesData[$dateKey] = 0;
    }
}

ksort($salesData); // sorts the data for the chart

// preps the data for chart js
$chartData = [
    'labels' => array_keys($salesData),
    'data' => array_values($salesData)
];

//  json
header('Content-Type: application/json');
echo json_encode($chartData);
?>