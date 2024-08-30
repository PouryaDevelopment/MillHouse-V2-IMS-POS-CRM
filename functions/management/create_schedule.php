<?php
include('../index/connection2data.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $userId = $_POST['user_id'];
    $workDate = $_POST['work_date'];
    $startTime = $_POST['start_time'];
    $endTime = $_POST['end_time'];

    // insert statement
    $stmt = $connection->prepare("INSERT INTO employee_work_schedule (user_id, work_date, start_time, end_time) VALUES (:user_id, :work_date, :start_time, :end_time)");

    // parameters binded
    $stmt->bindParam(':user_id', $userId);
    $stmt->bindParam(':work_date', $workDate);
    $stmt->bindParam(':start_time', $startTime);
    $stmt->bindParam(':end_time', $endTime);

    // execution
if ($stmt->execute()) {
        header('Location: ../../management-schedule.php?message=success');
    } else {
        header('Location: ../../management-addshift.php?message=failure');
    }
}
?>