<?php
include('../index/connection2data.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $product_id = $_POST['product_id'] ?? '';
    $quantity = $_POST['quantity'] ?? '';


    // the insert statement
    $stmt = $connection->prepare("INSERT INTO inventory (product_id, quantity) VALUES (:product_id, :quantity)");
    $stmt->bindParam(':product_id', $product_id);
    $stmt->bindParam(':quantity', $quantity);

    try {
        if ($stmt->execute()) {
            
           header('Location: ../../inventory-AQL.php?message=success');
        } else {
            header('Location: ../../inventory-AQL.php?message=add_failure');
        }
    } catch (PDOException $e) {
        header('Location: ../../inventory-AQL.php?message=existfailure');
    }
    exit();
}
?>