<?php
include('../index/connection2data.php');

$sql = "SELECT COUNT(*) as total_users FROM users";

$stmt = $connection->prepare($sql);
$stmt->execute();

$totalUsers = $stmt->fetch(PDO::FETCH_ASSOC);

echo $totalUsers['total_users'];
?>