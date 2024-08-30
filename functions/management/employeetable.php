<?php
include('functions/index/connection2data.php');


function getUsers($connection) {
    $stmt = $connection->query("SELECT * FROM users");
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

$users = getUsers($connection);
?>


<!DOCTYPE html>
<html lang="en">
<body>
    <h2 class="text-3xl my-2 mb-5">Employees</h2>
    <form method="POST" action="./functions/management/update_user.php">
        <div class="border-2   bg-gradient-to-r from-amber-300/25  to-amber-500/25  border-amber-300/25 shadow-sm ml-2 mb-8 p-1 rounded-b-lg">
        <li class=" text-white text-2xl p-1  text-center shadow-sm justify-center bg-gradient-to-r from-amber-500/10 via-yellow-500 to-amber-500/10 border-b-2 border-amber-300 grid place-items-center" >
            <img class=" fill-current  h-[100px] w-[100px]  mb-2" focusable="false"  src="./UI/employee.png">

          </li>
          <h3 class="underline text-3xl p-1">User List</h3>  
        <table class="w-full ">
            <thead>
                <tr class="bg-gradient-to-r from-amber-200/25 via-amber-100/25 to-amber-200/25 border border-black font-bold ">
                    <th class="text-center p-1">ID</th>
                    <th class="text-center p-1">First Name</th>
                    <th class="text-center p-1">Last Name</th>
                    <th class="text-center p-1">Email</th>
                    <th class="text-center p-1">Password</th>
                    <th class="text-center p-1">Role</th>
                    <th class="text-center p-1">Branch ID</th>
                    <th class="text-center p-1">Edit</th>
                    <th class="text-center p-1">Remove</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($users as $user): ?>
                <tr class="border border-black" id="user-row-<?= $user['ID'] ?>">
                    <td class="text-center bg-amber-200/25 border border-black p-1 font-bold"><?= htmlspecialchars($user['ID']) ?></td>
                    <td class="text-center border border-black p-1">
                        <span class="view-mode-<?= $user['ID'] ?>"><?= htmlspecialchars($user['first_name']) ?></span>
                        <input type="text" class="text-center bg-gradient-to-r from-amber-500/25 via-amber-400/25 to-amber-300/25 border-none  px-2 rounded edit-mode-<?= $user['ID'] ?>" name="first_name[<?= $user['ID'] ?>] " value="<?= htmlspecialchars($user['first_name']) ?>" style="display:none;">
                    </td>
                    <td class="text-center border border-black p-1">
                        <span class="view-mode-<?= $user['ID'] ?>"><?= htmlspecialchars($user['last_name']) ?></span>
                        <input type="text" class="text-center bg-gradient-to-r from-amber-500/25 via-amber-400/25 to-amber-300/25 border-none  px-2 rounded edit-mode-<?= $user['ID'] ?>" name="last_name[<?= $user['ID'] ?>]" value="<?= htmlspecialchars($user['last_name']) ?>" style="display:none;">
                    </td>
                    <td class="text-center border border-black p-1">
                        <span class="view-mode-<?= $user['ID'] ?>"><?= htmlspecialchars($user['email']) ?></span>
                        <input type="email" class="text-center bg-gradient-to-r from-amber-500/25 via-amber-400/25 to-amber-300/25 border-none  px-2 rounded edit-mode-<?= $user['ID'] ?>" name="email[<?= $user['ID'] ?>]" value="<?= htmlspecialchars($user['email']) ?>" style="display:none;">
                    </td>
                    <td class="text-center border border-black p-1">
                        <span class="view-mode-<?= $user['ID'] ?>"><?= htmlspecialchars($user['password']) ?></span>
                        <input type="password" class="text-center bg-gradient-to-r from-amber-500/25 via-amber-400/25 to-amber-300/25 border-none  px-2 rounded edit-mode-<?= $user['ID'] ?>" name="password[<?= $user['ID'] ?>]" placeholder="New Password" style="display:none;">
                    </td>
                    <td class="text-center border border-black p-1">
                        <span class="view-mode-<?= $user['ID'] ?>"><?= htmlspecialchars($user['role']) ?></span>
                        <input type="text" class="text-center bg-gradient-to-r from-amber-500/25 via-amber-400/25 to-amber-300/25 border-none  px-2 rounded edit-mode-<?= $user['ID'] ?>" name="role[<?= $user['ID'] ?>]" value="<?= htmlspecialchars($user['role']) ?>" style="display:none;">
                    </td>
                    <td class="text-center border border-black p-1">
                        <span class="view-mode-<?= $user['ID'] ?>"><?= htmlspecialchars($user['branch_id']) ?></span>
                        <input type="text" class="text-center bg-gradient-to-r from-amber-500/25 via-amber-400/25 to-amber-300/25 border-none  px-2 rounded w-6 edit-mode-<?= $user['ID'] ?>" name="branch_id[<?= $user['ID'] ?>]" value="<?= htmlspecialchars($user['branch_id']) ?>" style="display:none;">
                    </td>
                    <td class="text-center grid place-content-center text-center  p-1">
                        <button class="view-mode-<?= $user['ID'] ?> flex justify-center mt-1 transition ease-in duration-200 transform hover:-translate-y-1 active:translate-y-0" type="button" onclick="enableEdit(<?= $user['ID'] ?>)"><img class="h-6 w-6 mx-2"  src="./UI/edit.png"></button>
                        <button type="submit" class="edit-mode-<?= $user['ID'] ?> flex justify-center mt-1 transition ease-in duration-200 transform hover:-translate-y-1 active:translate-y-0" name="update" value="<?= $user['ID'] ?>" style="display:none;"><img class="h-6 w-6 mx-2 self-center"  src="./UI/save.png"></button>
                        <button type="button" class="edit-mode-<?= $user['ID'] ?> flex justify-center mt-1 transition ease-in duration-200 transform hover:-translate-y-1 active:translate-y-0" onclick="cancelEdit(<?= $user['ID'] ?>)" style="display:none;"><img class="h-6 w-6 mx-2"  src="./UI/cancel.png"></button>
                    </td>
                    <td class="text-center border border-black p-1">
                         <a class="flex justify-center mt-1 transition ease-in duration-200 transform hover:-translate-y-1 active:translate-y-0" href="./functions/management/delete_user.php?id=<?= $user['ID'] ?>" onclick="return confirm('Are you sure you want to delete this user?');"><img class="h-6 w-6 mx-2"  src="./UI/delete.png"></a>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
       </div>
    </form>
    <script>
    function enableEdit(userId) {
        document.querySelectorAll('.view-mode-' + userId).forEach(function(elem) {
            elem.style.display = 'none';
        });
        document.querySelectorAll('.edit-mode-' + userId).forEach(function(elem) {
            elem.style.display = '';
        });
    }

    function cancelEdit(userId) {
        document.querySelectorAll('.view-mode-' + userId).forEach(function(elem) {
            elem.style.display = '';
        });
        document.querySelectorAll('.edit-mode-' + userId).forEach(function(elem) {
            elem.style.display = 'none';
        });
    }
    </script>
</body>
</html>