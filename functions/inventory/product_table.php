<?php
include('functions/index/connection2data.php');

// a function to fetch products
function getProducts($connection) {
    $stmt = $connection->query("SELECT * FROM product");
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

$products = getProducts($connection);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Product Table</title>
    
</head>
<body>
    <h2 class="text-3xl ">Inventory</h2>
    <div class="flex justify-center h-[780px]">
        <div class="justify-self-center w-2/4 self-center">
        <div class="border-2   bg-gradient-to-r from-amber-300/25  to-amber-500/25  border-amber-300/25 shadow-sm ml-2 mb-8 p-1 rounded-b-lg">
        <li class=" text-white text-2xl p-1  text-center shadow-sm justify-center bg-gradient-to-r from-amber-500/10 via-yellow-500 to-amber-500/10 border-b-2 border-amber-300 grid place-items-center" >
            <img class=" fill-current  h-[100px] w-[100px]  mb-2" focusable="false"  src="./UI/Products.png">

          </li>
          <h3 class="underline text-3xl p-1">Products</h3>  
        <table class="w-full ">
        <thead>
            <tr class="bg-gradient-to-r from-amber-200/25 via-amber-100/25 to-amber-200/25 border border-black font-bold ">
                <th class="text-center p-1">ID</th>
                <th class="text-center p-1" class="text-center p-1" class="text-center p-1" class="text-center p-1" class="text-center p-1">Name</th>
                <th class="text-center p-1" class="text-center p-1" class="text-center p-1" class="text-center p-1">Price</th>
                <th class="text-center p-1" class="text-center p-1" class="text-center p-1">Category ID</th>
                <th class="text-center p-1" class="text-center p-1">Edit</th>
                <th class="text-center p-1">Delete</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($products as $product): ?>
            <tr class="border border-black">
                <form method="POST" action="./functions/inventory/update_product.php">
                <td class="text-center bg-amber-200/25 border border-black p-1 font-bold"><?= htmlspecialchars($product['product_id']) ?></td>
                <td class="text-center border border-black p-1"><input class="text-center w-full bg-gradient-to-r from-amber-500/25 via-amber-400/25 to-amber-300/25 border-none  px-2 rounded editable" type="text" name="name" value="<?= htmlspecialchars($product['name']) ?>"  readonly></td>
                <td class="text-center border border-black p-1 w-4"><input class="text-center bg-gradient-to-r from-amber-500/25 via-amber-400/25 to-amber-300/25 border-none  px-2 rounded w-12 editable" type="text" name="price" value="<?= htmlspecialchars($product['price']) ?>"  readonly></td>
                <td class="text-center border border-black p-1 w-4"><input class="text-center bg-gradient-to-r from-amber-500/25 via-amber-400/25 to-amber-300/25 border-none  px-2 rounded w-6 editable" type="text" name="category_id" value="<?= htmlspecialchars($product['category_id']) ?>"  readonly></td>
                <div class="flex justify-center">
                    <td class="edit-action text-center grid place-content-center  ">
                         <button class=" flex justify-center mt-1 transition ease-in duration-200 transform hover:-translate-y-1 active:translate-y-0" type="button" onclick="editRow(this.parentNode.parentNode)">Edit<img class="h-5 w-5 mx-2"  src="./UI/edit.png"></button>
                </td>
                </div>
                
                <td class="save-action text-center   flex justify-center " style="display: none;">
                    <input type="hidden" name="product_id" value="<?= $product['product_id'] ?>">
                    <button class="flex justify-center mt-1 transition ease-in duration-200 transform hover:-translate-y-1 active:translate-y-0" type="submit" name="save" onclick="saveRow(this.parentNode.parentNode)">Save<img class="h-5 w-5 mx-2 self-center"  src="./UI/save.png"></button>
                </td>
                </form>
                <td class="text-center  p-1 w-[100px] border border-black ">
                    <form method="POST" action="./functions/inventory/delete_product.php" onsubmit="return confirm('Are you sure you want to delete this product?');">
                        <input type="hidden" name="product_id" value="<?= $product['product_id'] ?>">
                        
                        <div class="flex justify-center transition ease-in duration-200 transform hover:-translate-y-1 active:translate-y-0">
                            <input  type="submit" name="delete" value="Delete">
                            <img class="h-5 w-5 mx-2 self-center"  src="./UI/delete.png">
                        </div>
                        
                    </form>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
    </div>
    <script>
    function editRow(row) {
        var inputs = row.querySelectorAll('input.editable');
        inputs.forEach(function(input) {
            input.removeAttribute('readonly');
        });

        row.querySelector('.edit-action').style.display = 'none';
        row.querySelector('.save-action').style.display = '';
    }

    function saveRow(row) {
        var inputs = row.querySelectorAll('input.editable');
        inputs.forEach(function(input) {
            input.setAttribute('readonly', true);
        });

        row.querySelector('.edit-action').style.display = '';
        row.querySelector('.save-action').style.display = 'none';
    }
    </script>
</body>
</html>