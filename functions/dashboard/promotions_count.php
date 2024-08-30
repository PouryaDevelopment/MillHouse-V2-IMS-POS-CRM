<?php
include('../index/connection2data.php'); 

// an SQL statement to count the number of entries in the promotions table
$sql = "SELECT COUNT(*) as total FROM promotions";

$stmt = $connection->prepare($sql);
$stmt->execute();

$result = $stmt->fetch(PDO::FETCH_ASSOC);

header('Content-Type: application/json');
echo json_encode($result);
?>