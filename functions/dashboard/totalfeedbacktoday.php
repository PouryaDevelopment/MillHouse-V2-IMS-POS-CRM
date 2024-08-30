<?php
include('../index/connection2data.php'); 

$currentDate = date('Y-m-d');

// an SQL to count the number of feedback entries for today from both tables for todays current day
$sqlFeedback = "SELECT COUNT(*) as total FROM feedback WHERE DATE(created_at) = ?";
$sqlInstoreFeedback = "SELECT COUNT(*) as total FROM instore_feedback WHERE DATE(created_at) = ?";

$stmtFeedback = $connection->prepare($sqlFeedback);
$stmtFeedback->execute([$currentDate]);
$resultFeedback = $stmtFeedback->fetch(PDO::FETCH_ASSOC);

$stmtInstoreFeedback = $connection->prepare($sqlInstoreFeedback);
$stmtInstoreFeedback->execute([$currentDate]);
$resultInstoreFeedback = $stmtInstoreFeedback->fetch(PDO::FETCH_ASSOC);

// adds  the counts from both tables
$totalFeedbackToday = $resultFeedback['total'] + $resultInstoreFeedback['total'];

header('Content-Type: application/json');
echo json_encode(['total_feedback_today' => $totalFeedbackToday]);
?>