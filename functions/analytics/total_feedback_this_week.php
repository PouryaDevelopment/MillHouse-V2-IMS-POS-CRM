<?php
require_once('../index/connection2data.php');

$startOfWeek = date('Y-m-d', strtotime('monday this week'));
$endOfWeek = date('Y-m-d', strtotime('sunday this week'));

// an SQL  statement to get the total feedback count for the current week from both tables
$sql = "
    SELECT (
        (SELECT COUNT(*) FROM instore_feedback WHERE created_at BETWEEN ? AND ?)
        +
        (SELECT COUNT(*) FROM feedback WHERE created_at BETWEEN ? AND ?)
    ) AS total_feedback_count
";

$stmt = $connection->prepare($sql);
$stmt->execute([$startOfWeek, $endOfWeek, $startOfWeek, $endOfWeek]);
$totalFeedbackCount = $stmt->fetchColumn();

echo $totalFeedbackCount;
?>