<?php
include('../index/connection2data.php'); 

if (isset($_GET['feedback_website_id'])) {
    $feedback_website_id = $_GET['feedback_website_id'];

   
        // Prepare the delete statement
        $stmt = $connection->prepare("DELETE FROM feedback WHERE feedback_website_id = ?");
        $stmt->execute([$feedback_website_id]);

        // Redirect back to the feedback list page with a success message
    header('Location: ../../CRM-websitefdbk.php?message=success');
        exit;
    
} else {

    exit;
}
?>