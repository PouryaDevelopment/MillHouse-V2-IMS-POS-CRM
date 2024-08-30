<?php

include('functions/index/connection2data.php');


?>

<!DOCTYPE html>
<head>
                                                                                             <!-- Rateyo jequery css insert -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/rateYo/2.3.2/jquery.rateyo.min.css">
</head>

<h2 class="text-3xl py-3">Leave feedback</h2>

<div class="flex items-center justify-center space-x-3 pt-12">
                  <img class=" fill-current  h-[300px] w-[300px]  mb-4" focusable="false"  src="./UI/feedback.png">
                </div>  
<div class="flex justify-center ">

      
           <form class="grow" action="./functions/POS/submit_feedback.php" method="POST" class="text-center ">
        <!-- Products Dropdown -->
        <label for="product_id" class=" text-2xl  flex justify-center mb-4"><img class="h-7 w-7 mr-1"  src="./UI/Products.png">Product: <select class="w-[200px] text-center h-7 ml-2" id="product_id" name="product_id" required>
            <?php
            // Fetch all products from the database
            $stmt = $connection->prepare("SELECT product_id, name FROM product");
            $stmt->execute();
            $products = $stmt->fetchAll(PDO::FETCH_ASSOC);

            foreach ($products as $product) {
                echo "<option value=\"" . htmlspecialchars($product['product_id']) . "\">" . htmlspecialchars($product['name']) . "</option>";
            }
            ?>
        </select>              </label>
        
  
  <label class=" text-2xl  mb-1 flex justify-center" style="  font-family: 'Bebas Neue';" for="comment"><img class="h-8 w-8 mr-1 p-1"  src="./UI/POSFB.png">Comment:</label>
  <textarea style="  font-family: 'Bebas Neue';" class="w-[600px] h-[200px] text-center  pb-8 mb-2 bg-gradient-to-r from-amber-500/25 via-amber-400/25 to-amber-300/25 border-none flex-grow h-20 px-2 border rounded" id="comment" name="comment" rows="4" required></textarea>
  <input class="hidden" type="number" name="rating" id="rating">
  
  <div class="flex justify-center ">
     <div class="mb-2 " id="rateYo"></div>
  </div>

  
<div class="flex justify-center ">
    <button class="flex justify-center transition ease-in duration-200 transform hover:-translate-y-1 active:translate-y-0">
    <input class="font-bold text-3xl center  font-extrabold "  style="  font-family: 'Bebas Neue';" type="submit">
    <img class="h-7 w-7 ml-1 "  src="./UI/submit.png">
  </button>
</div>
  
  
</form>
          
          <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
                  <!-- RateYo script -->
<script type="text/javascript">

  
    $(function () {
      $("#rateYo").rateYo({
    fullStar: true
  });
 
  $("#rateYo").rateYo()

              .on("rateyo.set", function (e, data) {
                  $("#rating").val(data.rating);
                  
              });

});


 
</script>
  <!-- Rateyo js insert -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/rateYo/2.3.2/jquery.rateyo.min.js"></script>

</body>
</html>