<?php
include('../index/connection2data.php'); 

$currentDate = date('Y-m-d'); 

// an SQL to count the good and bad feedback for each table for the current day
$sqlFeedback = "SELECT 
                SUM(CASE WHEN rating >= 3 THEN 1 ELSE 0 END) AS good_feedback,
                SUM(CASE WHEN rating < 3 THEN 1 ELSE 0 END) AS bad_feedback
                FROM feedback
                WHERE DATE(created_at) = ?";

$sqlInstoreFeedback = "SELECT 
                       SUM(CASE WHEN instore_rating >= 3 THEN 1 ELSE 0 END) AS good_feedback,
                       SUM(CASE WHEN instore_rating < 3 THEN 1 ELSE 0 END) AS bad_feedback
                       FROM instore_feedback
                       WHERE DATE(created_at) = ?";

$stmtFeedback = $connection->prepare($sqlFeedback);
$stmtFeedback->execute([$currentDate]);
$resultFeedback = $stmtFeedback->fetch(PDO::FETCH_ASSOC);

$stmtInstoreFeedback = $connection->prepare($sqlInstoreFeedback);
$stmtInstoreFeedback->execute([$currentDate]);
$resultInstoreFeedback = $stmtInstoreFeedback->fetch(PDO::FETCH_ASSOC);

$comparisonData = [
    'feedback' => [
        'Good' => (int)($resultFeedback['good_feedback'] ?? 0), // null coalescing to default to 0
        'Bad' => (int)($resultFeedback['bad_feedback'] ?? 0)
    ],
    'instore_feedback' => [
        'Good' => (int)($resultInstoreFeedback['good_feedback'] ?? 0),
        'Bad' => (int)($resultInstoreFeedback['bad_feedback'] ?? 0)
    ]
];

header('Content-Type: application/json');
echo json_encode($comparisonData);
?>