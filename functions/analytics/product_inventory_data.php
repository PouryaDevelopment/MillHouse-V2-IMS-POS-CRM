<?php
include('../index/connection2data.php');

// fetchs the product names and their quantities from inventory
$sql = "SELECT p.name, i.quantity 
        FROM product p 
        INNER JOIN inventory i ON p.product_id = i.product_id";

$stmt = $connection->prepare($sql);
$stmt->execute();
$productData = $stmt->fetchAll(PDO::FETCH_ASSOC);

// the data for Chart js
$names = [];
$quantities = [];
foreach ($productData as $product) {
    $names[] = $product['name'];
    $quantities[] = $product['quantity'];
}

// echo the data as JSON
echo json_encode(['names' => $names, 'quantities' => $quantities]);
?>