<?php
include('../index/connection2data.php');

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['inventory_id'])) {
    $inventoryId = $_POST['inventory_id'] ?? '';
    $quantity = $_POST['quantity'] ?? '';

   

    // the update statement
    $stmt = $connection->prepare("UPDATE inventory SET quantity = :quantity WHERE inventory_id = :inventory_id");
    $stmt->bindParam(':quantity', $quantity);
    $stmt->bindParam(':inventory_id', $inventoryId, PDO::PARAM_INT);
    
    
    
        if ($stmt->execute()) {
           header('Location: ../../inventory-quantity.php?message=success');
        } else {
           header('Location: ../../inventory-quantity.php?message=failure');
              exit();
        }
   
  
}
?>