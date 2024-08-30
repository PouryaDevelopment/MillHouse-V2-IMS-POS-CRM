<?php

require_once('../index/connection2data.php');

// Array to hold notifications
$notifications = [
    'lowStock' => [],
    'negativeFeedbackInstore' => [],
    'negativeFeedback' => [] // Array for feedback from the "feedback" table
];

// Query for low stock products
$lowStockStmt = $connection->query("SELECT product_id, quantity FROM inventory WHERE status IN ('Low Stock', 'Out of Stock')");
while ($product = $lowStockStmt->fetch(PDO::FETCH_ASSOC)) {
    $notifications['lowStock'][] = "Product ID {$product['product_id']} is low on stock (Quantity: {$product['quantity']})";
}

// Query for negative feedback (instore)
$negativeFeedbackStmt = $connection->query("SELECT product_id, instore_rating, feedback_instore_id FROM instore_feedback WHERE instore_rating < 3 AND notification_read = 0");
while ($feedback = $negativeFeedbackStmt->fetch(PDO::FETCH_ASSOC)) {
    $notifications['negativeFeedbackInstore'][] = [
        'comment' => "Product ID {$feedback['product_id']} received a low instore rating of {$feedback['instore_rating']}",
        'feedbackId' => $feedback['feedback_instore_id'],
        'feedbackType' => 'instore'
    ];
}

// Query for negative feedback (website)
$negativeFeedbackWebStmt = $connection->query("SELECT feedback_website_id, fullname, comment, rating FROM feedback WHERE rating < 3 AND notification_read = 0");
while ($feedbackWeb = $negativeFeedbackWebStmt->fetch(PDO::FETCH_ASSOC)) {
    $notifications['negativeFeedback'][] = [
        'comment' => "Feedback ID {$feedbackWeb['feedback_website_id']} by {$feedbackWeb['fullname']}: \"{$feedbackWeb['comment']}\" (Rating: {$feedbackWeb['rating']})",
        'feedbackId' => $feedbackWeb['feedback_website_id'],
        'feedbackType' => 'website'
    ];
}

header('Content-Type: application/json');
echo json_encode($notifications);
?>