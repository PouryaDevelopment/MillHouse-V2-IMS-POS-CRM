<?php
include('../index/connection2data.php');

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['save'])) {
    $scheduleId = $_POST['save'];
    $userId = $_POST['user_id'][$scheduleId];
    $workDate = $_POST['work_date'][$scheduleId];
    $startTime = $_POST['start_time'][$scheduleId];
    $endTime = $_POST['end_time'][$scheduleId];

    // update statement
    $stmt = $connection->prepare("UPDATE employee_work_schedule SET user_id = :user_id, work_date = :work_date, start_time = :start_time, end_time = :end_time WHERE schedule_id = :schedule_id");

    // parameters bind
    $stmt->bindParam(':user_id', $userId);
    $stmt->bindParam(':work_date', $workDate);
    $stmt->bindParam(':start_time', $startTime);
    $stmt->bindParam(':end_time', $endTime);
    $stmt->bindParam(':schedule_id', $scheduleId);

    try {
        $stmt->execute();
        header('Location: ../../management-schedule.php?message=success');
    } catch (PDOException $e) {
        // PDOEXception caught when user id doesnt exist when updating.
        header('Location: ../../management-schedule.php?message=failure');
    }
}
?>