<?php
require_once('../index/connection2data.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['pl_id'])) {
    $pl_id = $_POST['pl_id'];

    
    $stmt = $connection->prepare("DELETE FROM promolist WHERE pl_id = ?");
    $stmt->execute([$pl_id]);

    header('Location: ../../CRM.php?message=success');
    exit();
} else {

    header('Location: ../../CRM.php');
    exit();
}
?>