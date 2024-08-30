<?php
include('../index/connection2data.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $quantity = $_POST['quantity'];
    $unitPrice = $_POST['unit_price'];


    // the insert statement
    $stmt = $connection->prepare("INSERT INTO ingredient (name, quantity, unit_price) VALUES (:name, :quantity, :unit_price)");
    $stmt->bindParam(':name', $name);
    $stmt->bindParam(':quantity', $quantity);
    $stmt->bindParam(':unit_price', $unitPrice);

if ($stmt->execute()) {
        header('Location: ../../inventory-ingredients.php?message=success');
    } else {
        header('Location: ../../inventory-ingredients.php?message=failure');
        exit();
    }
    
}
?>