<?php
require_once('../index/connection2data.php');

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $stmt = $connection->prepare("DELETE FROM user_loyalty_program WHERE id = ?");
    $stmt->execute([$id]);

header('location: ../../CRM-LP.php?message=success');
    exit();
}
?>