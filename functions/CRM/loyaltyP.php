<?php 

require_once('../index/connection2data.php');

// handles the post request
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['name'], $_POST['description'])) {
    
    $name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_STRING);
    $description = filter_input(INPUT_POST, 'description', FILTER_SANITIZE_STRING);

    // insert the new loyalty program statement
    $insertStmt = $connection->prepare("INSERT INTO loyalty_program (name, description) VALUES (?, ?)");
    $inserted = $insertStmt->execute([$name, $description]);

    
}
header('location: ../../CRM-LP.php?message=success');
 ?>