<?php
include('../index/connection2data.php');
$firstDayOfTheMonth = date('Y-m-01');

// count good feedback from both tables where rating is 3 or above and created this month
$sql = "
    SELECT (
        (SELECT COUNT(*) FROM instore_feedback WHERE instore_rating >= 3 AND created_at >= ?)
        +
        (SELECT COUNT(*) FROM feedback WHERE rating >= 3 AND created_at >= ?)
    ) AS good_feedback_count
";

$stmt = $connection->prepare($sql);
$stmt->execute([$firstDayOfTheMonth, $firstDayOfTheMonth]);
$goodFeedbackCount = $stmt->fetchColumn();


echo $goodFeedbackCount;
?>