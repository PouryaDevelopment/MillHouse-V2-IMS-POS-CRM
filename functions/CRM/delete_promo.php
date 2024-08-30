<?php
require_once('../index/connection2data.php');

if (isset($_GET['program_id'])) {
    $program_id = $_GET['program_id'];

    try {

    // the delete statement query
    $stmt = $connection->prepare("DELETE FROM loyalty_program WHERE program_id = ?");
    $stmt->execute([$program_id]);

    // redirects with get request success message
   header('location: ../../CRM-LP.php?message=success');
    exit;
    // because of the way the table is set up, you cant delete loyalty programs currently in use, this PDOexception will be caught so the user will have an alert notifying
    // them that the program is currently in use.
} catch (PDOException $e) {

        error_log($e->getMessage()); 

        // redirects with get request error message
        header('location: ../../CRM-LP.php?message=promofail');
        exit;
    }
} else {
    echo 'Program ID not provided.';
}
?>