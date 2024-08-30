<?php 
session_start();
$viewMenu = include('functions/index/viewProductFunction.php');
  
 ?>

<!DOCTYPE html>
<html>
<head>
<title>Homepage</title>

                    <!-- tailwind insert -->
<script src="https://cdn.tailwindcss.com"></script>
                         
                            <!-- gooogle font insert -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&display=swap" rel="stylesheet">
<!-- gooogle font css  -->
<style type="text/css">
    .bebas-neue-regular {
  font-family: "Bebas Neue", sans-serif;
  font-weight: 400;
  font-style: normal;

  
}

</style>
                                                                                      <!-- BootStrap css insert -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
                                                                                          <!-- Rateyo jequery css insert -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/rateYo/2.3.2/jquery.rateyo.min.css">
</head>

<body>
                                                                <!-- Background -->

<div class=" h-screen w-screen overflow-hidden" style="background: url('./loginpage/loginbg.jpg'); background-size: cover; background-position: center center; ">
  <?php 


$_SESSION['feedback'] = 'feedback'; 
if($_POST){
    include('functions/index/connection2data.php');
$fullname = $_POST['fullname'];
$comment = $_POST['comment'];
$rating = $_POST['rating'];
 $query = 'INSERT INTO feedback (`fullname`, `comment`, `rating`) 
        VALUES (:name, :comment, :rating)';
$stmt = $connection->prepare($query);
         $stmt->bindParam(':name', $fullname);
    $stmt->bindParam(':comment', $comment);
    $stmt->bindParam(':rating', $rating);
    $stmt->execute();
    echo '<div id="ALERT" class="alert  alert-dismissible fade show  text-center bg-gradient-to-r from-amber-200 via-amber-100 to-amber-200  shadow-md rounded-none border-stone-500 text-2xl p-0 font-mono font-extrabold text-stone-500 "  role="alert">
  Thank you!
  <button type="button" class="btn-close p-1" data-bs-dismiss="alert" aria-label="Close"></button>
</div>';}
  



   ?>
<?php

if (isset($_GET['message'])) {
    $promomessage = $_GET['message'];
    if ($promomessage == "success") {
         echo '<div id="ALERT" class="alert  alert-dismissible fade show  text-center bg-gradient-to-r from-amber-200 via-amber-100 to-amber-200  shadow-md rounded-none border-stone-500 text-2xl p-0 font-mono font-extrabold text-stone-500 "  role="alert">
  Thank you!
  <button type="button" class="btn-close p-1" data-bs-dismiss="alert" aria-label="Close"></button>
</div>';
    } else {
         echo '<div id="ALERT" class="alert  alert-dismissible fade show  text-center bg-gradient-to-r from-amber-200 via-amber-100 to-amber-200  shadow-md rounded-none border-stone-500 text-2xl p-0 font-mono font-extrabold text-stone-500 "  role="alert">
  Servers are currently down.
  <button type="button" class="btn-close p-1" data-bs-dismiss="alert" aria-label="Close"></button>promo
</div>';
    }
}
 ?>


                                                            <!-- 3 col Container -->
    <div class="flex flex-col items-center  h-full justify-center  sm:px-0 overflow-hidden">
        <div class="flex  shadow-lg w-full sm:w-full lg:w-full bg-amber-300/75 sm:mx-0" style="height: 700px">

                                                                <!-- Promo Card -->
            <div class='hidden lg:flex flex-col justify-between place-content-stretch bg-gradient-to-r from-yellow-500 to-amber-200 lg:p-12 w-1/3'>
                                                                    <!-- Promo  Image -->
        <div class="flex items-center justify-center space-x-5 ">
          <img class=" fill-current  h-[250px] w-[270px]  mt-[100px]" focusable="false"  src="./indexUI/Promo.png">
          
        </div>

                                                                  <!-- Promo Bio -->
        <div class='space-y-12 grid place-content-center content-center '>
          <h1 class="lg:text-3xl xl:text-5xl  text-center font-extrabold text-stone-500" style="  font-family: 'Bebas Neue';">Promotions!</h1>
          <p class="text-lg text-center text-balance text-stone-500" style="  font-family: 'Bebas Neue';">Do you want to recieve promotions, loyalty programs and much more? If so click below to get started!</p>
                                                                                <!-- Promo Bio  Button-->
          <button
            class="bg-stone-500  sticky duration-500 border-2 border-stone-500 fixed   transform hover:-translate-y-[-5px] px-4 py-3 border-2 rounded-lg font-medium border-stone-500  text-white  hover:bg-gradient-to-r from-yellow-500 to-amber-200 hover:shadow-lg hover: hover:text-stone-500" data-bs-toggle="modal" data-bs-target="#promoModal" style="  font-family: 'Bebas Neue';">Be on the Promotion List!</button>
        </div>
                                                                  <!-- Promo Modal From Button-->
        <div class="modal fade" id="promoModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable ">
    <div class="modal-content grid bg-gradient-to-r from-amber-200 via-amber-100 to-amber-200 shadow-lg border-none rounded-lg">
                                                                         <!-- Feedback Modal Header logo -->
          <div class="flex items-center justify-center space-x-3 pt-4">
                  <img class=" fill-current  h-[45px] w-[45px]  mb-1" focusable="false"  src="./UI/logo.png">
                </div>        
                                                                          <!-- Promo Modal Header -->
      <div class="modal-header place-self-center text-3xl text-stone-500 p-3">
        <h1 class="modal-title font-extrabold " id="staticBackdropLabel" style="  font-family: 'Bebas Neue';">Be on the promotions list</h1>
      </div>
                                                                              <!-- Feedback Modal Body photo -->
                   <div class="flex items-center justify-center space-x-3 pt-6">
                  <img class=" fill-current  h-[125px] w-[125px]  mb-1" focusable="false"  src="./UI/misc.png">
                </div>  
                                                                        <!-- Promo Modal Body -->
      <div class="modal-body">
       
   <form class="text-center" action="functions/index/promolist.php" method="post">
  <label class="font-semibold text-2xl text-stone-500" style="  font-family: 'Bebas Neue';" for="full_name">Full Name:</label><br>
  <input style="  font-family: 'Bebas Neue';" class="text-center font-light mb-2 bg-gradient-to-r from-amber-500/25 via-amber-400/25 to-amber-300/25 border-none flex-grow h-8 px-2 border rounded" type="text" id="full_name" name="full_name" required><br>
  
  <label class="font-semibold text-2xl text-stone-500" style="  font-family: 'Bebas Neue';" for="email">Email:</label><br>
  <input  style="  font-family: 'Bebas Neue';" class="text-center font-light mb-2 bg-gradient-to-r from-amber-500/25 via-amber-400/25 to-amber-300/25 border-none flex-grow h-8 px-2 border rounded" type="email" id="email" name="email" required><br><br>
   
  
  <input class="font-bold text-3xl center text-stone-500 font-extrabold transition ease-in duration-200 transform hover:-translate-y-1 active:translate-y-0"  style="  font-family: 'Bebas Neue';" type="submit" value="Submit">
</form>

      </div>
                                                                        <!-- Promo Modal Footer -->
      <div class="modal-footer place-self-center">
        <button style="  font-family: 'Bebas Neue';" type="button" class="bg-stone-500  sticky duration-500 border-2 border-stone-500 fixed   transform hover:-translate-y-[-5px] px-2 py-2 border-2 rounded-lg font-medium border-stone-500  text-white hover:bg-gradient-to-r from-amber-200 via-amber-100 to-amber-200  hover:shadow-lg hover: hover:text-stone-500" data-bs-dismiss="modal">Close</button>
        
      </div>
    </div>
  </div>
</div>
      </div>
                                                                        <!-- Middle Card  -->
            <div class='lg:flex flex-col justify-between place-content-stretch bg-gradient-to-r from-amber-200 via-amber-100 to-amber-200  lg:p-12 w-1/3'>
                                                                    <!-- Logo + Name-->
        <div class="flex items-center justify-center space-x-3 ">
          <img class=" fill-current  h-[45px] w-[45px]  mb-1" focusable="false"  src="./UI/logo.png">
          <a href="#" class="text-5xl center text-stone-500 font-extrabold text-center" style="  font-family: 'Bebas Neue';">Mill House Cafe</a>
        </div>
                                                                      <!-- Middle Image -->
        <div class="flex items-center justify-center space-x-5 ">
          <img class=" fill-current  h-[350px] w-[350px]  mt-[0px]" focusable="false"  src="./indexUI/Hero.png">
          
        </div>

                                                                  <!-- Middle Bio -->
        <div class='space-y-8 grid place-content-center content-center '>
          <h1 class="lg:text-3xl xl:text-5xl  text-center font-extrabold text-stone-500 pt-2" style="  font-family: 'Bebas Neue';">Welcome to the Mill House</h1>
          <p class="text-lg text-center text-balance text-stone-500" style="  font-family: 'Bebas Neue';">Achieving your goals is  just a cup away.</p>
                                                                          <!-- Middle Bio Button -->
          <button
            class="bg-stone-500  sticky duration-500 border-2 border-stone-500 fixed   transform hover:-translate-y-[-5px] px-4 py-3 border-2 rounded-lg font-medium border-stone-500  text-white hover:bg-gradient-to-r from-amber-200 via-amber-100 to-amber-200  hover:shadow-lg hover: hover:text-stone-500 " data-bs-toggle="modal" data-bs-target="#menuModal" style="  font-family: 'Bebas Neue';">See Menu!</button>
        </div>
                                                                          <!-- Middle Modal from button -->
        <div class="modal fade" id="menuModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable ">
    <div class="modal-content grid bg-gradient-to-r from-amber-200 via-amber-100 to-amber-200 shadow-lg border-none rounded-lg">
                                                                        <!-- Feedback Modal Header logo -->
          <div class="flex items-center justify-center space-x-3 pt-4">
                  <img class=" fill-current  h-[45px] w-[45px]  mb-1" focusable="false"  src="./UI/logo.png">
                </div>                                                                 <!-- Middle Modal logo -->
      <div class="flex items-center justify-center space-x-3 pt-3">
          
          <a href="#" class="text-5xl center text-stone-500 font-extrabold text-center " style="  font-family: 'Bebas Neue';">Mill House</a>
        </div>
                                                                                  <!-- Middle Modal Header -->
      <div class="modal-header place-self-center text-3xl text-stone-500 p-3">
        <h1 class="modal-title  font-extrabold" id="staticBackdropLabel" style="  font-family: 'Bebas Neue';">Menu</h1>
      </div>
                                                                                                  
                                                                                  <!-- Middle Modal Body -->
      <div class="modal-body place-self-center text-stone-500">
       <div id="productTable">
         <table class="w-2/3">
           <thead style="  font-family: 'Bebas Neue';" class="bg-gradient-to-r from-amber-200/25 via-amber-100 to-amber-200/25  border-y border-stone-500 ">
                    <tr>
                      <th class="font-semibold  px-2 py-2 text-left">Product ID</th>
                      <th class="font-semibold  px-2 py-2 text-left">Name</th>
                      <th class="font-semibold  px-2 py-2 text-left">Price</th>
                      
                    </tr>
                  </thead>
                  <tbody  class="" style="  font-family: 'Bebas Neue';">
                    <?php $viewMenu1;
                     foreach ($website_menu as $menu): ?>
                    <tr class="">
                      <td class="bg-transparent border-b border-stone-500 px-2 py-1  text-md font-medium text-stone-500/75"><?php echo htmlspecialchars($menu['product_id']); ?></td>
                      <td class="bg-transparent border-b border-stone-500 px-2 py-1  text-md font-medium text-stone-500/75"><?php echo htmlspecialchars($menu['name']); ?></td>
                      <td class="bg-transparent border-b border-stone-500 px-2 py-1  text-md font-medium text-stone-500/75"><?php echo htmlspecialchars($menu['price']); ?></td>
                     
                     
                    </tr>
                    <?php endforeach; ?>
                  </tbody>
         </table>
       </div>
      </div>
                                                                                <!-- Middle Modal footer + button -->
      <div class="modal-footer place-self-center">
        <button type="button" class="bg-stone-500  sticky duration-500 border-2 border-stone-500 fixed   transform hover:-translate-y-[-5px] px-2 py-2 border-2 rounded-lg font-medium border-stone-500  text-white hover:bg-gradient-to-r from-amber-200 via-amber-100 to-amber-200  hover:shadow-lg hover: hover:text-stone-500" data-bs-dismiss="modal" style="  font-family: 'Bebas Neue';" >Close</button>
        
      </div>
    </div>
  </div>
</div>
      </div>

                                                              <!-- Feedback Card -->
      <div class='hidden lg:flex flex-col justify-between place-content-stretch bg-gradient-to-r from-amber-200 to-yellow-500 lg:p-12 w-1/3'>
                                                                    <!-- Right Small Logo + Name-->
        <div class="flex items-center justify-end space-x-3 ">
          <img class=" fill-current  h-8 w-8  mb-1" focusable="false"  src="./UI/employee.png">
          <a href="login.php" class="text-2xl center text-stone-500 font-extrabold transition ease-in duration-200 transform hover:-translate-y-1 active:translate-y-0" style="  font-family: 'Bebas Neue';">Employee Login</a>
        </div>
                                                                        <!-- feedback image -->
        <div class="flex items-center justify-center space-x-5 ">
          <img class=" fill-current  h-[222px] w-[322px]  mt-[66px]" focusable="false"  src="./indexUI/feedback.png">
          
        </div>

                                                                  <!-- Right Bio -->
        <div class='space-y-12 grid place-content-center content-center '>
          <h1 class="lg:text-3xl xl:text-5xl  text-center font-extrabold text-stone-500" style="  font-family: 'Bebas Neue';">Leave a review</h1>
          <p class="text-lg text-center text-balance text-stone-500" style="  font-family: 'Bebas Neue';">If you liked your food or drink please dont forget to leave a review, if you didnt we appreciate your reviews they will be closely monitored for further improvement!</p>

                                                                  <!-- Right Bio  Button-->
          <button
            class="bg-stone-500  sticky duration-500 border-2 border-stone-500 fixed   transform hover:-translate-y-[-5px] px-4 py-3 border-2 rounded-lg font-medium border-stone-500  text-white  hover:bg-gradient-to-r from-amber-200 to-yellow-500 hover:shadow-lg hover: hover:text-stone-500" data-bs-toggle="modal" data-bs-target="#feedbackModal" style="  font-family: 'Bebas Neue';">Leave Your Reviews Here!</button>

        </div>
                                                                            <!-- Feedback Modal From Button -->
        <div class="modal fade" id="feedbackModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable ">
    <div class="modal-content grid bg-gradient-to-r from-amber-200 via-amber-100 to-amber-200 shadow-lg border-none rounded-lg">
                                                                                  <!-- Feedback Modal Header logo -->
          <div class="flex items-center justify-center space-x-3 pt-4">
                  <img class=" fill-current  h-[45px] w-[45px]  mb-1" focusable="false"  src="./UI/logo.png">
                </div>        
                                                                                <!-- Feedback Modal Header -->

      <div class="modal-header place-self-center text-3xl text-stone-500 p-3">
        <h1 class="modal-title  font-extrabold " id="staticBackdropLabel" style="  font-family: 'Bebas Neue';">Leave Feedback</h1>
      </div>
                                                                                            <!-- Feedback Modal Body photo -->
                   <div class="flex items-center justify-center space-x-3 pt-12">
                  <img class=" fill-current  h-[125px] w-[125px]  mb-1" focusable="false"  src="./UI/feedback.png">
                </div>  
                                                                              <!-- Feedback Modal Body -->
      <div class="modal-body place-self-center m-8">
      
          <form action="" method="POST" class="text-center ">
            <form action="" method="POST">
              
  <label class="font-semibold text-2xl text-stone-500" style="  font-family: 'Bebas Neue';" for="full_name">Full Name:</label><br>
  <input  style="  font-family: 'Bebas Neue';" class="text-center font-light mb-2 bg-gradient-to-r from-amber-500/25 via-amber-400/25 to-amber-300/25 border-none flex-grow h-8 px-2 border rounded" type="text" id="fullname" name="fullname" required><br>
  
  <label class="font-semibold text-2xl text-stone-500" style="  font-family: 'Bebas Neue';" for="comment">Comment:</label><br>
  <textarea style="  font-family: 'Bebas Neue';" class="text-center font-light pb-8 mb-2 bg-gradient-to-r from-amber-500/25 via-amber-400/25 to-amber-300/25 border-none flex-grow h-20 px-2 border rounded" id="comment" name="comment" rows="4" required></textarea><br>
  <input class="hidden" type="number" name="rating" id="rating">
  
  <div>
     <div class="mb-2 " id="rateYo"></div>
  </div>

  

  
  <input class="font-bold text-3xl center text-stone-500 font-extrabold transition ease-in duration-200 transform hover:-translate-y-1 active:translate-y-0"  style="  font-family: 'Bebas Neue';" type="submit">
</form>
          </form>

      </div>
                                                                                                    <!-- Feedback Modal Footer + Button -->
      <div class="modal-footer place-self-center">
        <button style="  font-family: 'Bebas Neue';" type="button" class="bg-stone-500  sticky duration-500 border-2 border-stone-500 fixed   transform hover:-translate-y-[-5px] px-2 py-2 border-2 rounded-lg font-medium border-stone-500  text-white hover:bg-gradient-to-r from-amber-200 via-amber-100 to-amber-200  hover:shadow-lg hover: hover:text-stone-500" data-bs-dismiss="modal">Close</button>
        
      </div>
    </div>
  </div>
</div>
              </div>

                                                                                                          <!-- My copyright -->
        </div>
        <div class=" ">
          <p class="text-center font-medium text-stone-500 absolute inset-x-0 bottom-0" style="  font-family: 'Bebas Neue';">© 2024 Mill House</p>
        </div>
    </div>

</div>
<!-- JQuery insert -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
                  <!-- RateYo script for stars in feedback modal -->
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

                                                                                                          <!-- Bootstrap js insert -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
                                                                                 <!-- Rateyo js insert -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/rateYo/2.3.2/jquery.rateyo.min.js"></script>

</body>

</html>
