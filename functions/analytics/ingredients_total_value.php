<?php
include('../index/connection2data.php');
//  to sum the "total" column for all ingredients
$sql = "SELECT SUM(total) as total_value FROM ingredient";

$stmt = $connection->prepare($sql);
$stmt->execute();
$totalValue = $stmt->fetch(PDO::FETCH_ASSOC);

echo number_format((float)$totalValue['total_value'], 2, '.', '');
?>