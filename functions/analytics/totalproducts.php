<?php
include('../index/connection2data.php');

$sql = "SELECT COUNT(*) as total_products FROM product";

$stmt = $connection->prepare($sql);
$stmt->execute();
$totalProducts = $stmt->fetch(PDO::FETCH_ASSOC);

echo $totalProducts['total_products'];
?>