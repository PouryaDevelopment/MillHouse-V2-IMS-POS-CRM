<?php
include('../index/connection2data.php');

$sql = "SELECT COUNT(*) as total_ingredients FROM ingredient";

$stmt = $connection->prepare($sql);
$stmt->execute();

$totalIngredients = $stmt->fetch(PDO::FETCH_ASSOC);

echo $totalIngredients['total_ingredients'];
?>