<?php
require_once('functions/index/connection2data.php');

// Fetch all user loyalty program entries
$selectStmt = $connection->prepare("SELECT program_id, name, description FROM loyalty_program");
$selectStmt->execute();
$loyaltyPrograms = $selectStmt->fetchAll(PDO::FETCH_ASSOC);
?>
<?php 
// Fetch all promo list entries from the database
$stmtPromolist = $connection->prepare("SELECT pl_id, full_name FROM promolist");
$stmtPromolist->execute();
$promoListEntries = $stmtPromolist->fetchAll(PDO::FETCH_ASSOC);


 ?>
 <?php 
// Fetch all user loyalty program entries
$stmt = $connection->prepare("SELECT ulp.id AS ulp_id, pl.pl_id, pl.full_name, lp.program_id, lp.name AS program_name, ulp.assigned_date FROM user_loyalty_program ulp JOIN promolist pl ON ulp.pl_id = pl.pl_id JOIN loyalty_program lp ON ulp.program_id = lp.program_id");
$stmt->execute();
$userLoyaltyPrograms = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
  
<!DOCTYPE html>
<html lang="en">
<body >

                                    <!-- title and layout -->
<h2 class="text-3xl py-3 mb-1">Loyalty Program</h2>
<div class="grid grid-cols-2 h-1/2">
   
                                    <!-- Add new program section-->
<div class="justify-self-center w-full text-center flex justify-center">
    
<form class="" action="./functions/CRM/LoyaltyP.php" method="post">
    <div class="flex justify-center"> 
        <h3 class="text-2xl">Add New Program  
            <div class="flex justify-center">
               <img class="self-center h-[70px] w-[70px] mt-2 mb-2 " focusable="false"  src="./UI/addppro.png"> 
            </div></h3> </div>
    
    <label for="name">Name:</label><br>
    <input class="bg-gradient-to-r from-amber-500/25 via-amber-400/25 to-amber-300/25 border-none flex-grow px-2 border rounded text-center" type="text" id="name" name="name" required><br>

    <label for="description">Description:</label><br>
    <textarea class="w-[400px] h-[100px] bg-gradient-to-r from-amber-500/25 via-amber-400/25 to-amber-300/25 border-none flex-grow h-20 px-2 border rounded text-center" id="description" name="description" required></textarea><br>
<div class="flex justify-center">
   <button class="flex justify-center content-center border-2 rounded-full bg-gradient-to-r from-amber-300/25 to-amber-500/25 border-b-2 border-amber-300/25 shadow-sm ml-2 mb-2 p-1 mx-3 transition ease-in duration-200 transform hover:-translate-y-1 active:translate-y-0" type="submit">Add Program <img class=" h-6 w-6   ml-1 " focusable="false"  src="./UI/ppromo.png"></button> 
</div>
    
</form>
</div>
                                    <!--program table section-->
 <div class="justify-self-center w-3/4 overflow-x-auto h-[400px]">
        <div class="border-2   bg-gradient-to-r from-amber-300/25  to-amber-500/25  border-amber-300/25 shadow-sm ml-2 mb-8 p-1 rounded-b-lg">
        <li class=" text-white text-2xl p-1  text-center shadow-sm justify-center bg-gradient-to-r from-amber-500/10 via-yellow-amber/50 to-amber-500/10 border-b-2 border-amber-300 grid place-items-center" >
            <img class=" fill-current  h-[100px] w-[100px]  mb-2" focusable="false"  src="./UI/ppromo.png">

          </li>
          <h3 class="underline text-3xl p-1">Programs</h3>  
        <table class="w-full">
    <thead>
        <tr class="bg-gradient-to-r from-amber-200/25 via-amber-100/25 to-amber-200/25 border border-black font-bold">
            <th class="text-center p-1">Program ID</th>
            <th class="text-center p-1">Name</th>
            <th class="text-center p-1">Description</th>
            <th class="text-center p-1">Actions</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($loyaltyPrograms as $program): ?>
        <tr class="border border-black">
            <td class="text-center bg-amber-200/25 border border-black p-1 font-bold"><?php echo htmlspecialchars($program['program_id']); ?></td>
            <td class="text-center  border border-black p-1 font-bold"><?php echo htmlspecialchars($program['name']); ?></td>
            <td class="text-center  border border-black p-1 font-bold"><?php echo htmlspecialchars($program['description']); ?></td>
            <td class="text-center border border-black p-1 font-bold">
                <a class="flex justify-center transition ease-in duration-200 transform hover:-translate-y-1 active:translate-y-0" href="./functions/CRM/delete_promo.php?program_id=<?php echo $program['program_id']; ?>" onclick="return confirm('Are you sure you want to delete this program?');">Delete<img class="h-5 w-5 mx-2"  src="./UI/delete.png"></a>
            </td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>
    </div>
    </div>
</div>
                            <!-- layout 2nd half-->
<div class="grid grid-cols-2 h-[340px]">
                                            <!-- asign user section -->
    <div class="justify-self-center flex ">
        <form class=" h-full p-2 content-center" action="./functions/CRM/assign_loyalty.php" method="post">
            <div class="flex justify-center">
                <img class="self-center h-[70px] w-[70px] content-center   mt-2 mb-4" focusable="false"  src="./UI/useradd.png">
            </div>
            
    <label for="pl_id">Select User:</label>
    <select class="text-center " id="pl_id" name="pl_id" required>
        <!-- Options fetched from promolist-->
        <?php foreach ($promoListEntries as $entry): ?>
        <option value="<?php echo htmlspecialchars($entry['pl_id']); ?>">
            <?php echo htmlspecialchars($entry['full_name']); ?>
        </option>
        <?php endforeach; ?>
    </select> <br><br>

    <label for="program_id">Select Loyalty Program:</label>
    <select class="text-center" id="program_id" name="program_id" required>
        <!-- Options fetched from loyalty_program -->
        <?php foreach ($loyaltyPrograms as $program): ?>
        <option value="<?php echo htmlspecialchars($program['program_id']); ?>">
            <?php echo htmlspecialchars($program['name']); ?>
        </option>
        <?php endforeach; ?>
    </select><br><br>
    <div class="flex justify-center">
            <button class="flex justify-center content-center border-2 rounded-full bg-gradient-to-r from-amber-300/25 to-amber-500/25 border-b-2 border-amber-300/25 shadow-sm ml-2 mb-2 p-1 mx-3 transition ease-in duration-200 transform hover:-translate-y-1 active:translate-y-0" type="submit">Assign Program <img class=" h-6 w-6   ml-1 " focusable="false"  src="./UI/PL.png"></button>
    </div>
</form>
    </div>
    
                                    <!-- LP user list table -->
 
<div class="justify-self-center w-3/4 overflow-x-auto ">
    <div >
        <div class="border-2   bg-gradient-to-r from-amber-300/25  to-amber-500/25  border-amber-300/25 shadow-sm ml-2 mb-8 p-1 rounded-b-lg">
        <li class=" text-white text-2xl p-1  text-center shadow-sm justify-center bg-gradient-to-r from-amber-500/10 via-yellow-amber/50 to-amber-500/10 border-b-2 border-amber-300 grid place-items-center" >
            <img class=" fill-current  h-[100px] w-[100px]  mb-2" focusable="false"  src="./UI/PL.png">

          </li>
          <h3 class="underline text-3xl p-1">LP User List</h3>
     <table class="w-full">
        <thead>
            <tr class="bg-gradient-to-r from-amber-200/25 via-amber-100/25 to-amber-200/25 border border-black font-bold">
                <th class="text-center p-1">ID</th>
                <th class="text-center p-1">User Name</th>
                <th class="text-center p-1">Loyalty Program</th>
                <th class="text-center p-1">Assigned Date</th>
                <th class="text-center p-1">Edit</th>
                <th class="text-center p-1">Delete</th>
            </tr>
        </thead>
<tbody>
    <?php foreach ($userLoyaltyPrograms as $program): ?>
        <tr class="border border-black" data-id="<?php echo $program['ulp_id']; ?>">
            <td class="text-center bg-amber-200/25 border border-black p-1 font-bold"><?php echo htmlspecialchars($program['ulp_id']); ?></td>
            <td class="text-center  border border-black p-1 font-bold">
                <select class="user-select" data-old-value="<?php echo $program['pl_id']; ?>">
                    <?php foreach ($promoListEntries as $user): ?>
                        <option value="<?php echo $user['pl_id']; ?>" <?php echo $user['pl_id'] == $program['pl_id'] ? 'selected' : ''; ?>>
                            <?php echo htmlspecialchars($user['full_name']); ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </td>
            <td class="text-center  border border-black p-1 font-bold">
                <select class="program-select" data-old-value="<?php echo $program['program_id']; ?>">
                    <?php foreach ($loyaltyPrograms as $lp): ?>
                        <option value="<?php echo $lp['program_id']; ?>" <?php echo $lp['program_id'] == $program['program_id'] ? 'selected' : ''; ?>>
                            <?php echo htmlspecialchars($lp['name']); ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </td>
            <td class="text-center  border border-black p-1 font-bold"><?php echo htmlspecialchars($program['assigned_date']); ?></td>
                <td class="text-center  border border-black p-1 font-bold">
                    <div class="flex justify-center">
                         <button class="flex justify-center transition ease-in duration-200 transform hover:-translate-y-1 active:translate-y-0" onclick="editEntry(this, <?php echo $program['ulp_id']; ?>)">Save<img class="h-5 w-5 ml-2"  src="./UI/save.png"></button>
                
                    </div>
                
            </td>
            <td class="text-center  border border-black p-1 font-bold">
                <div class="flex justify-center">
                    <button class="flex justify-center transition ease-in duration-200 transform hover:-translate-y-1 active:translate-y-0 " onclick="deleteEntry(<?php echo $program['ulp_id']; ?>)">Delete<img class="h-5 w-5 ml-1"  src="./UI/delete.png"></button> 
                </div>  
            </td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>
</div>
</div>

</div>
<script type="text/javascript">
function editEntry(buttonElement, id) {
    const row = buttonElement.closest('tr');
    const userSelect = row.querySelector('.user-select');
    const programSelect = row.querySelector('.program-select');

    const data = {
        id: id,
        pl_id: userSelect.value,
        program_id: programSelect.value
    };

    // this will check if any data was changed from "data-old-value"
    if (data.pl_id === userSelect.getAttribute('data-old-value') && 
        data.program_id === programSelect.getAttribute('data-old-value')) {
        alert('No changes were made.');
        return;
    }

    fetch('functions/CRM/update_user_loyalty_program.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json'
        },
        body: JSON.stringify(data)
    })
    .then(response => response.json())
    .then(responseData => {
        if (responseData.success) {
            alert('Entry updated successfully.');
            // this will update old values to prevent unnecessary updates
            userSelect.setAttribute('data-old-value', data.pl_id);
            programSelect.setAttribute('data-old-value', data.program_id);
        } else {
            alert('failed to update entry.');
            console.error('Failed to update entry:', responseData);
        }
    })
    .catch(error => {
        alert('error occurred.');
        console.error('Error:', error);
    });
}

    function deleteEntry(id) {
        if (confirm('Are you sure you want to delete this entry?')) {
            window.location.href = 'functions/CRM/delete_user_loyalty_program.php?id=' + id;
        }
    }
</script>

</body>
</html>