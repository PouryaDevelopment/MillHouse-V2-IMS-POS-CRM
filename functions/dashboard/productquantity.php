<?php
include('../index/connection2data.php'); 

//an SQL statement to join product and inventory tables and select the quantity
$sql = "SELECT p.name, i.quantity 
        FROM product p 
        JOIN inventory i ON p.product_id = i.product_id";

$stmt = $connection->prepare($sql);
$stmt->execute();

$products = [];
$quantities = [];

while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
    $products[] = $row['name'];
    $quantities[] = $row['quantity'];
}

$chartData = [
    'labels' => $products,
    'data' => $quantities
];

header('Content-Type: application/json');
echo json_encode($chartData);
?>