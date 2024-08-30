<?php
require_once('../index/connection2data.php');

if (isset($_POST['edit_promotion'])) {
    $promotion_id = $_POST['promotion_id'];
    $name = $_POST['name'];
    $discount = $_POST['discount'];

   
        $stmt = $connection->prepare("UPDATE promotions SET name = ?, discount = ? WHERE promotion_id = ?");
        $stmt->execute([$name, $discount, $promotion_id]);

        
         header('Location: ../../CRM-promotions.php?message=success');
        exit;
    
} else {
    exit;
}
?>