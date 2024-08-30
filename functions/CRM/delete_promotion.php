<?php
include('../index/connection2data.php');

if (isset($_GET['promotion_id'])) {
    $promotion_id = $_GET['promotion_id'];

    try {
        //delete statement
        $stmt = $connection->prepare("DELETE FROM promotions WHERE promotion_id = ?");
        $stmt->execute([$promotion_id]);

         header('Location: ../../CRM-promotions.php?message=success');;
        exit;
    } catch (PDOException $e) {
        error_log($e->getMessage());
         header('Location: ../../CRM-promotions.php?message=promofail');
        exit;
    }
} else {
    exit;
}
?>