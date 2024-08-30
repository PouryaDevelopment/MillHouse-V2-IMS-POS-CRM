<?php
require_once('../index/connection2data.php');

// handling the form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['pl_id'], $_POST['program_id'])) {
   
    $pl_id = filter_var($_POST['pl_id'], FILTER_SANITIZE_NUMBER_INT);
    $program_id = filter_var($_POST['program_id'], FILTER_SANITIZE_NUMBER_INT);

    // insert into the user program table statement
    $stmt = $connection->prepare("INSERT INTO user_loyalty_program (pl_id, program_id) VALUES (?, ?)");
    $success = $stmt->execute([$pl_id, $program_id]);

    
} else {
    echo "Invalid request.";
}

header('location: ../../CRM-LP.php?message=success');
exit();
?>