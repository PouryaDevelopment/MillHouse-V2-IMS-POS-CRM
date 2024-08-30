<?php
include('../index/connection2data.php');

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['save'])) {
    $productId = $_POST['product_id'] ?? '';
    $name = $_POST['name'] ?? '';
    $price = $_POST['price'] ?? '';
    $categoryId = $_POST['category_id'] ?? '';


    //the update statement
    $stmt = $connection->prepare("UPDATE product SET name = :name, price = :price, category_id = :category_id WHERE product_id = :product_id");
    $stmt->bindParam(':name', $name);
    $stmt->bindParam(':price', $price);
    $stmt->bindParam(':category_id', $categoryId);
    $stmt->bindParam(':product_id', $productId, PDO::PARAM_INT);
    
    // if the update was successful
    if ($stmt->execute() && $stmt->rowCount() > 0) {

        header('Location: ../../inventory.php?message=success');
    } else {
        // if wrong data type used and failed to update:
        header('Location: ../../inventory.php?message=invenfail');
    }
    exit();
}
?>