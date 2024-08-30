<?php 
include('../index/connection2data.php');

header('Content-Type: application/json');

// to fetch work schedules and user names
function getWorkSchedules($connection) {
    $stmt = $connection->prepare("
        SELECT 
            ews.schedule_id, 
            ews.user_id, 
            ews.work_date, 
            ews.start_time, 
            ews.end_time, 
            u.first_name, 
            u.last_name
        FROM employee_work_schedule ews
        JOIN users u ON ews.user_id = u.ID
    ");
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

$schedules = getWorkSchedules($connection);

$calendarEvents = array_map(function ($schedule) {
    $startTime = date('H:i', strtotime($schedule['start_time']));
    $endTime = date('H:i', strtotime($schedule['end_time']));
    $title = "{$schedule['first_name']} {$schedule['last_name']} ({$startTime} - {$endTime})";
    return [
        'title' => $title,
        'start' => $schedule['work_date'] . 'T' . $schedule['start_time'],
        'end' => $schedule['work_date'] . 'T' . $schedule['end_time'],
        
    ];
}, $schedules);

echo json_encode($calendarEvents);

 ?>