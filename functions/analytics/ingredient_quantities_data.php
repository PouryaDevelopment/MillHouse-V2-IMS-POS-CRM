<?php
include('../index/connection2data.php');

//fetch ingredient names and their quantities
$sql = "SELECT name, quantity FROM ingredient";

$stmt = $connection->prepare($sql);
$stmt->execute();
$ingredientData = $stmt->fetchAll(PDO::FETCH_ASSOC);

// data for Chart js
$names = [];
$quantities = [];
foreach ($ingredientData as $ingredient) {
    $names[] = $ingredient['name'];
    $quantities[] = $ingredient['quantity'];
}

// echo the data as JSON
echo json_encode(['names' => $names, 'quantities' => $quantities]);
?>