<?php
include('../index/connection2data.php'); 

$firstDayOfTheMonth = date('Y-m-01');
$lastDayOfTheMonth = date('Y-m-t');

$sql = "SELECT items FROM orders WHERE order_date >= ? AND order_date <= ?";
$stmt = $connection->prepare($sql);
$stmt->execute([$firstDayOfTheMonth, $lastDayOfTheMonth]);

$productsSold = []; // Will hold product_name => quantity_sold

while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
    $itemsArray = explode(', ', $row['items']);
    foreach ($itemsArray as $item) {
        
        // using regex to match the name and the quantity
        if (preg_match('/^(.*?) - £\d+(.\d+)? x (\d+)$/', $item, $matches)) {
            $productName = $matches[1];
            $quantity = (int)$matches[3];
            if (!isset($productsSold[$productName])) {
                $productsSold[$productName] = 0;
            }
            $productsSold[$productName] += $quantity;
        }
    }
}

$productNames = array_keys($productsSold);
$productQuantities = array_values($productsSold);

//  the data for chart  js
$chartData = [
    'productNames' => $productNames,
    'productQuantities' => $productQuantities
];


header('Content-Type: application/json');
echo json_encode($chartData);
?>