<?php
require_once('../index/connection2data.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $product_id = filter_input(INPUT_POST, 'product_id', FILTER_SANITIZE_NUMBER_INT);
    $comment = filter_input(INPUT_POST, 'comment', FILTER_SANITIZE_STRING);
    $rating = filter_input(INPUT_POST, 'rating', FILTER_SANITIZE_NUMBER_INT);


    if (!$product_id || !$comment || !$rating) {

        exit('error: please fill in all the fields correctly.');
    }

    // insert query into the instore_feedback table
    $stmt = $connection->prepare("INSERT INTO instore_feedback (product_id, instore_comment, instore_rating) VALUES (?, ?, ?)");


    if ($stmt->execute([$product_id, $comment, $rating])) {

        header('Location: ../../POS-leaveFdbk.php?message=success'); 
        exit();
    } else {

        exit('error: an occurred while submitting your feedback.');
    }
} else {

    exit('error: invalid request method.');
}
?>