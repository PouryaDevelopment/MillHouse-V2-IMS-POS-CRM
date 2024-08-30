<?php 
include('functions/index/connection2data.php');

function getUserOptions($connection) {
    $stmt = $connection->query("SELECT ID, first_name, last_name FROM users ORDER BY first_name, last_name");
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

$userOptions = getUserOptions($connection);
 ?>
 <!DOCTYPE html>
<html lang="en">
<body>
    <h2 class="text-3xl py-3">Add Shift</h2>
     <div class="flex justify-center mb-3">
        <img class="h-[200px] w-[200px]  "  src="./UI/schedule.png">
    </div>
    <div class="flex justify-center content-center h-[400px] items-center ">
    <form method="POST" action="./functions/management/create_schedule.php">
        <label class="text-2xl" for="user_id">User:</label>
        <select class="text-2xl text-center bg-gradient-to-r from-amber-500/25 via-amber-400/25 to-amber-300/25 border-none   rounded " id="user_id" name="user_id" required>
            <option value="">Select a user</option>
            <?php foreach ($userOptions as $user): ?>
                <option value="<?= htmlspecialchars($user['ID']) ?>">
                    <?= htmlspecialchars($user['first_name']) . ' ' . htmlspecialchars($user['last_name']) ?>
                </option>
            <?php endforeach; ?>
        </select><br><br>
        
        <label class="text-2xl" for="work_date">Work Date:</label>
        <input class="text-center bg-gradient-to-r from-amber-500/25 via-amber-400/25 to-amber-300/25 border-none   rounded text-2xl" type="date" id="work_date" name="work_date" required><br><br>
        
        <label class="text-2xl" for="start_time">Start Time:</label>
        <input class="text-center bg-gradient-to-r from-amber-500/25 via-amber-400/25 to-amber-300/25 border-none   rounded text-2xl" type="time" id="start_time" name="start_time" required><br><br>
        
        <label class="text-2xl" for="end_time">End Time:</label>
        <input class="text-center bg-gradient-to-r from-amber-500/25 via-amber-400/25 to-amber-300/25 border-none   rounded text-2xl" type="time" id="end_time" name="end_time" required><br><br>
        
       
       <button class="flex justify-center transition ease-in duration-200 transform hover:-translate-y-1 active:translate-y-0 ml-7">
    <input class="font-bold text-3xl center  font-extrabold "  style="  font-family: 'Bebas Neue';" type="submit" value="create Schedule">
    <img class="h-7 w-7 ml-3 mt-0.5 "  src="./UI/calendar.png">
  </button>
    </form>
   </div>
</body>
</html>