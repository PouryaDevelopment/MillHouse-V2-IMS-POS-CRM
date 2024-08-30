<!DOCTYPE html>
<html>
<body>
                                                        <!-- Title and image -->
    <div class="col-span-3">
          <h2 class="text-3xl justify-center pt-1"  style="  font-family: 'Bebas Neue';">Add New Order</h2>
          <li class=" text-white text-2xl   text-center  justify-center  grid place-items-start" >
            <img class=" fill-current pt-1 h-[200px] w-[200px]  " focusable="false"  src="./UI/post.png">


          </li>
    </div>
                                                     <!-- select product form -->

  <div class="row-span-2  text-2xl ml-4 ">
    
    <form action="" method="post">
        <div class="border-2 rounded-full bg-gradient-to-r from-amber-300/25 to-amber-500/25 border-b-2 border-amber-300/25 shadow-sm ml-2 mb-8">
        <label class="flex justify-center" style="  font-family: 'Bebas Neue';" for="product"><img class="h-7 w-7 mr-3"  src="./UI/products.png">Select Product:</label>
        <select class="mb-2" style="  font-family: 'Bebas Neue';" name="product_id" id="product">
            <option>No Product Selected</option>

          <?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

include('functions/index/connection2data.php');

if (isset($sql_connection_error)) {
    die("Conn failed: " . $sql_connection_error);
}

try {
    $stmt = $connection->query("SELECT product_id, name, price FROM product");   
    $products = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // it will check if there are any products:
    if ($products) {
        //it will go over (Iterate) over each product from the products table and create an option in the select input
        foreach ($products as $row) {
            echo "<option data-price='".htmlspecialchars($row['price'])."'' value='".htmlspecialchars($row['product_id'])."'>"
                 .htmlspecialchars($row['name'])." - £".htmlspecialchars(number_format($row['price'], 2))
                 ."</option>";
        }
    } else {
        //if it cant find any products it will display:
        echo "<option>No products available</option>";
    }
} catch (PDOException $e) {
    echo "<option>Error: " . $e->getMessage() . "</option>";
}


?>
        </select><br>
        </div>
                                                                        <!-- get quantity and select quantity -->
        <div class="border-2 rounded-full bg-gradient-to-r from-amber-300/25 to-amber-500/25  border-amber-300/25 shadow-sm ml-2 mb-8 p-1">
        <p  style="  font-family: 'Bebas Neue';" id="quantityDisplay"> Quantity Available:</p>
        <label class="flex justify-center" style="  font-family: 'Bebas Neue';" for="quantity"><img class="h-7 w-7 mr-3"  src="./UI/ProductQ.png">Quantity:</label>
        <input class="text-center" style="  font-family: 'Bebas Neue';" type="number" name="quantity" id="quantity" value="1" min="1" required><br>
        </div>
        <div class="flex justify-center">
            <button style="  font-family: 'Bebas Neue';" class="flex border-2 rounded-full bg-gradient-to-r from-amber-300/25 to-amber-500/25 border-b-2 border-amber-300/25 shadow-sm ml-2 mb-8 p-1 mx-3 transition ease-in duration-200 transform hover:-translate-y-1 active:translate-y-0" style="  font-family: 'Bebas Neue'; " id="addProduct" type="button">Add to Basket<img class="h-7 w-7 mx-2"  src="./UI/basket.png"></button>
        </div>                                                                <!-- discount form -->
        <div class="border-2 rounded-full bg-gradient-to-r from-amber-300/25 to-amber-500/25  border-amber-300/25 shadow-sm ml-2 mb-8 p-1">
        <label class="flex justify-center" style="  font-family: 'Bebas Neue';" for="promotion"><img class="h-7 w-7 mr-3"  src="./UI/CRM.png">Select Discount:</label>
<select class="text-center " style="  font-family: 'Bebas Neue';" name="promotion_id" id="promotion">
    <option value="0%">No Discount</option>
    <?php
    $stmt = $connection->query("SELECT promotion_id, name, discount FROM promotions");
    $promotions = $stmt->fetchAll(PDO::FETCH_ASSOC);

    if ($promotions) {
        foreach ($promotions as $promotion) {
            echo "<option value='".htmlspecialchars($promotion['discount'])."'>"
                 .htmlspecialchars($promotion['name'])." - ".htmlspecialchars($promotion['discount'])
                 ."</option>";
        }
    } else {
        echo "<option>No promotions available</option>";
    }
    ?>
</select><br>
</div>
                                                                                            <!-- Apply discount button-->
<div class="flex justify-center">
   <button class="flex justify-center border-2 rounded-full bg-gradient-to-r from-amber-300/25 to-amber-500/25 border-b-2 border-amber-300/25 shadow-sm ml-2 mb-2 p-1 mx-3 transition ease-in duration-200 transform hover:-translate-y-1 active:translate-y-0" style="  font-family: 'Bebas Neue';" id="applyDiscount" type="button">Apply Discount<img class="h-7 w-7 mx-2"  src="./UI/Promotion.png"></button> 
</div>

    </form>
                                                    <!-- Submit order form-->
        
    <form id="completeOrderForm" action="functions/POS/submit_order.php" method="post">                                                     
                                        <!-- a hidden field to hold the json  basket data inside -->
    <input type="hidden" name="basketData" id="basketData">
    <div class="flex justify-center">
     <button style="  font-family: 'Bebas Neue';"class="flex justify-center border-2 rounded-full bg-gradient-to-r from-amber-300/25 to-amber-500/25 border-b-2 border-amber-300/25 shadow-sm ml-2  p-1 mx-3 transition ease-in duration-200 transform hover:-translate-y-1 active:translate-y-0" style="  font-family: 'Bebas Neue'; " type="submit">Complete Order<img class="h-7 w-7 mx-2"  src="./UI/salesR.png"></button>   
    </div>
    
</form>
                                                                <!-- Basket-->
</div>
    <div class="border-2 row-span-2 col-span-2 border-2 justify-self-stretch  bg-gradient-to-r from-amber-300/25 to-amber-500/25  border-amber-300/25 shadow-sm ml-2 mb-8 p-1 rounded-b-lg" style="  font-family: 'Bebas Neue';" id="basket">
        <li class=" text-white text-2xl p-1  text-center shadow-sm justify-center bg-gradient-to-r from-amber-500/10 via-amber-400/50 to-amber-300/10 border-b-2 border-amber-300 grid place-items-center" >
            <img class=" fill-current  h-[100px] w-[100px]  mb-2" focusable="false"  src="./UI/basket.png">

          </li>
    <h3 class="underline text-3xl p-1">Basket</h3>  
    <ul class="text-stone-500  shadow-inner  p-1 pt-2" id="basketList"></ul><br>
    <p class="text-2xl absolute bottom-12 right-3">Total: £<span id="totalPrice">0.00</span></p>
</div>
<script type="text/javascript">
 
var basket = [];
var totalPrice = 0.00;

document.addEventListener('DOMContentLoaded', function() {
    var productSelect = document.getElementById('product');
    var quantityInput = document.getElementById('quantity');
    var basketList = document.getElementById('basketList');
    var totalPriceDisplay = document.getElementById('totalPrice');

    document.getElementById('addProduct').addEventListener('click', function(e) {
        e.preventDefault();
        var productId = productSelect.value;
        var productName = productSelect.options[productSelect.selectedIndex].text;
        var quantity = parseInt(quantityInput.value, 10);
        var price = parseFloat(productSelect.options[productSelect.selectedIndex].getAttribute('data-price'));

        addToBasket(productId, productName, quantity, price);
        updateTotalPrice();
    });

    function addToBasket(productId, productName, quantity, price) {
    console.log('Adding to basket');
    var basketItem = { productId, productName, quantity, price };
    basket.push(basketItem);
    var li = document.createElement('li');
    li.textContent = productName + ' x ' + quantity + ' at £' + (price * quantity).toFixed(2);
    
    // adds a Delete button for the basket item
    var deleteBtn = document.createElement('button');
    deleteBtn.textContent = 'Delete';
    deleteBtn.classList.add("border-2","ml-3","rounded-lg","bg-gradient-to-r","from-amber-300/25","to-amber-500/25","border-amber-300/25","shadow-sm","mb-2","transition","ease-in","duration-200","transform","hover:-translate-y-1","text-black");
    deleteBtn.onclick = function() {
        // this removes the item from the basket and updates the display
        removeFromBasket(basketItem);
    };
    li.appendChild(deleteBtn);
    
    basketList.appendChild(li);
    basketItem.element = li; // this will keep a reference to the element for easy removal for later
}
function removeFromBasket(basketItem) {
    // this will ffind the index of the basket item
    var index = basket.indexOf(basketItem);
    if (index > -1) {
        basket.splice(index, 1); // Remove the item from the basket
        basketItem.element.remove(); // Remove the item element from the DOM
        updateTotalPrice(); // Update the total price display
    }
}

   var selectedDiscount = 0;

//document.getElementById('promotion').addEventListener('change', function() {
   // var discountValue = this.value;
    // Remove the percentage sign and divide by 100 to get the decimal value
    //selectedDiscount = parseFloat(discountValue.replace('%', '')) / 100;
    //updateTotalPrice();
//});           This is an on change function for the promotion i have disabled it since ive decided to go with a button instead, I have kept it incase I want to change it back.


function updateTotalPrice() {
    var subtotal = basket.reduce(function(acc, item) {
        return acc + (item.price * item.quantity);
    }, 0);

    totalPrice = subtotal - (subtotal * selectedDiscount);
    totalPriceDisplay.textContent = totalPrice.toFixed(2);
}
document.getElementById('applyDiscount').addEventListener('click', function() {
    // the discount has to be in a percentage value eg "20%", this will replace the % and divide it by 100
    selectedDiscount = parseFloat(document.getElementById('promotion').value.replace('%', '')) / 100;
    updateTotalPrice();
});
document.getElementById('completeOrderForm').addEventListener('submit', function(event) {
    if (basket.length === 0) {
        event.preventDefault(); // this prevents form submission
        alert('Your basket is empty.');
        return false; 
    }

    var orderDetails = {
        basket: basket,
        discount: selectedDiscount,
        discountLabel: document.getElementById('promotion').options[document.getElementById('promotion').selectedIndex].text
    };
    document.getElementById('basketData').value = JSON.stringify(orderDetails);
});
});

</script>
    <script>
document.addEventListener('DOMContentLoaded', function() {
    var productSelect = document.getElementById('product');
    var quantityDisplay = document.getElementById('quantityDisplay');

    productSelect.addEventListener('change', function() {
        var productId = this.value;
        fetch('functions/POS/get_quantity.php?product_id=' + productId)
            .then(response => response.text())
            .then(quantity => {
                quantityDisplay.textContent = 'Quantity Available: ' + quantity;
            })
            .catch(error => {
                console.error('Error fetching quantity:', error);
            });
    });
});
</script>
</body>
</html>