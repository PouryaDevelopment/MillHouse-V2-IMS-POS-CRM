<?php

include('../index/connection2data.php');

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['ingredient_id'])) {
    $ingredientId = $_POST['ingredient_id'];

    // the delete statement
    $stmt = $connection->prepare("DELETE FROM ingredient WHERE ingredient_id = :ingredient_id");
    $stmt->bindParam(':ingredient_id', $ingredientId, PDO::PARAM_INT);

   
if ($stmt->execute()) {
         header('Location: ../../inventory-ingredients.php?message=success');
    } else  {
       header('Location: ../../inventory-ingredients.php?message=failure');
        exit();
    }
    
}
?>