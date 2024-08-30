<!DOCTYPE html>
<html lang="en">
<body>
    <h2 class="text-3xl py-3">Add Ingredient</h2>
    <div class="flex justify-center mb-3">
        <img class="h-[200px] w-[200px]  "  src="./UI/ingredientquantity.png">
    </div>
    <div class="flex justify-center content-center h-[500px] items-center">
       
    <form action="./functions/inventory/add_ingredients.php" method="post">
        <label class="text-2xl" for="name">Name:</label><br>
        <input class="text-center bg-gradient-to-r from-amber-500/25 via-amber-400/25 to-amber-300/25 border-none   rounded" type="text" id="name" name="name" required><br><br>

        <label class="text-2xl" for="quantity">Quantity:</label><br>
        <input class="text-center w-12 bg-gradient-to-r from-amber-500/25 via-amber-400/25 to-amber-300/25 border-none   rounded" type="number" id="quantity" name="quantity" min="0" required><br><br>

        <label class="text-2xl" for="unit_price">Unit Price:</label><br>
        <input class="text-center w-12 bg-gradient-to-r from-amber-500/25 via-amber-400/25 to-amber-300/25 border-none   rounded" type="text" id="unit_price" name="unit_price" required><br><br>

        <button class="flex justify-center transition ease-in duration-200 transform hover:-translate-y-1 active:translate-y-0">
    <input class="font-bold text-3xl center  font-extrabold "  style="  font-family: 'Bebas Neue';" type="submit" value="Add New Ingredient">
    <img class="h-7 w-7 ml-1 "  src="./UI/ingredient.png">
  </button>
    </form>
    </div>
</body>
</html>