<?php
require_once('../index/connection2data.php');
$orderId = $_GET['orderId'] ?? 0;

if ($orderId > 0) {
    $stmt = $connection->prepare("DELETE FROM orders WHERE order_id = ?");
    $stmt->execute([$orderId]);

    header('Location: ../../POS-orders.php?message=success'); // Redirect back to the orders list with success get request
} else {
    echo "No order ID provided.";
}
?>