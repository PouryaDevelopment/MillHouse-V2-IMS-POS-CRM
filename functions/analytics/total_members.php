<?php
require_once('../index/connection2data.php');

// a SQL statement to count the number of entries in the promolist table
$sql = "SELECT COUNT(*) as total_members FROM promolist";

$stmt = $connection->prepare($sql);
$stmt->execute();
$totalMembers = $stmt->fetch(PDO::FETCH_ASSOC);
echo $totalMembers['total_members'];
?>