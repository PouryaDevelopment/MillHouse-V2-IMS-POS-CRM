<?php
include('../index/connection2data.php');

// statement to get the count of users for each role
$sql = "SELECT role, COUNT(*) as role_count FROM users GROUP BY role";

$result = $connection->query($sql);

// fetchs the data
$rolesData = [];
while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
    $rolesData[] = $row;
}

// echos the data a JSON
header('Content-Type: application/json');
echo json_encode($rolesData);
?>