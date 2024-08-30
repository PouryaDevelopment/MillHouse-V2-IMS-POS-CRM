<?php
include('../index/connection2data.php'); 

$currentDate = date('Y-m-d');

// an SQL statement to count the number of feedback entries for today
$sql = "SELECT COUNT(*) as total FROM feedback WHERE DATE(created_at) = ?";
$stmt = $connection->prepare($sql);
$stmt->execute([$currentDate]);

$result = $stmt->fetch(PDO::FETCH_ASSOC);

header('Content-Type: application/json');
echo json_encode($result);
?>