<?php
include('functions/index/connection2data.php');


function getSchedules($connection) {
    $stmt = $connection->query("
        SELECT ews.schedule_id, ews.user_id, ews.work_date, ews.start_time, ews.end_time, u.first_name, u.last_name 
        FROM employee_work_schedule ews
        JOIN users u ON ews.user_id = u.ID
    ");
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

$schedules = getSchedules($connection);
?>
<!DOCTYPE html>
<html lang="en">
<body>
    <h2 class="text-3xl my-2 mb-5">Schedule</h2>
    <form method="POST" action="./functions/management/update_schedule.php">
         <div class="border-2   bg-gradient-to-r from-amber-300/25  to-amber-500/25  border-amber-300/25 shadow-sm ml-2 mb-8 p-1 rounded-b-lg">
        <li class=" text-white text-2xl p-1  text-center shadow-sm justify-center bg-gradient-to-r from-amber-500/10 via-yellow-500 to-amber-500/10 border-b-2 border-amber-300 grid place-items-center" >
            <img class=" fill-current  h-[100px] w-[100px]  mb-2" focusable="false"  src="./UI/calendar.png">

          </li>
          <h3 class="underline text-3xl p-1">Employee Work Schedule</h3>  
        <table class="w-full ">
            <thead>
                <tr  class="bg-gradient-to-r from-amber-200/25 via-amber-100/25 to-amber-200/25 border border-black font-bold ">
                    <th class="text-center p-1">Schedule ID</th>
                    <th class="text-center p-1">Employee Name</th>
                    <th class="text-center p-1">User ID</th>
                    <th class="text-center p-1">Work Date</th>
                    <th class="text-center p-1">Start Time</th>
                    <th class="text-center p-1">End Time</th>
                    <th class="text-center p-1">Edit</th>
                    <th class="text-center p-1">Remove</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($schedules as $schedule): ?>
                <tr class="border border-black">
                    <td class="text-center bg-amber-200/25 border border-black p-1 font-bold w-12"><?= htmlspecialchars($schedule['schedule_id']) ?></td>
                    <td class="text-center border border-black p-1">
            <span class="view-mode-<?= $schedule['schedule_id'] ?>">
                <?= htmlspecialchars($schedule['first_name']) . ' ' . htmlspecialchars($schedule['last_name']) ?>
            </span>
            <input type="hidden" class="edit-mode-<?= $schedule['schedule_id'] ?>" name="user_id[<?= $schedule['schedule_id'] ?>]" value="<?= htmlspecialchars($schedule['user_id']) ?>">
            <input type="text" class="text-center bg-gradient-to-r from-amber-500/25 via-amber-400/25 to-amber-300/25 border-none  px-2 rounded edit-mode-<?= $schedule['schedule_id'] ?>" name="user_name[<?= $schedule['schedule_id'] ?>]" value="<?= htmlspecialchars($schedule['first_name']) . ' ' . htmlspecialchars($schedule['last_name']) ?>" style="display:none;" disabled>
        </td>
                    <td class="text-center border border-black p-1 w-12">
                        <span class="view-mode-<?= $schedule['schedule_id'] ?>"><?= htmlspecialchars($schedule['user_id']) ?></span>
                        <input type="number" class="w-12 text-center bg-gradient-to-r from-amber-500/25 via-amber-400/25 to-amber-300/25 border-none  px-2 rounded edit-mode-<?= $schedule['schedule_id'] ?>" name="user_id[<?= $schedule['schedule_id'] ?>]" value="<?= htmlspecialchars($schedule['user_id']) ?>" style="display:none;">
                    </td>
                    <td class="text-center border border-black p-1">
                        <span class="view-mode-<?= $schedule['schedule_id'] ?>"><?= htmlspecialchars($schedule['work_date']) ?></span>
                        <input type="date" class="text-center bg-gradient-to-r from-amber-500/25 via-amber-400/25 to-amber-300/25 border-none  px-2 rounded edit-mode-<?= $schedule['schedule_id'] ?>" name="work_date[<?= $schedule['schedule_id'] ?>]" value="<?= htmlspecialchars($schedule['work_date']) ?>" style="display:none;">
                    </td>
                    <td class="text-center border border-black p-1">
                        <span class="view-mode-<?= $schedule['schedule_id'] ?>"><?= htmlspecialchars($schedule['start_time']) ?></span>
                        <input type="time" class="text-center bg-gradient-to-r from-amber-500/25 via-amber-400/25 to-amber-300/25 border-none  px-2 rounded edit-mode-<?= $schedule['schedule_id'] ?>" name="start_time[<?= $schedule['schedule_id'] ?>]" value="<?= htmlspecialchars($schedule['start_time']) ?>" style="display:none;">
                    </td>
                    <td class="text-center border border-black p-1">
                        <span class="view-mode-<?= $schedule['schedule_id'] ?>"><?= htmlspecialchars($schedule['end_time']) ?></span>
                        <input type="time" class="text-center bg-gradient-to-r from-amber-500/25 via-amber-400/25 to-amber-300/25 border-none  px-2 rounded edit-mode-<?= $schedule['schedule_id'] ?>" name="end_time[<?= $schedule['schedule_id'] ?>]" value="<?= htmlspecialchars($schedule['end_time']) ?>" style="display:none;">
                    </td>
                    <td class="text-center grid place-content-center text-center  p-1">
                        <button class="view-mode-<?= $schedule['schedule_id'] ?> transition ease-in duration-200 transform hover:-translate-y-1 active:translate-y-0" type="button" onclick="enableEdit(<?= $schedule['schedule_id'] ?>)"><img class="h-6 w-6 mx-2"  src="./UI/edit.png"></button>
                        <button type="submit" class="edit-mode-<?= $schedule['schedule_id'] ?> flex justify-center mt-1 transition ease-in duration-200 transform hover:-translate-y-1 active:translate-y-0" name="save" value="<?= $schedule['schedule_id'] ?>" style="display:none;"><img class="h-6 w-6 mx-2 self-center"  src="./UI/save.png"></button>
                        <button type="button" class="edit-mode-<?= $schedule['schedule_id'] ?> flex justify-center mt-1 transition ease-in duration-200 transform hover:-translate-y-1 active:translate-y-0" onclick="disableEdit(<?= $schedule['schedule_id'] ?>)" style="display:none;"><img class="h-6 w-6 mx-2"  src="./UI/cancel.png"></button>
                        
                    </td>
                    <td class="text-center border border-black ">
                       <a class="flex justify-center mt-1 transition ease-in duration-200 transform hover:-translate-y-1 active:translate-y-0" type="button" onclick="location.href='./functions/management/delete_schedule.php?schedule_id=<?= $schedule['schedule_id'] ?>'"><img class="h-6 w-6 mx-2 mb-1"  src="./UI/delete.png"></a> 
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
</div>
    </form>
    <script>
    function enableEdit(scheduleId) {
        document.querySelectorAll('.view-mode-' + scheduleId).forEach(function(elem) {
            elem.style.display = 'none';
        });
        document.querySelectorAll('.edit-mode-' + scheduleId).forEach(function(elem) {
            elem.style.display = 'inline';
        });
    }

    function disableEdit(scheduleId) {
        document.querySelectorAll('.view-mode-' + scheduleId).forEach(function(elem) {
            elem.style.display = 'inline';
        });
        document.querySelectorAll('.edit-mode-' + scheduleId).forEach(function(elem) {
            elem.style.display = 'none';
        });
    }
    </script>
</body>
</html>