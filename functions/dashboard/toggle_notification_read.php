<?php

include('../index/connection2data.php');

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['toggle_read'])) {
    $feedbackId = $_POST['feedback_id'];
    $source = $_POST['source'];
    
    // mechanism for the correct table and id column name based on the source
    if ($source === 'feedback') {
        $tableName = 'feedback';
        $idColumnName = 'feedback_website_id';
    } else {
        $tableName = 'instore_feedback';
        $idColumnName = 'feedback_instore_id';
    }

    // statement with the correct column name
    $stmt = $connection->prepare("UPDATE {$tableName} SET notification_read = NOT notification_read WHERE {$idColumnName} = :feedback_id");
    $stmt->bindParam(':feedback_id', $feedbackId, PDO::PARAM_INT);

if ($stmt->execute()) {
        header('Location: ../../dashboard-notifications.php?message=success');
    } else {
           header('Location: ../../dashboard-notifications.php?message=failure');
           exit();
    }
    
}
?>