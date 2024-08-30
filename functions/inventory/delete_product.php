<?php
include('../index/connection2data.php');

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['delete'])) {
    $productId = $_POST['product_id'] ?? null;

    if ($productId) {
        try {
            //the delete statement
            $stmt = $connection->prepare("DELETE FROM product WHERE product_id = :productId");
            $stmt->bindParam(':productId', $productId, PDO::PARAM_INT);

            if ($stmt->execute()) {
                header('Location: ../../inventory.php?message=success');
                exit();
            } 
        } catch (PDOException $e) {
            // PDOexception for removing product with quantity
            error_log($e->getMessage());
            header('Location: ../../inventory.php?message=quantityfail');
            exit();
        }
    }
}
?>