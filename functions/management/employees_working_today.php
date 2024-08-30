<?php
include('../index/connection2data.php');

// gets the current date in the same format as my 'work_date' column inside the employee_work_schedule table
$today = date('Y-m-d');

// SQL statement to get the first and last names of users working today from both tables (users,employee_work_schedule)
$sql = "SELECT u.first_name, u.last_name
        FROM users u
        INNER JOIN employee_work_schedule ews ON u.ID = ews.user_id
        WHERE ews.work_date = ?";

$stmt = $connection->prepare($sql);
$stmt->execute([$today]);

// will fetch the data
$employeesWorkingToday = $stmt->fetchAll(PDO::FETCH_ASSOC);

// echo data the data as JSON
header('Content-Type: application/json');
echo json_encode($employeesWorkingToday);
?>