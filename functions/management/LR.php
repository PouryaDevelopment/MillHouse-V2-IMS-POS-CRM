<?php
include('functions/index/connection2data.php');

function getAccountRequests($connection) {
    $stmt = $connection->query("SELECT acc_req_id, full_name, phonenumber FROM accreq");
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

$accountRequests = getAccountRequests($connection);
?>
<!DOCTYPE html>
<html lang="en">
<body>
    <h2 class="text-3xl my-2 mb-5">Login Requests</h2>
   <div class="flex justify-center">
        <div class="border-2   bg-gradient-to-r from-amber-300/25  to-amber-500/25  border-amber-300/25 shadow-sm ml-2 mb-8 p-1 rounded-b-lg w-1/2">
        <li class=" text-white text-2xl p-1  text-center shadow-sm justify-center bg-gradient-to-r from-amber-500/10 via-green-100/50 to-amber-500/10 border-b-2 border-amber-300 grid place-items-center" >
            <img class=" fill-current  h-[100px] w-[100px]  mb-2" focusable="false"  src="./UI/security.png">

          </li>
          <h3 class="underline text-3xl p-1">Request List</h3>  
    <table class="w-full ">
        <thead>
            <tr class="bg-gradient-to-r from-amber-200/25 via-amber-100/25 to-amber-200/25 border border-black font-bold ">
                <th class="text-center p-1">Account Request ID</th>
                <th class="text-center p-1">Full Name</th>
                <th class="text-center p-1">Phone Number</th>
                <th class="text-center p-1">Delete</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($accountRequests as $request): ?>
            <tr class="border border-black">
                <td class="text-center bg-amber-200/25 border border-black p-1 font-bold w-[120px]"><?= htmlspecialchars($request['acc_req_id']) ?></td>
                <td class="text-center border border-black p-1"><?= htmlspecialchars($request['full_name']) ?></td>
                <td class="text-center border border-black p-1"><?= htmlspecialchars($request['phonenumber']) ?></td>
                <td class="text-center border border-black p-1">
                    <form method="GET" action="./functions/management/delete_accreq.php">
                    <input type="hidden" name="acc_req_id" value="<?= $request['acc_req_id'] ?>">
                        <div class="flex justify-center">
                            <button class="flex justify-center transition ease-in duration-200 transform hover:-translate-y-1 active:translate-y-0">
                            <input class="mt-0.5" type="submit" name="delete" value="Delete" onclick="return confirm('Are you sure you want to delete this request?');">
                           <img class="h-6 w-6 mx-2 mb-1 "  src="./UI/delete.png"> 
                        </button>
                        </div>
                        
                    </form>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
   </div>
</body>
</html>