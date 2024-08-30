<!DOCTYPE html>
<html lang="en">
<head>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body>
<div class="w-full ">
    <!-- Status cards -->
<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-6 mt-2">
     <!-- Loyalty Program Card -->
            <div class="bg-amber-200 text-white p-4 rounded-lg shadow-lg">
                <div class="flex items-center">
                    <div class="">
                        <img class="h-[100px] w-[120px] "  src="./UI/discountpromo.png"> 
                    </div>
                    <div class="w-[310px]">
                        <p class="text-2xl font-semibold">Total Loyalty Programs:</p>
                        <p id="totalLoyalty" class="text-4xl font-bold"></p>
                    </div>
                </div>
            </div>
            <!-- Total Promotions Card -->
            <div class="bg-amber-300 text-white p-4 rounded-lg shadow-lg">
                <div class="flex items-center">
                    <div class="">
                        <img class="h-[100px] w-[120px] "  src="./UI/chartpromo.png"> 
                    </div>
                    <div class="w-[310px]">
                        <p class="text-2xl font-semibold">Total Promotions :</p>
                        <p id="totalPromo" class="text-4xl font-bold"></p>
                    </div>
                </div>
            </div>
            <!-- instore today Card -->
            <div class="bg-amber-400 text-white p-4 rounded-lg shadow-lg">
                <div class="flex items-center">
                    <div class="">
                        <img class="h-[100px] w-[120px] "  src="./UI/feedback.png"> 
                    </div>
                    <div class="w-[310px]">
                        <p class=" text-2xl font-semibold">instore feedback today:</p>
                        <p id="instorefeedback" class="text-4xl font-bold"></p>
                    </div>
                </div>
            </div>
            <!-- website today Card -->
            <div class="bg-amber-500 text-white p-4 rounded-lg shadow-lg">
                <div class="flex items-center">
                    <div class="">
                        <img class="h-[100px] w-[120px] "  src="./UI/feedbackreport.png"> 
                    </div>
                    <div class="w-[310px]">
                        <p class=" text-2xl font-semibold">website feedback today:</p>
                        <p id="websitefeedback" class="text-4xl font-bold"></p>
                    </div>
                </div>
            </div>
           
            
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mb-6 mt-2">
     <!-- Sales Today Card -->
            <div class="bg-gradient-to-r from-amber-200 to-amber-300 text-white p-4 rounded-lg shadow-lg">
                <div class="flex items-center">
                    <div class="">
                        <img class="h-[100px] w-[100px] "  src="./UI/Reciept.png"> 
                    </div>
                    <div class="w-[310px]">
                        <p class="text-2xl font-semibold">Total Sales Today:</p>
                        <p id="orderCount" class="text-4xl font-bold"></p>
                    </div>
                </div>
            </div>
            <!-- Total Revenue today Card -->
            <div class="bg-gradient-to-r from-amber-300 to-amber-400 text-white p-4 rounded-lg shadow-lg">
                <div class="flex items-center">
                    <div class="">
                        <img class="h-[100px] w-[100px] "  src="./UI/salesR.png"> 
                    </div>
                    <div class="w-[310px]">
                        <p class="text-2xl font-semibold">Total Revenue made today:</p>
                        <p id="salesCount" class="text-4xl font-bold"></p>
                    </div>
                </div>
            </div>
            <!-- Total Feedback today Card -->
            <div class="bg-gradient-to-r from-amber-400 to-amber-500 text-white p-4 rounded-lg shadow-lg">
                <div class="flex items-center">
                    <div class="">
                        <img class="h-[100px] w-[100px] "  src="./UI/POSFB.png"> 
                    </div>
                    <div class="w-[310px]">
                        <p class=" text-2xl font-semibold">TOTAL Feedback today:</p>
                        <p id="todayfeed" class="text-4xl font-bold"></p>
                    </div>
                </div>
            </div>
           
            
        </div>
        <br><br>
        <div class="flex justify-center flex-wrap -mx-6 ">
            <div class="w-full md:w-1/2 lg:w-1/3 px-6 mb-6">
                <div class="p-8 bg-gradient-to-r from-amber-200 to-amber-300 rounded-lg shadow-lg h-full">
                    <h2 class="text-2xl font-bold text-white mb-6">Today's feedback </h2>
                    <div class="w-full h-64 bg-gray-200 rounded">
                        <canvas id="comparisonChart" width="400" height="250"></canvas>
                    </div>
                </div>
            </div>
            <div class="w-full md:w-1/2 lg:w-1/3 px-6 mb-6">
                <div class="p-8 bg-gradient-to-r from-amber-300 to-amber-400 rounded-lg shadow-lg h-full">
                    <h2 class="text-2xl font-bold text-white mb-6">Product Sold Today</h2>
                    <div class="w-full h-64 bg-gray-200 rounded">
                        <canvas class="w-full" id="salesChart" width="400" height="250"></canvas>
                    </div>
                </div>
            </div>
             <div class="w-full md:w-1/2 lg:w-1/3 px-6 mb-6">
                <div class="p-8 bg-gradient-to-r from-amber-400 to-amber-500 rounded-lg shadow-lg h-full">
                    <h2 class="text-2xl font-bold text-white mb-6">Product Quantity</h2>
                    <div class="w-full h-64 bg-gray-200 rounded">
                        <canvas class="" id="quantityChart" width="400" height="250"></canvas>
                    </div>
                </div>
            </div>
        </div>
        <br>

     
</div>

<script>
// a function to count the loyalty programs
fetch('./functions/dashboard/loyalty_program_count.php')
    .then(response => response.json())
    .then(data => {
        document.getElementById('totalLoyalty').textContent = data.total; 
    });
</script>

<script>
// a function to count the promotions
fetch('./functions/dashboard/promotions_count.php') 
    .then(response => response.json())
    .then(data => {
        document.getElementById('totalPromo').textContent = data.total; 
    });
</script>

<script>
// a function to count todays instore feedback
fetch('./functions/dashboard/todayinstorefeed.php') 
    .then(response => response.json())
    .then(data => {
        document.getElementById('instorefeedback').textContent = data.total; 
    });
</script>

<script>
// a function to count todays website feedback
fetch('./functions/dashboard/todaywebsitefeed.php') 
    .then(response => response.json())
    .then(data => {
        document.getElementById('websitefeedback').textContent = data.total; 
    });
</script>

<script>
// a function to see todays sale count
fetch('./functions/dashboard/salescount.php') 
    .then(response => response.json())
    .then(data => {
        document.getElementById('orderCount').textContent = data.total_sales; 
    });
</script>

<script>
// a function to see the total amount made today
fetch('./functions/dashboard/totalsalestoday.php') 
    .then(response => response.json())
    .then(data => {
        document.getElementById('salesCount').textContent = `£${data.total_sales}`; 
    });
</script>

<script>
// a function to see total feedback today
fetch('./functions/dashboard/totalfeedbacktoday.php') 
    .then(response => response.json())
    .then(data => {
        document.getElementById('todayfeed').textContent = data.total_feedback_today; 
    });
</script>

<script>
        fetch('./functions/dashboard/todaysfeedbackchart.php')
            .then(response => response.json())
            .then(comparisonData => {
                const ctx = document.getElementById('comparisonChart').getContext('2d');
                const comparisonChart = new Chart(ctx, {
                    type: 'bar',
                    data: {
                        labels: ['Good Feedback', 'Bad Feedback'],
                        datasets: [
                            {
                                label: 'Online Feedback',
                                data: [
                                    comparisonData.feedback.Good, 
                                    comparisonData.feedback.Bad
                                ],
                                backgroundColor: 'rgb(253 230 138)',
                                borderColor: 'rgb(253 230 138)',
                                borderWidth: 1
                            },
                            {
                                label: 'Instore Feedback',
                                data: [
                                    comparisonData.instore_feedback.Good,
                                    comparisonData.instore_feedback.Bad
                                ],
                                backgroundColor: 'rgb(252 211 77)',
                                borderColor: 'rgb(252 211 77)',
                                borderWidth: 1
                            }
                        ]
                    },
                    options: {
                        scales: {
                            y: {
                                beginAtZero: true
                            }
                        },
                        responsive: true
                    }
                });
            });
    </script>

     <script>
        fetch('./functions/dashboard/productsoldtoday.php')
            .then(response => response.json())
            .then(data => {
                const ctx = document.getElementById('salesChart').getContext('2d');
                const salesChart = new Chart(ctx, {
                    type: 'bar', // 
                    data: {
                        labels: data.labels,
                        datasets: [{
                            label: 'Sales Quantity',
                            data: data.data,
                            backgroundColor: 'rgb(252 211 77)',
                            borderColor: 'rgb(251 191 36)',
                            borderWidth: 1
                        }]
                    },
                    options: {
                        scales: {
                            y: {
                                beginAtZero: true
                            }
                        },
                        responsive: true
                    }
                });
            });
    </script>
    <script>
        fetch('./functions/dashboard/productquantity.php')
            .then(response => response.json())
            .then(data => {
                const ctx = document.getElementById('quantityChart').getContext('2d');
                const quantityChart = new Chart(ctx, {
                    type: 'bar', 
                    data: {
                        labels: data.labels, 
                        datasets: [{
                            label: 'Quantity',
                            data: data.data, 
                            backgroundColor: 'rgb(251 191 36)',
                            borderColor: 'rgb(245 158 11)',
                            borderWidth: 1
                        }]
                    },
                    options: {
                        scales: {
                            y: {
                                beginAtZero: true
                            }
                        },
                        responsive: true
                    }
                });
            });
    </script>
</body>
</html>