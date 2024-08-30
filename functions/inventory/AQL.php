<?php 
include('functions/index/connection2data.php');
function getProducts($connection) {
    $stmt = $connection->query("SELECT product_id, name FROM product");
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

// Fetch products from the database
$products = getProducts($connection);

 ?>

 <!DOCTYPE html>
<html lang="en">

<body>
    <h2 class="text-3xl py-3">Add Product Quantity</h2><br><br>
    <div class="flex justify-center mb-3">
    	<img class="h-[200px] w-[200px]  "  src="./UI/AQL.png">
    </div><br><br>
    <form class="text-2xl" action="./functions/inventory/add_inventory.php" method="post">
        <label class="" for="product_id">Product:</label><br>
        <select class="text-center bg-gradient-to-r from-amber-500/25 via-amber-400/25 to-amber-300/25 border-none   rounded" name="product_id" id="product_id" required>
            <option value="">Select a product</option>
            <?php foreach ($products as $product): ?>
                <option value="<?= htmlspecialchars($product['product_id']) ?>"><?= htmlspecialchars($product['name']) ?></option>
            <?php endforeach; ?>
        </select><br>
        <br>

        <label for="quantity">Quantity:</label><br>
        <input class="text-center bg-gradient-to-r from-amber-500/25 via-amber-400/25 to-amber-300/25 border-none   rounded" type="number" id="quantity" name="quantity" required><br>
        <br><br>

         
<div class="flex justify-center ">
    <button class="flex justify-center transition ease-in duration-200 transform hover:-translate-y-1 active:translate-y-0">
    <input class="font-bold text-3xl center  font-extrabold "  style="  font-family: 'Bebas Neue';" type="submit" value="Add Quantity">
    <img class="h-7 w-7 ml-1 "  src="./UI/ProductQ.png">
  </button>
</div> 
    </form>
</body>
</html>
 