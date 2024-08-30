<?php

include('../index/connection2data.php');

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['update'])) {

    $ingredientId = $_POST['ingredient_id'];
    $name = $_POST['name'];
    $quantity = $_POST['quantity'];
    $unitPrice = $_POST['unit_price'];



    // the update statement
    $stmt = $connection->prepare("UPDATE ingredient SET name = :name, quantity = :quantity, unit_price = :unit_price WHERE ingredient_id = :ingredient_id");
    $stmt->bindParam(':name', $name);
    $stmt->bindParam(':quantity', $quantity);
    $stmt->bindParam(':unit_price', $unitPrice);
    $stmt->bindParam(':ingredient_id', $ingredientId, PDO::PARAM_INT);


    if ($stmt->execute()) {
        header('Location: ../../inventory-ingredients.php?message=success');
    
    } else {
        header('Location: ../../inventory-ingredients.php?message=failure');
        exit();
    }
    
}
?>