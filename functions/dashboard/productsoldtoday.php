<?php
include('../index/connection2data.php'); 

$currentDate = date('Y-m-d'); 

// an SQL to get all items for orders made today
$sql = "SELECT items FROM orders WHERE DATE(order_date) = ?";
$stmt = $connection->prepare($sql);
$stmt->execute([$currentDate]);

$productCounts = [];

while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
    // product names and quantities using regex
    preg_match_all('/(\w+)(?: - £\d+\.\d+ x )(\d+)/', $row['items'], $matches, PREG_SET_ORDER);
    foreach ($matches as $match) {
        $product = $match[1]; // product name
        $quantity = (int)$match[2]; // quantity sold
        
        if (!isset($productCounts[$product])) {
            $productCounts[$product] = 0;
        }
        
        $productCounts[$product] += $quantity;
    }
}

// data for chart js
$chartData = [
    'labels' => array_keys($productCounts),
    'data' => array_values($productCounts)
];

header('Content-Type: application/json');
echo json_encode($chartData);
?>