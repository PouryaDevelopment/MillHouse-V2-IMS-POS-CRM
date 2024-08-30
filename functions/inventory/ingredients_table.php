<?php
include('functions/index/connection2data.php');

function getIngredients($connection) {
    $stmt = $connection->query("SELECT ingredient_id, name, quantity, unit_price, total FROM ingredient");
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

$ingredients = getIngredients($connection);
?>

<!DOCTYPE html>
<html lang="en">

<body>
    <h2 class="text-3xl mb-3">Ingredients</h2><br><br>
    <div class="flex justify-center h-[500px]">
        <div class=" w-2/4 ">
             <div class="border-2   bg-gradient-to-r from-amber-300/25  to-amber-500/25  border-amber-300/25 shadow-sm ml-2 mb-8 p-1 rounded-b-lg">
        <li class=" text-white text-2xl p-1  text-center shadow-sm justify-center bg-gradient-to-r from-amber-500/10 via-pink-500/10 to-amber-500/10 border-b-2 border-amber-300 grid place-items-center" >
            <img class=" fill-current  h-[100px] w-[100px]  mb-2" focusable="false"  src="./UI/inventory.png">

          </li>
          <h3 class="underline text-3xl p-1">Ingredients List</h3>
    <table class="w-full">
        <thead>
            <tr class="bg-gradient-to-r from-amber-200/25 via-amber-100/25 to-amber-200/25 border border-black font-bold ">
                <th class="text-center p-1">Ingredient ID</th>
                <th class="text-center p-1">Name</th>
                <th class="text-center p-1">Quantity</th>
                <th class="text-center p-1">Unit Price</th>
                <th class="text-center p-1">Total Cost</th>
                <th class="text-center p-1">Change</th>
                <th class="text-center p-1">Remove</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($ingredients as $ingredient): ?>
            <tr class="border border-black" id="row-<?= $ingredient['ingredient_id'] ?>">
                <form id="edit-form-<?= $ingredient['ingredient_id'] ?>" method="POST" action="./functions/inventory/update_ingredient.php">
                    <td class="text-center bg-amber-200/25 border border-black p-1 font-bold w-12"><?= htmlspecialchars($ingredient['ingredient_id']) ?></td>
                    <td class="text-center border border-black p-1 ">
                        <input class="w-[150px] text-center bg-gradient-to-r from-amber-500/25 via-amber-400/25 to-amber-300/25 border-none   rounded" type="text" name="name" value="<?= htmlspecialchars($ingredient['name']) ?>" readonly>
                    </td>
                    <td class="text-center border border-black p-1 ">
                        <input class="text-center w-12 bg-gradient-to-r from-amber-500/25 via-amber-400/25 to-amber-300/25 border-none   rounded" type="number" name="quantity" value="<?= htmlspecialchars($ingredient['quantity']) ?>" readonly>
                    </td>
                    <td class="text-center border border-black p-1 ">
                        <input class="text-center w-12 bg-gradient-to-r from-amber-500/25 via-amber-400/25 to-amber-300/25 border-none   rounded" type="text" name="unit_price" value="<?= htmlspecialchars($ingredient['unit_price']) ?>" readonly>
                    </td>
                    <td class="text-center border border-black p-1 "><?= htmlspecialchars($ingredient['total']) ?></td>
                    <td class="text-center border border-black p-1 ">
                        <input type="hidden" name="ingredient_id" value="<?= $ingredient['ingredient_id'] ?>">
                        <div class="flex justify-center transition ease-in duration-200 transform hover:-translate-y-1 active:translate-y-0">
                        <input type="button" id="edit-button-<?= $ingredient['ingredient_id'] ?>" value="Edit" onclick="toggleEdit(<?= $ingredient['ingredient_id'] ?>)">
                        <input type="submit" id="save-button-<?= $ingredient['ingredient_id'] ?>" name="update" value="Save" style="display:none;">

                        </div>
                    </td>
                </form>
                <td class="text-center border border-black p-1 ">
                    <form method="POST" action="./functions/inventory/delete_ingredient.php">
                        <input type="hidden" name="ingredient_id" value="<?= $ingredient['ingredient_id'] ?>">
                         <div class="flex justify-center transition ease-in duration-200 transform hover:-translate-y-1 active:translate-y-0">
                        <input type="submit" name="delete" value="Delete" onclick="return confirm('Are you sure you want to delete this item?');">
                        <img class="h-5 w-5 mx-2 self-center mb-0.5"  src="./UI/delete.png">
                        </div>
                    </form>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
<script>
    function toggleEdit(ingredientId) {
        document.querySelectorAll('#row-' + ingredientId + ' input').forEach(function(input) {
            input.readOnly = !input.readOnly;
        });

        var editButton = document.getElementById('edit-button-' + ingredientId);
        var saveButton = document.getElementById('save-button-' + ingredientId);

        if (editButton.style.display === 'none') {
            editButton.style.display = '';
            saveButton.style.display = 'none';
        } else {
            editButton.style.display = 'none';
            saveButton.style.display = '';
        }
    }

    function saveEdit(ingredientId) {
        document.getElementById('edit-form-' + ingredientId).submit();
    }
    </script>
</body>
</html>