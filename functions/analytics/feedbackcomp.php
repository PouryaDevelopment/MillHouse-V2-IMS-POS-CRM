<?php
require_once('../index/connection2data.php');

// SQL statement to count "Good" and "Bad" feedback for each table
$sqlFeedback = "SELECT 
                SUM(CASE WHEN rating >= 3 THEN 1 ELSE 0 END) AS good_feedback,
                SUM(CASE WHEN rating < 3 THEN 1 ELSE 0 END) AS bad_feedback
                FROM feedback";

$sqlInstoreFeedback = "SELECT 
                       SUM(CASE WHEN instore_rating >= 3 THEN 1 ELSE 0 END) AS good_feedback,
                       SUM(CASE WHEN instore_rating < 3 THEN 1 ELSE 0 END) AS bad_feedback
                       FROM instore_feedback";

$stmtFeedback = $connection->prepare($sqlFeedback);
$stmtFeedback->execute();
$resultFeedback = $stmtFeedback->fetch(PDO::FETCH_ASSOC);

$stmtInstoreFeedback = $connection->prepare($sqlInstoreFeedback);
$stmtInstoreFeedback->execute();
$resultInstoreFeedback = $stmtInstoreFeedback->fetch(PDO::FETCH_ASSOC);

$comparisonData = [
    'feedback' => [
        'Good' => $resultFeedback['good_feedback'],
        'Bad' => $resultFeedback['bad_feedback']
    ],
    'instore_feedback' => [
        'Good' => $resultInstoreFeedback['good_feedback'],
        'Bad' => $resultInstoreFeedback['bad_feedback']
    ]
];

header('Content-Type: application/json');
echo json_encode($comparisonData);
?>