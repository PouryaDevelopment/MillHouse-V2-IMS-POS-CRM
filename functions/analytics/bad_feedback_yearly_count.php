<?php
include('../index/connection2data.php');

$firstDayOfTheYear = date('Y-01-01');

// statement to count bad feedback from both tables where rating is below 3 and created this year
$sql = "
    SELECT (
        (SELECT COUNT(*) FROM instore_feedback WHERE instore_rating < 3 AND created_at >= ?)
        +
        (SELECT COUNT(*) FROM feedback WHERE rating < 3 AND created_at >= ?)
    ) AS bad_feedback_count
";

$stmt = $connection->prepare($sql);
$stmt->execute([$firstDayOfTheYear, $firstDayOfTheYear]);

$badFeedbackCount = $stmt->fetchColumn();

echo $badFeedbackCount;
?>