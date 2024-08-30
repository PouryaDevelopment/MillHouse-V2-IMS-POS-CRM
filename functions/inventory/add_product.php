<?php

include('../index/connection2data.php');
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $price = $_POST['price'];
    $categoryId = $_POST['category_id'];


    // the insert statement
    $stmt = $connection->prepare("INSERT INTO product (name, price, category_id) VALUES (:name, :price, :category_id)");
    $stmt->bindParam(':name', $name);
    $stmt->bindParam(':price', $price);
    $stmt->bindParam(':category_id', $categoryId);

if ($stmt->execute()) {
        header('Location: ../../inventory-ANP.php?message=success');
    }else  {
        header('Location: ../../inventory-ANP.php?message=failure');
         exit();
    }
   
}
?>