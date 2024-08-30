<?php
require_once('../index/connection2data.php');

// an SQL statement to count "Good" and "Bad" feedback from both tables
$sql = "SELECT
            (SELECT COUNT(*) FROM feedback WHERE rating >= 3) +
            (SELECT COUNT(*) FROM instore_feedback WHERE instore_rating >= 3) AS good_feedback,
            (SELECT COUNT(*) FROM feedback WHERE rating < 3) +
            (SELECT COUNT(*) FROM instore_feedback WHERE instore_rating < 3) AS bad_feedback";

$stmt = $connection->prepare($sql);
$stmt->execute();

$result = $stmt->fetch(PDO::FETCH_ASSOC);

$feedbackData = [
    'Good' => $result['good_feedback'],
    'Bad' => $result['bad_feedback']
];

header('Content-Type: application/json');
echo json_encode($feedbackData);
?>