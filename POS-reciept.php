<?php 
  session_start();
  if(!isset($_SESSION['IMS_user'])) header('location: login.php'); //if user session is closed it will return you to the login. Therefore, trying to manually access the dashboard without entering user details will result in you being redirected the login page.
  $role = $_SESSION['IMS_user'];




 ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Mill House System</title>
                       <!-- CSS stylesheet -->
<link href="./CSS/dashboard.css" rel="stylesheet"  />
                            <!-- tailwindcss insert -->
  <script src="https://cdn.tailwindcss.com"></script>
                             <!-- Font Awesome stylesheet -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
                               <!-- Bootstrap Insert -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
                                         <!-- Font Awesome js insert -->
  <script src="https://kit.fontawesome.com/ffd6dc4165.js" crossorigin="anonymous"></script>
                                        <!-- gooogle font insert -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&display=swap" rel="stylesheet">

</head>
<body>
                                    <!-- background Container -->
  <div class="flex min-h-screen bg-gradient-to-tr from-zinc-100 via-amber-50 to-zinc-200">
                                  <!-- navfunction w-52-->
  <nav id="Sidebarcontainer" class="w-80 flex-shrink-0">
                                  <!-- sidenav backdrop-->
    <div class="flex-auto bg-amber-300 bg-opacity-25 backdrop-filter backdrop-blur-lg h-full ">
      <div class="flex flex-col  ">
                                            <!-- LOGO -->
        <ul class="relative m-0 p-0 list-none h-full  ">

          <li class=" text-white text-2xl p-4  text-center shadow-sm justify-center bg-gradient-to-r from-amber-500 via-amber-400 to-amber-300 border-b-2 border-amber-300 grid place-items-center " >
            <img class=" fill-current  h-12 w-12  mb-2" focusable="false"  src="./UI/logo.png">
            
          <span class=" bg-gradient-to-t from-slate-50 to-slate-50 bg-clip-text text-transparent text-5xl" style="  font-family: 'Bebas Neue';">  Mill House IMS </span>
          </li>
          <li class="text-black p-4 w-full flex relative shadow-sm justify-start bg-gradient-to-r from-amber-500 via-amber-400 to-amber-300">
            <div class="mr-4 flex-shrink-0 my-auto">
              
            </div>
            <!-- Profile Image -->
            <div class="grid place-content-center pr-4 my-1">
              <img src="./UI/barista.png" class="">
            </div>
          </li>
          <!-- Role Container -->
          <li class="p-4 w-full flex relative shadow-sm bg-gradient-to-r from-amber-500 via-amber-400 to-amber-300  border-amber-300 border-y-2 border-amber-300 ">
            <div class="flex-auto my-1 text-center">
              <span   class=" bg-gradient-to-t from-slate-50 to-slate-50 bg-clip-text text-transparent text-3xl" style="  font-family: 'Bebas Neue';"><?= $role['role'] ?></span>
            </div>
          </li>
                                                <!-- Side Nav - Dashboard -->
          <div class="text-blue-400 flex relative  hover:bg-amber-300/50 cursor-pointer btn-group dropend"  >
            <div class=" mr-4 my-auto ml-3 " onclick="dashpage()">
                   <img class=" fill-current mr-4 h-10 w-10 flex justify-center items-center"  src="./UI/dashboard.png" >
            </div>
            <div class="flex-auto my-3  btn-secondary" onclick="dashpage()">
              <span class=" bg-stone-500 bg-clip-text text-transparent text-3xl"  style="  font-family: 'Bebas Neue';">Dashboard</span>
            </div>

                                                                  <!-- dashboard dropdown -->
            <button type="button" class="bg-gradient-to-r from-amber-300/25 to-amber-500/25 border-b-2 border-amber-300/25 shadow-sm  btn  dropdown-toggle dropdown-toggle-split" data-bs-toggle="dropdown" aria-expanded="false">
<ul class="p-0 dropdown-menu bg-[#ffecc4] backdrop-filter backdrop-blur-lg rounded-none shadow-sm border-amber-300/25 w-72">
    
                                                                     <!-- dashboard dropdown Option 1-->
    <li class=" flex relative hover:bg-amber-300/50 text-center" onclick="notifpage()">
      
      <div class="flex-auto my-[12px] ">
      <a class="dropdown-item hover:bg-inherit bg-stone-500 bg-clip-text text-transparent hover:text-stone-500 text-3xl" style="  font-family: 'Bebas Neue'; "  href="#">Notifications </a>
      </div>

      <div class=" mr-4 my-auto ml-3">
      <img class=" fill-current  h-10 w-10 flex justify-center  " focusable="false"  src="./UI/notif.png">
      </div>
    </li>
                                                                    
                                                                     <!-- dashboard dropdown Option 2-->
    <li class=" flex relative hover:bg-amber-300/50 text-center" onclick="calenderpage()">
      
      <div class="flex-auto my-[12px] ">
      <a class="dropdown-item hover:bg-inherit bg-stone-500 bg-clip-text text-transparent hover:text-stone-500 text-3xl" style="  font-family: 'Bebas Neue'; " href="#">Calendar</a>
      </div>

      <div class=" mr-4 my-auto ml-3">
      <img class=" fill-current  h-10 w-10 flex justify-center  " focusable="false"  src="./UI/calendar.png">
      </div>
    </li>
  </ul>
          </div>

                                                  <!-- Side Nav - analytics -->

          <div class="text-blue-400 flex relative  hover:bg-amber-300/50 cursor-pointer btn-group dropend">
            <div class=" mr-4 my-auto ml-3" onclick="analyticspage()">
              <img class=" fill-current mr-4 h-10 w-10 flex justify-center items-center" focusable="false"  src="./UI/analytics.png">
            </div>
            <div class="flex-auto  my-3 btn-secondary" onclick="analyticspage()">
              <span   class=" bg-stone-500 bg-clip-text text-transparent text-3xl pr-[13px]" style="  font-family: 'Bebas Neue';">Analytics</span>
            </div>
                                                         <!-- Analytics dropdown -->
            <button type="button" class="bg-gradient-to-r from-amber-300/25 to-amber-500/25 border-b-2 border-amber-300/25 shadow-sm  btn  dropdown-toggle dropdown-toggle-split" data-bs-toggle="dropdown" aria-expanded="false">
<ul class="p-0 dropdown-menu bg-[#ffecc4] backdrop-filter backdrop-blur-lg rounded-none shadow-sm border-amber-300/25 w-72">
                                                        <!-- Analytics dropdown Option 1-->
    <li class=" flex relative hover:bg-amber-300/50 text-center" onclick="inventoryreportpage()">
      
      <div class="flex-auto my-[12px] ">
      <a class="dropdown-item hover:bg-inherit bg-stone-500 bg-clip-text text-transparent hover:text-stone-500 text-3xl" style="  font-family: 'Bebas Neue'; " href="#">Inventory Report </a>
      </div>

      <div class=" mr-4 my-auto ml-3">
      <img class=" fill-current  h-10 w-10 flex justify-center  " focusable="false"  src="./UI/invenR.png">
      </div>
    </li>
                                                             <!-- Analytics dropdown Option 2-->
    <li class=" flex relative hover:bg-amber-300/50 text-center" onclick="salesreportpage()">
      
      <div class="flex-auto my-[12px] ">
      <a class="dropdown-item hover:bg-inherit bg-stone-500 bg-clip-text text-transparent hover:text-stone-500 text-3xl" style="  font-family: 'Bebas Neue'; " href="#">Sales Report </a>
      </div>

      <div class=" mr-4 my-auto ml-3">
      <img class=" fill-current  h-10 w-10 flex justify-center  " focusable="false"  src="./UI/salesR.png">
      </div>
    </li>
                                                                   <!-- Analytics dropdown Option 3-->
   <li class=" flex relative hover:bg-amber-300/50 text-center"onclick="feedbackreportpage()">
      
      <div class="flex-auto my-[12px] ">
      <a class="dropdown-item hover:bg-inherit bg-stone-500 bg-clip-text text-transparent hover:text-stone-500 text-3xl" style="  font-family: 'Bebas Neue'; " href="#">Feedback Report </a>
      </div>

      <div class=" mr-4 my-auto ml-3">
      <img class=" fill-current  h-10 w-10 flex justify-center  " focusable="false"  src="./UI/feedbackreport.png">
      </div>
    </li>
 
  </ul>
          </div>
                                                    <!-- Side Nav - Inventory -->
          <div class="text-blue-400 flex relative  hover:bg-amber-300/50 cursor-pointer btn-group dropend" >
            <div class=" mr-4 my-auto ml-3" onclick="inventorypage()">
              <img class=" fill-current mr-4 h-10 w-10 flex justify-center items-center" focusable="false" src="./UI/inventory.png">
            </div>
            <div class="flex-auto  my-3 btn-secondary " onclick="inventorypage()">
              <span   class=" bg-stone-500 bg-clip-text text-transparent text-3xl pr-[10px] " style="  font-family: 'Bebas Neue';">Inventory</span>
            </div>
                                                          <!-- inventory dropdown -->
             <button type="button" class="bg-gradient-to-r from-amber-300/25 to-amber-500/25 border-b-2 border-amber-300/25 shadow-sm  btn  dropdown-toggle dropdown-toggle-split" data-bs-toggle="dropdown" aria-expanded="false">
<ul class="p-0 dropdown-menu bg-[#ffecc4] backdrop-filter backdrop-blur-lg rounded-none shadow-sm border-amber-300/25 w-72">
                                                          <!-- inventory dropdown Option 1-->
    <li class=" flex relative hover:bg-amber-300/50 text-center" onclick="ANPpage()">
      
      <div class="flex-auto my-[12px] ">
      <a class="dropdown-item hover:bg-inherit bg-stone-500 bg-clip-text text-transparent hover:text-stone-500 text-3xl" style="  font-family: 'Bebas Neue'; " href="#">Add New Product </a>
      </div>

      <div class=" mr-4 my-auto ml-3">
      <img class=" fill-current  h-10 w-10 flex justify-center  " focusable="false"  src="./UI/Products.png">
      </div>
    </li>
                                                                <!-- inventory dropdown Option 2-->
    <li class=" flex relative hover:bg-amber-300/50 text-center" onclick="quantitypage()">
      
      <div class="flex-auto my-[12px] ">
      <a class="dropdown-item hover:bg-inherit bg-stone-500 bg-clip-text text-transparent hover:text-stone-500 text-3xl" style="  font-family: 'Bebas Neue'; " href="#">Quantity </a>
      </div>

      <div class=" mr-4 my-auto ml-3">
      <img class=" fill-current  h-10 w-10 flex justify-center  " focusable="false"  src="./UI/ProductQ.png">
      </div>
    </li>
                                                              <!-- inventory dropdown Option 3-->
   <li class=" flex relative hover:bg-amber-300/50 text-center" onclick="AQLpage()">
      
      <div class="flex-auto my-[12px] ">
      <a class="dropdown-item hover:bg-inherit bg-stone-500 bg-clip-text text-transparent hover:text-stone-500 text-3xl" style="  font-family: 'Bebas Neue'; " href="#">Add Quantity List</a>
      </div>

      <div class=" mr-4 my-auto ml-3">
      <img class=" fill-current  h-10 w-10 flex justify-center  " focusable="false"  src="./UI/AQL.png">
      </div>
    </li>
                                                                  <!-- inventory dropdown Option 4-->
    <li class=" flex relative hover:bg-amber-300/50 text-center" onclick="ingredientspage()">
      
      <div class="flex-auto my-[12px] ">
      <a class="dropdown-item hover:bg-inherit bg-stone-500 bg-clip-text text-transparent hover:text-stone-500 text-3xl" style="  font-family: 'Bebas Neue'; " href="#">Ingredients </a>
      </div>

      <div class=" mr-4 my-auto ml-3">
      <img class=" fill-current  h-10 w-10 flex justify-center  " focusable="false"  src="./UI/ingredient.png">
      </div>
    </li>
                                                            <!-- inventory dropdown Option 5-->
    <li class=" flex relative hover:bg-amber-300/50 text-center" onclick="addIpage()">
      
      <div class="flex-auto my-[12px] ">
      <a class="dropdown-item hover:bg-inherit bg-stone-500 bg-clip-text text-transparent hover:text-stone-500 text-3xl" style="  font-family: 'Bebas Neue'; " href="#">Add Ingredients </a>
      </div>

      <div class=" mr-4 my-auto ml-3">
      <img class=" fill-current  h-10 w-10 flex justify-center  " focusable="false"  src="./UI/ingredientquantity.png">
      </div>
    </li>
  </ul>
          </div>
                                                    <!-- Side Nav - POS - "selected"  "shadow-sm" -->
          <div class=" flex relative  hover:bg-amber-300/50 bg-amber-300/50 shadow-sm cursor-pointer btn-group dropend" >
            <div class=" mr-4 my-auto ml-3" onclick="POSpage()">
              <img class=" fill-current mr-4 h-10 w-10 flex justify-center items-center" focusable="false" src="./UI/POS.png">
            </div>
            <div class="flex-auto  my-3 btn-secondary selected" onclick="POSpage()">
              <span  id="shrinktxt" class=" bg-stone-500 bg-clip-text text-transparent text-3xl " style="  font-family: 'Bebas Neue';">Point Of Sale</span>
            </div>
                                                          <!-- POS dropdown -->
            <button id="POSBO" type="button" class="w-11 bg-gradient-to-r from-amber-300/25 to-amber-500/25 border-b-2 border-amber-300/25 shadow-sm  btn  dropdown-toggle dropdown-toggle-split" data-bs-toggle="dropdown" aria-expanded="false">
<ul class="p-0 dropdown-menu bg-[#ffecc4] backdrop-filter backdrop-blur-lg rounded-none shadow-sm border-amber-300/25 w-72">
                                                                <!-- POS dropdown Option 1-->
    <li class=" flex relative hover:bg-amber-300/50 text-center bg-amber-300/50" onclick="recieptpage()">
      
      <div class="flex-auto my-[12px] selected">
      <a class="dropdown-item hover:bg-inherit bg-stone-500 bg-clip-text text-transparent hover:text-stone-500 text-3xl" style="  font-family: 'Bebas Neue'; " href="#">Reciept</a>
      </div>

      <div class=" mr-4 my-auto ml-3">
      <img class=" fill-current  h-10 w-10 flex justify-center  " focusable="false"  src="./UI/Reciept.png">
      </div>
    </li>
                                                              <!-- POS dropdown Option 2-->
    <li class=" flex relative hover:bg-amber-300/50 text-center" onclick="orderspage()">
      
      <div class="flex-auto my-[12px] ">
      <a class="dropdown-item hover:bg-inherit bg-stone-500 bg-clip-text text-transparent hover:text-stone-500 text-3xl" style="  font-family: 'Bebas Neue'; " href="#">Orders</a>
      </div>

      <div class=" mr-4 my-auto ml-3">
      <img class=" fill-current  h-10 w-10 flex justify-center  " focusable="false"  src="./UI/orders.png">
      </div>
    </li>
                                                              <!-- POS dropdown Option 3-->
    <li class=" flex relative hover:bg-amber-300/50 text-center" onclick="leaveFdbkpage()">
      
      <div class="flex-auto my-[12px] ">
      <a class="dropdown-item hover:bg-inherit bg-stone-500 bg-clip-text text-transparent hover:text-stone-500 text-3xl" style="  font-family: 'Bebas Neue'; " href="#">Leave Feedback </a>
      </div>

      <div class=" mr-4 my-auto ml-3">
      <img class=" fill-current  h-10 w-10 flex justify-center  " focusable="false"  src="./UI/POSFB.png">
      </div>
    </li>
                                                         
    
  </ul>
          </div>
                                                        <!-- Side Nav - CRM -->
          <div class="text-blue-400 flex relative  hover:bg-amber-300/50 cursor-pointer btn-group dropend">
            <div class=" mr-4 my-auto ml-3" onclick="CRMpage()">
              <img class=" fill-current mr-4 h-10 w-10 flex justify-center items-center" focusable="false"  src="./UI/CRM.png">
            </div>
            <div class="flex-auto  my-3 btn-secondary" onclick="CRMpage()">
              <span   class=" bg-stone-500 bg-clip-text text-transparent text-3xl pr-[69px]" style="  font-family: 'Bebas Neue';">CRM</span>
            </div>
                                                        <!-- CRM dropdown -->
            <button type="button" class="bg-gradient-to-r from-amber-300/25 to-amber-500/25 border-b-2 border-amber-300/25 shadow-sm  btn  dropdown-toggle dropdown-toggle-split" data-bs-toggle="dropdown" aria-expanded="false">
<ul class="p-0 dropdown-menu bg-[#ffecc4] backdrop-filter backdrop-blur-lg rounded-none shadow-sm border-amber-300/25 w-72">
                                                  
                                                              <!-- CRM dropdown Option 1-->
    <li class=" flex relative hover:bg-amber-300/50 text-center" onclick="LPpage()">
      
      <div class="flex-auto my-[12px] ">
      <a class="dropdown-item hover:bg-inherit bg-stone-500 bg-clip-text text-transparent hover:text-stone-500 text-3xl" style="  font-family: 'Bebas Neue'; " href="#">Loyalty Program </a>
      </div>

      <div class=" mr-4 my-auto ml-3">
      <img class=" fill-current  h-10 w-10 flex justify-center  " focusable="false"  src="./UI/Loyalty.png">
      </div>
    </li>

                                                            <!-- CRM dropdown Option 2-->
   <li class=" flex relative hover:bg-amber-300/50 text-center" onclick="instorefdbkpage()">
      
      <div class="flex-auto my-[12px] ">
      <a class="dropdown-item hover:bg-inherit bg-stone-500 bg-clip-text text-transparent hover:text-stone-500 text-3xl" style="  font-family: 'Bebas Neue'; " href="#">Instore Feedback </a>
      </div>

      <div class=" mr-4 my-auto ml-3">
      <img class=" fill-current  h-10 w-10 flex justify-center  " focusable="false"  src="./UI/feedback.png">
      </div>
    </li>
     <!-- CRM dropdown Option 3-->
   <li class=" flex relative hover:bg-amber-300/50 text-center" onclick="websitefdbkpage()">
      
      <div class="flex-auto my-[12px] ">
      <a class="dropdown-item hover:bg-inherit bg-stone-500 bg-clip-text text-transparent hover:text-stone-500 text-3xl" style="  font-family: 'Bebas Neue'; " href="#">Website Feedback </a>
      </div>

      <div class=" mr-4 my-auto ml-3">
      <img class=" fill-current  h-10 w-10 flex justify-center  " focusable="false"  src="./UI/members.png">
      </div>
    </li>
                                                            <!-- CRM dropdown Option 3-->
    <li class=" flex relative hover:bg-amber-300/50 text-center" onclick="promotionspage()">
      
      <div class="flex-auto my-[12px] ">
      <a class="dropdown-item hover:bg-inherit bg-stone-500 bg-clip-text text-transparent hover:text-stone-500 text-3xl" style="  font-family: 'Bebas Neue'; " href="#">Promotions </a>
      </div>

      <div class=" mr-4 my-auto ml-3">
      <img class=" fill-current  h-10 w-10 flex justify-center  " focusable="false"  src="./UI/Promotion.png">
      </div>
    </li>
                                                                <!-- CRM dropdown Option 4-->
    <li class=" flex relative hover:bg-amber-300/50 text-center" onclick="mailpage()">
      
      <div class="flex-auto my-[12px] ">
      <a class="dropdown-item hover:bg-inherit bg-stone-500 bg-clip-text text-transparent hover:text-stone-500 text-3xl" style="  font-family: 'Bebas Neue'; " href="#">Mail </a>
      </div>

      <div class=" mr-4 my-auto ml-3">
      <img class=" fill-current  h-10 w-10 flex justify-center  " focusable="false"  src="./UI/mail.png">
      </div>
    </li>
  </ul>
          </div>
                                                       <!-- Side Nav - User Management -->
          <div class="text-blue-400 flex relative  hover:bg-amber-300/50 cursor-pointer btn-group dropend">
            <div class=" mr-4 my-auto ml-3" onclick="managementpage()">
              <img class=" fill-current mr-4 h-10 w-10 flex justify-center items-center" focusable="false"  src="./UI/security.png">
            </div>
            <div class="flex-auto  my-3 btn-secondary" onclick="managementpage()">
              <span id="shrinktxt2"  class=" bg-stone-500 bg-clip-text text-transparent text-3xl" style="  font-family: 'Bebas Neue';">Management</span>
            </div>
                                                            <!-- UserManagement dropdown -->
            <button type="button" id="ManBo" class="w-[41px] bg-gradient-to-r from-amber-300/25 to-amber-500/25 border-b-2 border-amber-300/25 shadow-sm  btn  dropdown-toggle dropdown-toggle-split" data-bs-toggle="dropdown" aria-expanded="false">
<ul class="p-0 dropdown-menu bg-[#ffecc4] backdrop-filter backdrop-blur-lg rounded-none shadow-sm border-amber-300/25 w-72">
                                                            <!-- Managment dropdown Option 1-->
    <li class=" flex relative hover:bg-amber-300/50 text-center" onclick="employeepage()">
      
      <div class="flex-auto my-[12px] ">
      <a class="dropdown-item hover:bg-inherit bg-stone-500 bg-clip-text text-transparent hover:text-stone-500 text-3xl" style="  font-family: 'Bebas Neue'; " href="#">Employees </a>
      </div>

      <div class=" mr-4 my-auto ml-3">
      <img class=" fill-current  h-10 w-10 flex justify-center  " focusable="false"  src="./UI/employee.png">
      </div>
    </li>
                                                          <!-- Managment dropdown Option 2-->
    <li class=" flex relative hover:bg-amber-300/50 text-center" onclick="Addemployeepage()">
      
      <div class="flex-auto my-[12px] ">
      <a class="dropdown-item hover:bg-inherit bg-stone-500 bg-clip-text text-transparent hover:text-stone-500 text-3xl" style="  font-family: 'Bebas Neue'; " href="#">Add Employee </a>
      </div>

      <div class=" mr-4 my-auto ml-3">
      <img class=" fill-current  h-10 w-10 flex justify-center  " focusable="false"  src="./UI/employeeadd.png">
      </div>
    </li>
                                                            <!-- Management dropdown Option 3-->
   <li class=" flex relative hover:bg-amber-300/50 text-center" onclick="LRpage()">
      
      <div class="flex-auto my-[12px] ">
      <a class="dropdown-item hover:bg-inherit bg-stone-500 bg-clip-text text-transparent hover:text-stone-500 text-3xl" style="  font-family: 'Bebas Neue'; " href="#">Login Requests </a>
      </div>

      <div class=" mr-4 my-auto ml-3">
      <img class=" fill-current  h-10 w-10 flex justify-center  " focusable="false"  src="./UI/misc.png">
      </div>
    </li>
                                                          <!-- Managment dropdown Option 4-->
   <li class=" flex relative hover:bg-amber-300/50 text-center" onclick="schedulepage()">
      
      <div class="flex-auto my-[12px] ">
      <a class="dropdown-item hover:bg-inherit bg-stone-500 bg-clip-text text-transparent hover:text-stone-500 text-3xl" style="  font-family: 'Bebas Neue'; " href="#">Schedule </a>
      </div>

      <div class=" mr-4 my-auto ml-3">
      <img class=" fill-current  h-10 w-10 flex justify-center  " focusable="false"  src="./UI/schedule.png">
      </div>
    </li>
                                                      <!-- Managment dropdown Option 5-->
    <li class=" flex relative hover:bg-amber-300/50 text-center" onclick="addshiftpage()">
      
      <div class="flex-auto my-[12px] ">
      <a class="dropdown-item hover:bg-inherit bg-stone-500 bg-clip-text text-transparent hover:text-stone-500 text-3xl" style="  font-family: 'Bebas Neue'; " href="#">Add Shift </a>
      </div>

      <div class=" mr-4 my-auto ml-3">
      <img class=" fill-current  h-10 w-10 flex justify-center  " focusable="false"  src="./UI/addshift.png">
      </div>
    </li>
                                                      
  </ul>
          </div>
        </ul>
      </div>
    </div>
  </nav>
                                                <!-- Top nav -->
  <div class="flex flex-col w-full">
    <header class="text-white bg-gradient-to-r from-amber-300 to-amber-500 border-b-2 border-amber-300 bg-opacity-25  left-auto top-0 right-0">

      <div class="h-12 px-6 flex relative items-center justify-end">
        <button id="fsButton" class="flex  text-white hover:text-gray-200 focus:outline-none pr-3">
<img class="h-7 w-7"  src="./UI/fullscreen.png">
        </button>
        <button id="SidebarBO" class="flex 0 text-white hover:text-gray-200 focus:outline-none absolute  left-0">
<img class="h-8 w-8"  src="./UI/menu.png">
        </button>
                                                     <!-- NOtif Dropdown -->
        <button class="flex mx-2 btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
<img class="h-6 w-6"  src="./UI/notification.png">
        </button>
        <ul class="text-2xl font-mono rounded-lg text-center py-3  dropdown-menu bg-gradient-to-r from-amber-300/25 to-amber-500/25 border-b-2 border-amber-300/25 shadow-sm ">
          <h1 class="font-extrabold text-stone-500 py-1"><i class="fa-solid fa-check"></i> Notifcations</h1>
          <li><hr class="dropdown-divider "></li>
          <ul class="notif text-1xl"></ul>
    
    <li><a class="font-bold hover:text-white text-stone-500 py-1 hover:bg-amber-300/35 dropdown-item" href="./dashboard-notifications.php">view more</a></li>
  </ul>
                                                          <!-- logout dropdown -->
        <button class=" h-8 w-8  btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
          <img class="h-full w-full object-cover" src="./UI/barista.png" alt="ProfileLogout">
        </button>
         <ul class="text-2xl font-mono  rounded-lg text-center py-2  dropdown-menu bg-gradient-to-r from-amber-300/25 to-amber-500/25 border-b-2 border-amber-300/25 shadow-sm uppercase">
          <h1 class="font-extrabold text-stone-500 py-1"><i class="fa-solid fa-mug-hot"></i> Settings</h1>
          <li><hr class="dropdown-divider"></li>
    <li><a class="font-extrabold hover:text-white text-stone-500 py-2 hover:bg-amber-300/35 dropdown-item" href="./functions/dashboardContainer/loguserout.php">Log Out  <i class="fa-solid fa-door-open fa-beat fa-lg" style="color: #74C0FC; --fa-animation-duration: 2s; --fa-beat-scale: 1.2;"  ></i></a></li>
   
    
  </ul>
      </div>

    </header>
                                                             <!-- Title container + page links -->
    <div class="text-black  p-1  
              
               shadow-inner border-b-2 border-white bg-amber-300 bg-opacity-10 backdrop-filter backdrop-blur-lg flex flex-shrink-0 flex-col">
               <?php

if (isset($_GET['message'])) {
    $reqmessage = $_GET['message'];
    if ($reqmessage == "success") {
         echo '<div id="ALERT" class="alert  alert-dismissible fade show  text-center  bg-gradient-to-r from-amber-200/25 via-amber-100/25 to-amber-200/25  shadow-inner rounded-bl-full border-stone-500/25 mt-0  p-0 font-mono font-extralight text-stone-500 "  role="alert">
  Thank you!
  <button type="button" class="btn-close p-1" data-bs-dismiss="alert" aria-label="Close"></button>
</div>';
    } 
    
}
 ?>

      <div class="flex items-start p-4 h-12" >
        <span class="text-2xl tracking-wide flex items-start p-1 h-12 self-start bg-stone-500 bg-clip-text bg-clip-text text-transparent text-4xl" style="  font-family: 'Bebas Neue';
        ">Point of Sale</span>
                                                          <!-- page links -->
         
      </div>
      <div class="flex overflow-hidden h-6 ml-12 justify-end tracking-wide  " >
        <button class="mx-3  transition ease-in duration-200 transform hover:-translate-y-1 active:translate-y-0" style="  font-family: 'Bebas Neue'; " onclick="POSpage()">
          <span>Point Of Sale</span>
        </button>

        <button class="mx-3 border-b-2 border-amber-300 transition ease-in duration-200 transform hover:-translate-y-1 active:translate-y-0" style="  font-family: 'Bebas Neue'; " onclick="recieptpage()">
          <span>Reciept</span>
        </button>

        <button class="mx-3 transition ease-in duration-200 transform hover:-translate-y-1 active:translate-y-0" style="  font-family: 'Bebas Neue'; " onclick="orderspage()">
          <span>Orders</span>
        </button>

        <button class="mx-3 transition ease-in duration-200 transform hover:-translate-y-1 active:translate-y-0 border-white" style="  font-family: 'Bebas Neue'; " onclick="leaveFdbkpage()">
          <span>Leave Feedback</span>
        </button>

      </div>

      

  
  </div>
  <div id="content_container" class="h-[850px]  w-full  overflow-x-hidden text-center p-2" style="  font-family: 'Bebas Neue';  ">
<?php include('functions/POS/receiptTable.php'); ?>

  </div>


</div>
                                                    <!-- Bootstrap js insert -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
                                                    <!-- top nav functions -->
                <script type="text/javascript" src="./UIJS/fullscreen.js"></script>
                <script type="text/javascript" src="./UIJS/sidebarbutton.js"></script>

                <script type="text/javascript" src="./UIJS/notifications.js"></script>
                <script type="text/javascript" src="./UIJS/sitelinks.js"></script>
                

                


</body>
</html>