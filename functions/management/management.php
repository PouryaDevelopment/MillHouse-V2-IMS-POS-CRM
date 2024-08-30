<!DOCTYPE html>
<html lang="en">
<head>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body>
<div class="w-full ">
    <!-- Status cards -->
<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mb-6 mt-2">
     <!-- Shift Card -->
            <div class="bg-amber-300 text-white p-4 rounded-lg shadow-lg">
                <div class="flex items-center">
                    <div class="">
                        <img class="h-[100px] w-[100px] "  src="./UI/calendar.png"> 
                    </div>
                    <div class="w-[310px]">
                        <p class="text-2xl font-semibold">Total Shifts Today:</p>
                        <p id="shiftCount" class="text-4xl font-bold"></p>
                    </div>
                </div>
            </div>
            <!-- Total Employees Card -->
            <div class="bg-amber-400 text-white p-4 rounded-lg shadow-lg">
                <div class="flex items-center">
                    <div class="">
                        <img class="h-[100px] w-[100px] "  src="./UI/employee.png"> 
                    </div>
                    <div class="w-[310px]">
                        <p class="text-2xl font-semibold">Total Employees:</p>
                        <p id="totalUsersCount" class="text-4xl font-bold"></p>
                    </div>
                </div>
            </div>
            <!-- Total Login Requests Card -->
            <div class="bg-amber-500 text-white p-4 rounded-lg shadow-lg">
                <div class="flex items-center">
                    <div class="">
                        <img class="h-[100px] w-[100px] "  src="./UI/employeeadd.png"> 
                    </div>
                    <div class="w-[310px]">
                        <p class=" text-2xl font-semibold">TOTAL LOGIN REQUESTS:</p>
                        <p id="totalLoginRequests" class="text-4xl font-bold"></p>
                    </div>
                </div>
            </div>
           
            
        </div>
        <div class="flex justify-center flex-wrap -mx-6">
            <div class="w-full md:w-1/2 lg:w-1/3 px-6 mb-6">
                <div class="p-8 bg-gradient-to-r from-amber-300 to-amber-400 rounded-lg shadow-lg h-full">
                    <h2 class="text-2xl font-bold text-white mb-6">Roles</h2>
                    <div class="w-full h-64 bg-gray-200 rounded">
                        <canvas id="roleDistributionChart" width="400" height="250"></canvas>
                    </div>
                </div>
            </div>
            <div class="w-full md:w-1/2 lg:w-1/3 px-6 mb-6">
                <div class="p-8 bg-gradient-to-r from-amber-400 to-amber-500 rounded-lg shadow-lg h-full">
                    <h2 class="text-2xl font-bold text-white mb-6">Rate of growth</h2>
                    <div class="w-full h-64 bg-gray-200 rounded">
                        <canvas class="" id="userCreationChart" width="400" height="250"></canvas>
                    </div>
                </div>
            </div>
            
        </div>
        <div class="flex justify-center">
            <div class="w-full md:w-1/2 lg:w-2/3 px-6 mb-6">
                <div class="p-8 bg-amber-400 rounded-lg shadow-lg h-full">
                    <h2 class="text-2xl font-bold text-white mb-6">Employees Working today</h2>
                    <div class="w-full h-[60px] bg-gray-200 rounded">
                        <ul id="employeesWorkingList" class="p-2">
        <!-- List items will be appended here -->
    </ul>
                    </div>
                </div>
                </div>
        </div>
        <div class="flex justify-center">
     <button onclick="employeepage()" class="text-2xl flex justify-center border-2 rounded-full bg-amber-400 text-white border-b-2 border-amber-300/25 shadow-sm ml-2  p-1 mx-3 transition ease-in duration-200 transform hover:-translate-y-1 active:translate-y-0">View Employees<img class="h-7 w-7 mx-2"  src="./UI/employee.png"></button>   
    </div>
</div>
<script>
fetch('./functions/management/chartdata1.php')
    .then(response => response.json())
    .then(data => {
        const dates = data.map(item => item.created_date); // declares the chart items from the the chartdata script
        const counts = data.map(item => item.user_count);

        // line chart creation
        const ctx = document.getElementById('userCreationChart').getContext('2d');
        const userCreationChart = new Chart(ctx, {
            type: 'line', 
            data: {
                labels: dates,
                datasets: [{
                    label: 'Newly added employees',
                    data: counts,
                    backgroundColor: 'rgb(245 158 11)',
                    borderColor: 'rgb(251 191 36)',
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    });
</script>
<script>
fetch('./functions/management/chartdata2.php')
    .then(response => response.json())
    .then(data => {
        const roles = data.map(item => item.role); // declares the chart items from the the chartdata script
        const counts = data.map(item => item.role_count);

        // pie chart creation
        const ctx = document.getElementById('roleDistributionChart').getContext('2d');
        const roleDistributionChart = new Chart(ctx, {
            type: 'pie',
            data: {
                labels: roles,
                datasets: [{
                    label: 'Role Distribution',
                    data: counts,
                    backgroundColor: [
                        'rgb(252 211 77)',
                        '#ffecc4',
                        'rgb(217 119 6)',
                        'rgb(245 158 11)',
                        'rgb(251 191 36)',
                        
                    ],
                    borderColor: [
                        'rgb(252 211 77)',
                        '#ffecc4',
                        'rgb(217 119 6)',
                        'rgb(245 158 11)',
                        'rgb(251 191 36)',
                        
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false
            }
        });
    });
</script>
<script>
//  function for the shift count
function updateShiftCount() {
    fetch('./functions/management/total_shifts_today.php') 
        .then(response => response.text())
        .then(shiftCount => {
            document.getElementById('shiftCount').textContent = shiftCount;
        })
}
// this will update the shift count when you load into the manaagment page
document.addEventListener('DOMContentLoaded', updateShiftCount);

setInterval(updateShiftCount, 60000); // this will update every minute incase you dont refresh.
</script>

<script>
// a function to update the employees list
function updateEmployeesWorking() {
    fetch('./functions/management/employees_working_today.php') 
        .then(response => response.json())
        .then(employees => {
            const employeesList = document.getElementById('employeesWorkingList');
            employeesList.innerHTML = ''; // clears the current content

            // create and append each employee's name to the list
            employees.forEach(employee => {
                const employeeItem = document.createElement('li');
                employeeItem.textContent = `${employee.first_name} ${employee.last_name}`;
                employeesList.appendChild(employeeItem);
            });

            // checks if there are no employees working and display a message if so
            if (employees.length === 0) {
                employeesList.innerHTML = '<li>No employees working today.</li>';
            }
        })
        
}

// update the employees list when the page loads
document.addEventListener('DOMContentLoaded', updateEmployeesWorking);

setInterval(updateEmployeesWorking, 60000); // will updates every minute
</script>

<script>
// a function to fetch and display the total number of users
function fetchTotalUsers() {
    fetch('./functions/management/total_users.php') 
        .then(response => response.text())
        .then(totalUsers => {
            document.getElementById('totalUsersCount').textContent = totalUsers;
        })
        
}

// fetchs the total users when the page starts
document.addEventListener('DOMContentLoaded', fetchTotalUsers);

setInterval(fetchTotalUsers, 60000); 
</script>

<script>
// a function to fetch and display the total number of login requests
function fetchTotalLoginRequests() {
    fetch('./functions/management/total_login_requests.php')
        .then(response => response.text())
        .then(totalRequests => {
            document.getElementById('totalLoginRequests').textContent = totalRequests;
        })
        
}
document.addEventListener('DOMContentLoaded', fetchTotalLoginRequests);

setInterval(fetchTotalLoginRequests, 60000);
</script>

</body>
</html>