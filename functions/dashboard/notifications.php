<?php
include('functions/index/connection2data.php');
function getNegativeFeedback($connection) {
    $stmt = $connection->query("
        (SELECT feedback_website_id AS feedback_id, NULL AS product_id, comment, rating, notification_read, created_at, 'feedback' AS source 
         FROM feedback 
         WHERE rating < 3)
        UNION ALL
        (SELECT feedback_instore_id AS feedback_id, product_id, instore_comment AS comment, instore_rating AS rating, notification_read, created_at, 'instore_feedback' AS source 
         FROM instore_feedback 
         WHERE instore_rating < 3)
        ORDER BY created_at DESC
    ");
    return $stmt->fetchAll(PDO::FETCH_ASSOC);

}


$negativeFeedback = getNegativeFeedback($connection);
?>

<?php
function getLowInventory($connection) {
    $stmt = $connection->prepare("
        SELECT inventory.inventory_id, inventory.product_id, inventory.quantity, inventory.status, product.name
        FROM inventory
        JOIN product ON inventory.product_id = product.product_id
        WHERE inventory.quantity <= 20
    ");
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

$lowInventoryItems = getLowInventory($connection);
?>

<!DOCTYPE html>
<html lang="en">
<body>
<h2 class="text-3xl py-3">Notifications</h2>
  <div class="flex justify-center mb-3">
        <img class="h-[200px] w-[200px]  "  src="./UI/notif.png">
    </div>
    <div class="grid grid-cols-2 mx-2">
        <div>
    <div class="justify-center overflow-y-scroll h-[500px]">
        <div class="border-2   bg-gradient-to-r from-amber-300/25  to-amber-500/25  border-amber-300/25 shadow-sm ml-2  p-1 rounded-b-lg">
        <li class=" text-white text-2xl p-1  text-center shadow-sm justify-center bg-gradient-to-r from-amber-500/10 via-red-500/25 to-amber-500/10 border-b-2 border-amber-300 grid place-items-center" >
            <img class=" fill-current  h-[100px] w-[100px]  mb-2" focusable="false"  src="./UI/neg.png">

          </li>
          <h3 class="underline text-3xl p-1">Negative Feedback</h3>
        <table class="w-full">
        <thead>
            <tr class="bg-gradient-to-r from-amber-200/25 via-amber-100/25 to-amber-200/25 border border-black font-bold ">
                <th class="text-center p-1">Feedback ID</th>
                <th class="text-center p-1">Product ID</th>
                <th class="text-center p-1">Comment</th>
                <th class="text-center p-1">Rating</th>
                <th class="text-center p-1">Created At</th>
                <th class="text-center p-1">Notification Read</th>
                <th class="text-center p-1">Toggle Read</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($negativeFeedback as $feedback): ?>
            <tr class="border border-black">
                <td class="text-center bg-amber-200/25 border border-black p-1 font-bold"><?= htmlspecialchars($feedback['feedback_id']) ?></td>
                <td class="text-center border border-black p-1 "><?= htmlspecialchars($feedback['product_id']) ?></td>
                <td class="text-center border border-black p-1 "><?= htmlspecialchars($feedback['comment']) ?></td>
                <td class="text-center border border-black p-1 "><?= htmlspecialchars($feedback['rating']) ?></td>
                <td class="text-center border border-black p-1 "><?= htmlspecialchars($feedback['created_at']) ?></td>
                <td class="text-center border border-black p-1 "><?= $feedback['notification_read'] ? 'Read' : 'Not Read' ?></td>
                <td class="text-center border border-black p-1 ">
                    <form method="POST" action="./functions/dashboard/toggle_notification_read.php">
                        <input type="hidden" name="feedback_id" value="<?= $feedback['feedback_id'] ?>">
                        <input type="hidden" name="source" value="<?= $feedback['source'] ?>">
                        <input class="transition ease-in duration-200 transform hover:-translate-y-1 active:translate-y-0" type="submit" name="toggle_read" value="<?= $feedback['notification_read'] ? 'Mark as Unread' : 'Mark as Read' ?>">
                    </form>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    </div>
    </div>
    </div>
    
    <div class="overflow-y-scroll h-[500px]">
    <div class="flex justify-center">
        <div class="border-2   bg-gradient-to-r from-amber-300/25  to-amber-500/25  border-amber-300/25 shadow-sm ml-2 mb-8 p-1 rounded-b-lg w-3/4">
        <li class=" text-white text-2xl p-1  text-center shadow-sm justify-center bg-gradient-to-r from-amber-500/10 via-red-500/25 to-amber-500/10 border-b-2 border-amber-300 grid place-items-center" >
            <img class=" fill-current  h-[100px] w-[100px]  mb-2" focusable="false"  src="./UI/dislike.png">

          </li>
          <h3 class="underline text-3xl p-1">Low Inventory Items</h3>
        <table class="w-full">
        <thead>
            <tr class="bg-gradient-to-r from-amber-200/25 via-amber-100/25 to-amber-200/25 border border-black font-bold ">
                <th class="text-center p-1">Product ID</th>
                <th class="text-center p-1">Product Name</th>
                <th class="text-center p-1">Quantity</th>
                <th class="text-center p-1">Status</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($lowInventoryItems as $item): ?>
            <tr class="border border-black">
                <td class="text-center bg-amber-200/25 border border-black p-1 font-bold w-12"><?= htmlspecialchars($item['product_id']) ?></td>
                <td class="text-center border border-black p-1 "><?= htmlspecialchars($item['name']) ?></td>
                <td class="text-center border border-black p-1 w-12"><?= htmlspecialchars($item['quantity']) ?></td>
                <td  data-status="<?= htmlspecialchars($item['status']) ?>" class="text-center border border-black p-1 "><?= htmlspecialchars($item['status']) ?></td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    </div>
    </div>
    </div>
    <script>
document.addEventListener('DOMContentLoaded', (event) => {
    const statusCells = document.querySelectorAll('td[data-status]');

    statusCells.forEach(cell => {
        switch(cell.dataset.status) {
            case 'Out of Stock':
                cell.style.color = 'red';
                break;
            case 'Low Stock':
                cell.style.color = 'rgb(255, 174, 0)';
                break;
            
        }
    });
});
</script>
</body>
</html>