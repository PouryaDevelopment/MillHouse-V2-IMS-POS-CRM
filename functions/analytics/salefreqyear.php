<?php
include('../index/connection2data.php'); 

$currentYearStart = date('Y-01-01');
$currentYearEnd = date('Y-12-31');

// count the number of orders for each day of the current year
$sql = "SELECT DATE(order_date) as order_date, COUNT(*) as order_count 
        FROM orders 
        WHERE order_date BETWEEN ? AND ? 
        GROUP BY DATE(order_date)
        ORDER BY order_date ASC";

$stmt = $connection->prepare($sql);
$stmt->execute([$currentYearStart, $currentYearEnd]);

$salesData = [];
while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
    $salesData[$row['order_date']] = (int)$row['order_count'];
}


$period = new DatePeriod(
    new DateTime($currentYearStart),
    new DateInterval('P1D'),
    (new DateTime($currentYearEnd))->modify('+1 day')
);

foreach ($period as $date) {
    $dateKey = $date->format('Y-m-d');
    if (!isset($salesData[$dateKey])) {
        $salesData[$dateKey] = 0;
    }
}

ksort($salesData); 


$chartData = [
    'labels' => array_keys($salesData),
    'data' => array_values($salesData)
];

header('Content-Type: application/json');
echo json_encode($chartData);
?>