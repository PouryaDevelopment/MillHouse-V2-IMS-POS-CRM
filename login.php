<?php
session_start();
if(isset($_SESSION['IMS_user'])) header('Location: dashboard.php'); // Redirect the user if already logged in.

$sql_connection_error = '';  
if($_POST){
    include('functions/index/connection2data.php'); 

    $username = $_POST['username'];            
    $password = $_POST['password'];

    $query = 'SELECT * FROM users WHERE email = :username AND password = :password'; 
    $runveri = $connection->prepare($query);
    $runveri->bindParam(':username', $username);  
    $runveri->bindParam(':password', $password); // This binds the username password parameter.
    $runveri->execute();

    if($runveri->rowCount() > 0) {
        $runveri->setFetchMode(PDO::FETCH_ASSOC);
        $client = $runveri->fetch(); 
        $_SESSION['IMS_user'] = $client; 
        $_SESSION['IMS_user_role'] = $client['role']; // this is for the sidebar to have a variable to ensure logging in with a different role will change the dashboard title

        header('Location: dashboard.php');
    } else {
        $sql_connection_error = 'Wrong login details!'; 
    }
}
?>
<!DOCTYPE html>
<html>
<head>
<title>Title of the document</title>

                                                                                      <!-- BootStrap css insert -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
<script src="https://cdn.tailwindcss.com"></script>
 <!-- gooogle font insert -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&display=swap" rel="stylesheet">
<!-- gooogle font css + animations -->
<style type="text/css">
    .bebas-neue-regular {
  font-family: "Bebas Neue", sans-serif;
  font-weight: 400;
  font-style: normal;
}
.titleanim{animation:titleanim 1.5s ease-in alternate}
@keyframes titleanim{0%{transform:translateX(-1000px);opacity:0}100%{transform:translateX(0);opacity:1}}

.logodrop {
  animation: logodrop 0.5s cubic-bezier(0.250, 0.460, 0.450, 0.940) 0.5s both;
}
@keyframes logodrop {
  0% {
    transform: translateY(-1000px);
    opacity: 0;
  }
  100% {
    transform: translateY(0);
    opacity: 1;
  }
}


.rightanim {
    animation: rightanim 0.8s cubic-bezier(0.230, 1.000, 0.320, 1.000) 3s both;
}
@keyframes rightanim {
  0% {
    transform: translateX(1000px) scaleX(2.5) scaleY(0.2);
    transform-origin: 0% 50%;
    filter: blur(40px);
    opacity: 0;
  }
  100% {
    transform: translateX(0) scaleY(1) scaleX(1);
    transform-origin: 50% 50%;
    filter: blur(0);
    opacity: 1;
  }
}
.rightbio {
    animation: rightbio 1s cubic-bezier(0.390, 0.575, 0.565, 1.000) 2s both;
}
@keyframes rightbio {
  0% {
    transform: translateZ(-80px);
    opacity: 0;
  }
  100% {
    transform: translateZ(0);
    opacity: 1;
  }
}
.loginformfade {
    animation: loginformfade 1.1s cubic-bezier(0.390, 0.575, 0.565, 1.000) 4s both;
}
@keyframes loginformfade {
  0% {
    transform: translateY(50px);
    opacity: 0;
  }
  100% {
    transform: translateY(0);
    opacity: 1;
  }
}
</style>
</head>

<body>
                                                                <!-- Background -->
<div class=" h-screen w-screen overflow-hidden" style="background: url('./loginpage/loginbg.jpg'); background-size: cover; background-position: center center;">
  <?php

if (isset($_GET['message'])) {
    $reqmessage = $_GET['message'];
    if ($reqmessage == "success") {
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
 <?php if(!empty($sql_connection_error)) { ?>
    <div id="ALERT" class="alert  alert-dismissible fade show  text-center bg-gradient-to-r from-amber-200 via-amber-100 to-amber-200  shadow-md rounded-none border-stone-500 text-2xl p-0 font-mono font-extrabold text-stone-500 "  role="alert">
  Error: <?= $sql_connection_error ?> 
  <button type="button" class="btn-close p-1" data-bs-dismiss="alert" aria-label="Close"></button>
</div>'
        <p></p> 
    
    <?php } ?>
                                                            <!-- Login Container -->
    <div class="flex flex-col items-center  h-full justify-center  sm:px-0 overflow-hidden">
        <div class="flex  shadow-lg w-full sm:w-full lg:w-full bg-amber-300/75 sm:mx-0" style="height: 700px">
            <div class="flex flex-col w-full md:w-1/2 p-4">
                                                                    <!-- Title -->
                <div class="flex flex-col flex-1 justify-center ">
                    <h1 class="text-5xl  text-center font-extrabold text-stone-500 pb-2 titleanim" style="  font-family: 'Bebas Neue';">Mill House</h1>
                                                                <!-- Logo -->
                    <img class="h-20 w-20 self-center logodrop" focusable="false"  src="./UI/logo.png">




                                                                <!-- Login title and Form -->
                    <h1 class="text-5xl  text-center font-extrabold text-stone-500 pt-12 mt-[140px] loginformfade" style="  font-family: 'Bebas Neue';">Log In</h1>
                    <div class="w-full mt-12">
                        <form class="form-horizontal w-1/2 mx-auto loginformfade" method="POST" action="login.php">
                            <div class="flex flex-col mt-3 ">
                                <input id="username"  class="bg-gradient-to-r from-amber-500/25 via-amber-400/25 to-amber-300/25 border-b-2 border-amber-300/25 flex-grow h-8 px-2 border rounded " name="username" type="text" placeholder="Email" style="  font-family: 'Bebas Neue';">
                            </div>
                            <div class="flex flex-col mt-3">
                                <input id="password" type="password" class="bg-gradient-to-r from-amber-500/25 via-amber-400/25 to-amber-300/25 border-b-2 border-amber-300/25 flex-grow h-8 px-2 border rounded" name="password" required placeholder="Password" style="  font-family: 'Bebas Neue';">
                            </div>
                            
                            <div class="flex flex-col mt-8">
                                <button type="submit" class="bg-stone-500  sticky duration-500 border-2 border-stone-500 fixed   transform hover:-translate-y-[-5px]   px-1 py-1 border-2 rounded-lg font-medium  hover:bg-gradient-to-r from-amber-200 to-yellow-500 hover:shadow-lg hover: hover:text-stone-500 text-white" style="  font-family: 'Bebas Neue';">
                                    Login
                                </button>
                            </div>
                        </form>
                        
                    </div>
                </div>
            </div> 
                                                                        <!-- Side Container -->
            <div class='hidden lg:flex flex-col justify-between place-content-stretch bg-gradient-to-r from-amber-200 to-yellow-500 lg:p-12 '>
                                                                    <!-- Right Small Logo + Name-->
        <div class="flex items-center justify-end space-x-3 rightanim">
          <img class=" fill-current  h-8 w-8  mb-1" focusable="false"  src="./UI/logo.png">
          <a href="#" class="text-2xl center text-stone-500 font-extrabold" style="  font-family: 'Bebas Neue';">Mill House Cafe</a>
        </div>

                                                                  <!-- Right Bio -->
        <div class='space-y-12 grid place-content-center content-center rightbio'>
          <h1 class="lg:text-3xl xl:text-5xl  text-center font-extrabold text-stone-500" style="  font-family: 'Bebas Neue';">Dont have an account?</h1>
          <p class="text-lg text-center text-balance text-stone-500" style="  font-family: 'Bebas Neue';">Unfortunatley, the Mill House system requires an Admin to give you login details, however new employees that haven't been given details can request it from a staff member.</p>
          <button
            class="dropdown-toggle bg-stone-500  sticky duration-500 border-2 border-stone-500 fixed   transform hover:-translate-y-[-5px] px-4 py-3 border-2 rounded-lg font-medium border-stone-500  text-white  hover:bg-gradient-to-r from-amber-200 to-yellow-500 hover:shadow-lg hover: hover:text-stone-500" type="button" data-bs-toggle="dropdown" aria-expanded="false"  style="  font-family: 'Bebas Neue';">Request Account Here</button>
           
    <form  class="dropdown-menu text-center w-full  bg-transparent border-none " action="functions/login/accreq.php" method="POST">  
<label class="font-semibold text-2xl text-stone-500" style="  font-family: 'Bebas Neue';" for="full_name">Full Name:</label><br>
  <input style="  font-family: 'Bebas Neue';" class="text-center font-light mb-2 bg-gradient-to-r from-amber-500/25 via-amber-400/25 to-amber-300/25 border-none flex-grow h-8 px-2 border rounded" type="text" id="full_name" name="full_name" required><br>
  
  <label class="font-semibold text-2xl text-stone-500" style="  font-family: 'Bebas Neue';" for="phonenumber">Phone Number:</label><br>
  <input  style="  font-family: 'Bebas Neue';" class="text-center font-light mb-2 bg-gradient-to-r from-amber-500/25 via-amber-400/25 to-amber-300/25 border-none flex-grow h-8 px-2 border rounded" type="text"   id="phonenumber" name="phonenumber" required><br><br>

<input class="font-bold text-3xl center text-stone-500 font-extrabold transition ease-in duration-200 transform hover:-translate-y-1 active:translate-y-0"  style="  font-family: 'Bebas Neue';" type="submit" value="Submit">


    </form>
    
        </div>
        <div>
          <br>
          <p class="text-center font-medium text-stone-500 sticky rightanim" style="  font-family: 'Bebas Neue';">  2024 Mill House</p>
        </div>
        
      </div>

        </div>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>
