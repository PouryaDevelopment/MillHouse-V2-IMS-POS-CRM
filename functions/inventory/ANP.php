<?php
include('functions/index/connection2data.php');

function getCategories($connection) {
    $stmt = $connection->query("SELECT category_id, name FROM product_category");
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

$categories = getCategories($connection);
?>

<!DOCTYPE html>
<html lang="en">

<body>
    <h2 class="text-3xl py-3">New Product</h2>
  <div class="flex justify-center mb-3">
        <img class="h-[200px] w-[200px]  "  src="./UI/foodndrink.png">
    </div>
   <div class="flex justify-center content-center h-[500px] items-center">
        <form action="./functions/inventory/add_product.php" method="post">
        <label class="text-2xl" for="name">Product Name:</label><br>
        <input class="text-center bg-gradient-to-r from-amber-500/25 via-amber-400/25 to-amber-300/25 border-none   rounded" type="text" id="name" name="name" required><br><br>

        <label class="text-2xl" for="price">Price:</label><br>
        <input class="text-center bg-gradient-to-r from-amber-500/25 via-amber-400/25 to-amber-300/25 border-none   rounded" type="text" id="price" name="price" required><br><br>

        <label class="text-2xl" for="category">Category:</label><br>
        <select class="text-center bg-gradient-to-r from-amber-500/25 via-amber-400/25 to-amber-300/25 border-none   rounded text-2xl" id="category" name="category_id" required><br>
            <option class="text-center " value="">Select a Category</option>
            <?php foreach ($categories as $category): ?>
                <option value="<?= htmlspecialchars($category['category_id']) ?>">
                    <?= htmlspecialchars($category['name']) ?>
                </option>
            <?php endforeach; ?>
        </select><br><br>

       <button class="flex justify-center transition ease-in duration-200 transform hover:-translate-y-1 active:translate-y-0">
    <input class="font-bold text-3xl center  font-extrabold "  style="  font-family: 'Bebas Neue';" type="submit" value="Add New Product">
    <img class="h-7 w-7 ml-1 "  src="./UI/foodndrink.png">
  </button>
    </form>
    </div>

</body>
</html>