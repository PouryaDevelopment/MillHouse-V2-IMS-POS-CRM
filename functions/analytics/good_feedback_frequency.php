<?php
include('../index/connection2data.php');

// Get the first and last day of the current month
$firstDayOfTheMonth = date('Y-m-01');
$lastDayOfTheMonth = date('Y-m-t');

// statement to count the number of good feedbacks for each day in the current month from both tables
$sql = "
    (SELECT DATE(created_at) as feedback_date, COUNT(*) as good_feedback_count
     FROM instore_feedback
     WHERE instore_rating >= 3 AND created_at BETWEEN ? AND ?
     GROUP BY DATE(created_at))
    UNION ALL
    (SELECT DATE(created_at) as feedback_date, COUNT(*) as good_feedback_count
     FROM feedback
     WHERE rating >= 3 AND created_at BETWEEN ? AND ?
     GROUP BY DATE(created_at))
    ORDER BY feedback_date";

$stmt = $connection->prepare($sql);
$stmt->execute([$firstDayOfTheMonth, $lastDayOfTheMonth, $firstDayOfTheMonth, $lastDayOfTheMonth]);

$feedbackData = $stmt->fetchAll(PDO::FETCH_ASSOC);
$dates = array();
$counts = array();

foreach ($feedbackData as $entry) {
    $date = $entry['feedback_date'];
    $count = $entry['good_feedback_count'];

    if (!isset($dates[$date])) {
        $dates[$date] = $date;
        $counts[$date] = 0;
    }
    $counts[$date] += $count;
}

// preps the data for chart js
$finalData = array(
    'labels' => array_keys($dates),
    'data' => array_values($counts)
);

echo json_encode($finalData);
?>