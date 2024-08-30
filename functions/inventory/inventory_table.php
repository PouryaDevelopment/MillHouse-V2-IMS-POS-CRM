<?php
include('functions/index/connection2data.php');

// a function to fetch inventory items with product name
function getInventory($connection) {
    $stmt = $connection->query("SELECT inventory.*, product.name FROM inventory JOIN product ON inventory.product_id = product.product_id");
    return $stmt->fetchAll(PDO::FETCH_ASSOC);

}

$inventoryItems = getInventory($connection);
?>

<!DOCTYPE html>
<html lang="en">
<body>
    <h2 class="text-3xl mb-3">View Quantity</h2><br><br><br><br>
    <div class="flex justify-center h-[500px]">
        <div class=" w-2/4 ">
             <div class="border-2   bg-gradient-to-r from-amber-300/25  to-amber-500/25  border-amber-300/25 shadow-sm ml-2 mb-8 p-1 rounded-b-lg">
        <li class=" text-white text-2xl p-1  text-center shadow-sm justify-center bg-gradient-to-r from-amber-500/10 via-yellow-500 to-amber-500/10 border-b-2 border-amber-300 grid place-items-center" >
            <img class=" fill-current  h-[100px] w-[100px]  mb-2" focusable="false"  src="./UI/ProductQ.png">

          </li>
          <h3 class="underline text-3xl p-1">Quantity</h3>
        <table class="w-full">
        <thead>
            <tr class="bg-gradient-to-r from-amber-200/25 via-amber-100/25 to-amber-200/25 border border-black font-bold ">
                <th class="text-center p-1">Inventory ID</th>
                <th class="text-center p-1">Product</th>
                <th class="text-center p-1">Quantity</th>
                <th class="text-center p-1">Status</th>
                <th class="text-center p-1">Remove</th>
                
            </tr>
        </thead>
        <tbody>
            <?php foreach ($inventoryItems as $item): ?>
            <tr class="border border-black">
    <td class="text-center bg-amber-200/25 border border-black p-1 font-bold w-12"><?= htmlspecialchars($item['inventory_id']) ?></td>
    <td class="text-center border border-black p-1 "><?= htmlspecialchars($item['name']) ?></td> <!-- displays the product name for the product id  -->
                <td class="w-[100px] text-center border border-black p-1">
                    <form id="update-form-<?= $item['inventory_id'] ?>" method="POST" action="./functions/inventory/update_inventory.php">
                        <div class="grid grid-cols-1  justify-items-center">
                            <input type="hidden" name="inventory_id" value="<?= $item['inventory_id'] ?>">
                        <input class="text-center  bg-gradient-to-r from-amber-500/25 via-amber-400/25 to-amber-300/25 border-none   rounded w-[90px]" type="number" name="quantity" value="<?= htmlspecialchars($item['quantity']) ?>" readonly 
                               onclick="editQuantity(this, <?= $item['inventory_id'] ?>)">
                        <button class="p-1 mt-1 flex justify-center transition ease-in duration-200 transform hover:-translate-y-1 active:translate-y-0" type="button" id="save-button-<?= $item['inventory_id'] ?>" style="display:none;"
                                onclick="saveQuantity(this.previousElementSibling, <?= $item['inventory_id'] ?>)">Save<img class="h-5 w-5 mx-2 self-center"  src="./UI/save.png"></button>
                        </div>
                    </form>
                </td>
                <td class="text-center border border-black p-1" data-status="<?= htmlspecialchars($item['status']) ?>">
    <?= htmlspecialchars($item['status']) ?>
</td>
                
                <td class="text-center border border-black p-1">
                    <form method="POST" action="./functions/inventory/delete_inventory.php" onsubmit="return confirm('Are you sure you want to delete this inventory item?');">
                        <input type="hidden" name="inventory_id" value="<?= $item['inventory_id'] ?>">
                        <div class="flex justify-center transition ease-in duration-200 transform hover:-translate-y-1 active:translate-y-0">
                            <input type="submit" name="delete" value="Delete">
                            <img class="h-5 w-5 mx-2 self-center mb-0.5"  src="./UI/delete.png">
                        </div>
                    </form>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    </div>
    </div>
    </div>
    <script>
    function editQuantity(input, inventoryId) {
        input.readOnly = false;
        input.classList.add('edit-mode');
        document.getElementById('save-button-' + inventoryId).style.display = 'inline';
    }

    function saveQuantity(input, inventoryId) {
        var quantity = input.value;
        input.readOnly = true;
        input.classList.remove('edit-mode');
        document.getElementById('save-button-' + inventoryId).style.display = 'none';

        document.getElementById('update-form-' + inventoryId).submit();
    }
    </script>
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
            case 'In Stock':
                cell.style.color = 'rgb(21, 120, 243)';
                break;
        }
    });
});
</script>
</body>
</html>
