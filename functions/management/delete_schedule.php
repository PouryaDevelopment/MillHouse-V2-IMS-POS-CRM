<?php
include('../index/connection2data.php');

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['schedule_id'])) {
    $scheduleId = $_GET['schedule_id'];

    // delete statement
    $stmt = $connection->prepare("DELETE FROM employee_work_schedule WHERE schedule_id = :schedule_id");

    // parameter binded
    $stmt->bindParam(':schedule_id', $scheduleId);

   if ($stmt->execute()) {
        header('Location: ../../management-schedule.php?message=success');
    } else {
        header('Location: ../../management-schedule.php?message=failure');
    }
}
?>