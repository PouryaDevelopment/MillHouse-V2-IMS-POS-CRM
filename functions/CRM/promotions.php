<?php
include('functions/index/connection2data.php');
// fetchs promotions
$stmt = $connection->prepare("SELECT promotion_id, name, discount FROM promotions");
$stmt->execute();
$promotions = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="en">
<body>
    <h2 class="text-3xl py-3">Promotions</h2><br>
    <div class="flex justify-center">
        <img class=" fill-current  h-[100px] w-[100px]  mb-2" focusable="false"  src="./UI/chartpromo.png">
    </div>
    <h2 class="text-2xl py-2 underline">Add New Promotion</h2>
    <div class="flex justify-center mb-5">
        <form action="./functions/CRM/insert_promotions.php" method="post">
        <label class="mb-1" for="name">Promotion Name:</label><br>
        <input class=" mb-1 bg-gradient-to-r from-amber-500/25 via-amber-400/25 to-amber-300/25 border-none flex-grow px-2 border rounded text-center" type="text" id="name" name="name" required><br>
        
        <label class="mb-1" for="discount">Discount (Needs %):</label><br>
        <input class="mb-1 bg-gradient-to-r from-amber-500/25 via-amber-400/25 to-amber-300/25 border-none flex-grow px-2 border rounded text-center" type="text" id="discount" name="discount" required><br>
        
        <div class="flex justify-center">
            <button class="mt-2 flex justify-center border-2 rounded-full bg-gradient-to-r from-amber-300/25 to-amber-500/25 border-b-2 border-amber-300/25 shadow-sm  p-1  transition ease-in duration-200 transform hover:-translate-y-1 active:translate-y-0" type="submit">Add Promotion <img class=" h-6 w-6   ml-1 " focusable="false"  src="./UI/ppromo.png"></button>
        </div>
    </form>
    </div><br>

    <div class="flex justify-center">
        <div class="justify-self-center w-2/5 overflow-x-auto h-[300px]">
        <div class="border-2   bg-gradient-to-r from-amber-300/25  to-amber-500/25  border-amber-300/25 shadow-sm ml-2 mb-8 p-1 rounded-b-lg">
        <li class=" text-white text-2xl p-1  text-center shadow-sm justify-center bg-gradient-to-r from-amber-500/10 via-yellow-amber/50 to-amber-500/10 border-b-2 border-amber-300 grid place-items-center" >
            <img class=" fill-current  h-[100px] w-[100px]  mb-2" focusable="false"  src="./UI/discountpromo.png">

          </li>
          <h3 class="underline text-3xl p-1">Existing Promotions</h3> 
    <table class="w-full">
    <thead>
        <tr class="bg-gradient-to-r from-amber-200/25 via-amber-100/25 to-amber-200/25 border border-black font-bold ">
            <th class="text-center p-1">Promotion ID</th>
            <th class="text-center p-1">Name</th>
            <th class="text-center p-1">Discount</th>
            <th class="text-center p-1">Edit</th>
            <th class="text-center p-1">Delete</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($promotions as $promotion): ?>
        <tr class="border border-black">
            <form method="post" action="./functions/CRM/edit_promotion.php">
                <td class="text-center w-4 bg-amber-200/25 border border-black p-1 font-bold"><?php echo htmlspecialchars($promotion['promotion_id']); ?></td>
                <td class="text-center border border-black p-1 w-[180px]">
                    <input class="bg-gradient-to-r from-amber-500/25 via-amber-400/25 to-amber-300/25 border-none flex-grow px-2 border rounded text-center" type="text" name="name" value="<?php echo htmlspecialchars($promotion['name']); ?>" required>
                </td>
                <td class="text-center border border-black p-1 w-12">
                    <input class="bg-gradient-to-r from-amber-500/25 via-amber-400/25 to-amber-300/25 border-none flex-grow px-2 border rounded text-center" type="text" name="discount" value="<?php echo htmlspecialchars($promotion['discount']); ?>" required></td>
                <td class="text-center border border-black p-1">
                    <input type="hidden" name="promotion_id" value="<?php echo $promotion['promotion_id']; ?>">
                    <div class="flex justify-center">
                        <button class="transition ease-in duration-200 transform hover:-translate-y-1 active:translate-y-0 flex justify-center" type="submit" name="edit_promotion">Save<img class="h-5 w-5 ml-2"  src="./UI/save.png"></button>
                    </div>
                    
                </td>
                <td class="text-center border border-black p-1 w-[100px]">
                    <a class="flex justify-center transition ease-in duration-200 transform hover:-translate-y-1 active:translate-y-0" href="./functions/CRM/delete_promotion.php?promotion_id=<?php echo $promotion['promotion_id']; ?>" onclick="return confirm('Are you sure you want to delete this promotion?');">Delete<img class="h-5 w-5 mx-2"  src="./UI/delete.png"></a>
                </td>
            </form>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>
    </div>
</div>
</body>
</html>