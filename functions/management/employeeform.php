<!DOCTYPE html>
<html lang="en">
<body>
    <h2 class="text-3xl py-3">Add Employee</h2>
  <div class="flex justify-center mb-6">
        <img class="h-[200px] w-[200px]  "  src="./UI/employee.png">
    </div>
   <div class="flex justify-center content-center h-[500px] items-center ">
    <form  method="POST" action="./functions/management/create_user.php">
        <label class="text-2xl" for="first_name">First Name:</label><br>
        <input class="text-center bg-gradient-to-r from-amber-500/25 via-amber-400/25 to-amber-300/25 border-none   rounded w-[200px]" type="text" id="first_name" name="first_name" required><br><br>

        <label class="text-2xl" for="last_name">Last Name:</label><br>
        <input class="text-center bg-gradient-to-r from-amber-500/25 via-amber-400/25 to-amber-300/25 border-none   rounded w-[200px]" type="text" id="last_name" name="last_name" required><br><br>

        <label class="text-2xl" for="email">Email:</label><br>
        <input class="text-center bg-gradient-to-r from-amber-500/25 via-amber-400/25 to-amber-300/25 border-none   rounded w-[200px]" type="email" id="email" name="email" required><br><br>

        <label class="text-2xl" for="password">Password:</label><br>
        <input class="text-center bg-gradient-to-r from-amber-500/25 via-amber-400/25 to-amber-300/25 border-none   rounded w-[200px]" type="password" id="password" name="password" required><br><br>

        <label class="text-2xl" for="role">Role:</label><br>
        <select class="text-center bg-gradient-to-r from-amber-500/25 via-amber-400/25 to-amber-300/25 border-none   rounded text-2xl w-[200px]" id="role" name="role">
            <option  value="Employee">Employee</option>
            <option value="Manager">Manager</option>
            <option value="Barista">Barista</option>
            <option value="Cashier">Cashier</option>
            <option value="Chef">Chef</option>
        </select><br><br>

        <label for="branch_id">Branch ID:</label><br>
        <select class="text-center bg-gradient-to-r from-amber-500/25 via-amber-400/25 to-amber-300/25 border-none   rounded text-2xl w-[200px]" id="branch" name="branch_id">
            <option value="1">1 - Downtown</option>
            <option value="2">2 - Uptown</option>
            <option value="3">3 - Midtown</option>
            <option value="4">4 - Eastside</option>
        </select><br><br>

       <button class="flex justify-center transition ease-in duration-200 transform hover:-translate-y-1 active:translate-y-0 ml-7">
    <input class="font-bold text-3xl center  font-extrabold "  style="  font-family: 'Bebas Neue';" type="submit" value="create user">
    <img class="h-7 w-7 ml-1 "  src="./UI/employeeadd.png">
  </button>
    </form>
</div>
</body>
</html>