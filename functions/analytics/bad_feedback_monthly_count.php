<?php
include('../index/connection2data.php');

$firstDayOfTheMonth = date('Y-m-01');

//count bad feedback from both tables where rating is below 3 and created this month
$sql = "
    SELECT (
        (SELECT COUNT(*) FROM instore_feedback WHERE instore_rating < 3 AND created_at >= ? AND created_at < LAST_DAY(NOW()) + INTERVAL 1 DAY)
        +
        (SELECT COUNT(*) FROM feedback WHERE rating < 3 AND created_at >= ? AND created_at < LAST_DAY(NOW()) + INTERVAL 1 DAY)
    ) AS bad_feedback_count
";

$stmt = $connection->prepare($sql);
$stmt->execute([$firstDayOfTheMonth, $firstDayOfTheMonth]);

$badFeedbackCount = $stmt->fetchColumn();

echo $badFeedbackCount;
?>