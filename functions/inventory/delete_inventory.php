<?php
include('../index/connection2data.php');

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['delete'])) {
    $inventoryId = $_POST['inventory_id'] ?? null;

    if ($inventoryId) {
       
            //the delete statement
            $stmt = $connection->prepare("DELETE FROM inventory WHERE inventory_id = :inventory_id");
            $stmt->bindParam(':inventory_id', $inventoryId, PDO::PARAM_INT);
            
            
            if ($stmt->execute()) {
                header('Location: ../../inventory-quantity.php?message=success');
            } else {
                header('Location: ../../inventory-quantity.php?message=failure');
                 exit();
            }
   
}
}