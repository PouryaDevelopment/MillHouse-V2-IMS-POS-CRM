<?php
include('../index/connection2data.php'); 

$product_id = $_GET['product_id'] ?? '';

if ($product_id) {
    $stmt = $connection->prepare("SELECT quantity FROM inventory WHERE product_id = :product_id");
    $stmt->execute(['product_id' => $product_id]);
    
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    echo $result ? $result['quantity'] : 'Unavailable';
} else {
    echo 'No product selected';
}
?>