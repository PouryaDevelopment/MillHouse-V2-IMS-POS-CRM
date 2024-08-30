<?php
include('../index/connection2data.php');

$sql = "SELECT COUNT(*) as total_requests FROM accreq";

$stmt = $connection->prepare($sql);
$stmt->execute();

$totalRequests = $stmt->fetch(PDO::FETCH_ASSOC);


echo $totalRequests['total_requests'];
?>