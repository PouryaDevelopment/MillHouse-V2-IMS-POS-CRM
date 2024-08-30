<?php
include('../index/connection2data.php'); 

if (isset($_GET['feedback_instore_id'])) {
    $feedback_instore_id = $_GET['feedback_instore_id'];

    // delete statement
    $stmt = $connection->prepare("DELETE FROM instore_feedback WHERE feedback_instore_id = ?");
    $stmt->execute([$feedback_instore_id]);

   
    header('Location: ../../CRM-instorefdbk.php?message=success');
    exit;
} else {

    exit;
}
?>