<?php
include('../index/connection2data.php');

$firstDayOfTheYear = date('Y-01-01');

// count good feedback from both tables where rating is 3 or above and created this year
$sql = "
    SELECT (
        (SELECT COUNT(*) FROM instore_feedback WHERE instore_rating >= 3 AND created_at >= ?)
        +
        (SELECT COUNT(*) FROM feedback WHERE rating >= 3 AND created_at >= ?)
    ) AS good_feedback_count
";

$stmt = $connection->prepare($sql);
$stmt->execute([$firstDayOfTheYear, $firstDayOfTheYear]);

$goodFeedbackCount = $stmt->fetchColumn();

echo $goodFeedbackCount;
?>