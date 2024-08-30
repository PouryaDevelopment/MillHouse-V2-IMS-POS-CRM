<?php
include('../index/connection2data.php');

// define the current date in the same format as my 'work_date' column
$today = date('Y-m-d');

// SQL to count the number of shifts for today
$sql = "SELECT COUNT(*) as shift_count FROM employee_work_schedule WHERE work_date = ?";

// prepares the statement and executes
$stmt = $connection->prepare($sql);
$stmt->execute([$today]);

// fetch the data
$shiftData = $stmt->fetch(PDO::FETCH_ASSOC);

// echo the shift count
echo $shiftData['shift_count'];
?>