<<?php 
include('../index/connection2data.php');

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['name'], $_POST['discount'])) {
   
    $name = $_POST['name'];
    $discount = $_POST['discount'];

  
        // insert statement
        $stmt = $connection->prepare("INSERT INTO promotions (name, discount) VALUES (?, ?)");
        $stmt->execute([$name, $discount]);


        header('Location: ../../CRM-promotions.php?message=success');
        exit;
  
} else {

    exit;
}
?>