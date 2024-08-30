<!DOCTYPE html>
<html lang="en">
<head>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script src="https://cdn.jsdelivr.net/npm/chartjs-adapter-moment"></script>
</head>
<body>
<div class="w-full ">
    <!-- Status cards -->
<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mb-6 mt-2">
     <!-- Total Sales Card -->
            <div class="bg-amber-300 text-white p-4 rounded-lg shadow-lg">
                <div class="flex items-center">
                    <div class="">
                        <img class="h-[100px] w-[100px] "  src="./UI/paydetail.png"> 
                    </div>
                    <div class="w-[310px]">
                        <p class="text-2xl font-semibold">Total Sales:</p>
                        <p id="totalSalesCount" class="text-4xl font-bold">1</p>
                    </div>
                </div>
            </div>
            <!-- Revenue this month card -->
            <div class="bg-amber-400 text-white p-4 rounded-lg shadow-lg">
                <div class="flex items-center">
                    <div class="">
                        <img class="h-[100px] w-[100px] "  src="./UI/analytics.png"> 
                    </div>
                    <div class="w-[310px]">
                        <p class="text-2xl font-semibold">Total Revenue from sales this month:</p>
                        <p id="totalRevenueCount" class="text-4xl font-bold">£1</p>
                    </div>
                </div>
            </div>
            <!-- revenue this year card -->
            <div class="bg-amber-500 text-white p-4 rounded-lg shadow-lg">
                <div class="flex items-center">
                    <div class="">
                        <img class="h-[100px] w-[100px] "  src="./UI/money.png"> 
                    </div>
                    <div class="w-[310px]">
                        <p class=" text-2xl font-semibold">Total Revenue from sales this year:</p>
                        <p id="totalRevenueYear" class="text-4xl font-bold">£1</p>
                    </div>
                </div>
            </div>
           
            
        </div>
        <br><br>
        <div class="flex justify-center flex-wrap -mx-6 ">
            <div class="w-full md:w-1/2 lg:w-1/3 px-6 mb-6">
                <div class="p-8 bg-amber-300 rounded-lg shadow-lg h-full">
                    <h2 class="text-2xl font-bold text-white mb-6">Sale frequency [Monthly]</h2>
                    <div class="w-full h-64 bg-gray-200 rounded">
                        <canvas id="salesFrequencyChart" width="400" height="250"></canvas>
                    </div>
                </div>
            </div>
            <div class="w-full md:w-1/2 lg:w-1/3 px-6 mb-6">
                <div class="p-8 bg-amber-400 rounded-lg shadow-lg h-full">
                    <h2 class="text-2xl font-bold text-white mb-6">Most Sold Products This Month</h2>
                    <div class="w-full h-64 bg-gray-200 rounded">
                        <canvas class="w-full" id="productsChart" width="1000" height="250"></canvas>
                    </div>
                </div>
            </div>
             <div class="w-full md:w-1/2 lg:w-1/3 px-6 mb-6">
                <div class="p-8 bg-amber-500 from-amber-400 to-amber-500 rounded-lg shadow-lg h-full">
                    <h2 class="text-2xl font-bold text-white mb-6">Sale frequency [Yearly]</h2>
                    <div class="w-full h-64 bg-gray-200 rounded">
                        <canvas class="" id="yearlySalesFrequencyChart" width="400" height="250"></canvas>
                    </div>
                </div>
            </div>
        </div>
        <br><br><br>
        
        <div class="flex justify-center">
     <button onclick="orderspage()" class="text-2xl flex justify-center border-2 rounded-full bg-amber-400 text-white border-b-2 border-amber-300/25 shadow-sm ml-2  p-1 mx-3 transition ease-in duration-200 transform hover:-translate-y-1 active:translate-y-0"><img class="h-7 w-7 mx-2"  src="./UI/salesR.png">View Orders</button>  
     <button onclick="recieptpage()" class="text-2xl flex justify-center border-2 rounded-full bg-amber-400 text-white border-b-2 border-amber-300/25 shadow-sm ml-2  p-1 mx-3 transition ease-in duration-200 transform hover:-translate-y-1 active:translate-y-0">View Reciepts<img class="h-7 w-7 mx-2"  src="./UI/Reciept.png"></button>
    </div>
</div>
</body>
<script>
// the function to fetch and display the total revenue from sales for the current month
function fetchTotalRevenueThisMonth() {
    fetch('./functions/analytics/total_revenue_this_month.php') 
        .then(response => response.text())
        .then(totalRevenue => {
            document.getElementById('totalRevenueCount').textContent = `£${totalRevenue}`;
        })        
}
document.addEventListener('DOMContentLoaded', fetchTotalRevenueThisMonth);
setInterval(fetchTotalRevenueThisMonth, 60000); 
</script>

<script>
// the function to fetch and display the total number of orders
function fetchTotalNumberOfOrders() {
    fetch('./functions/analytics/total_number_of_orders.php') 
        .then(response => response.text())
        .then(totalOrders => {
            document.getElementById('totalSalesCount').textContent = totalOrders;
        })  
}
document.addEventListener('DOMContentLoaded', fetchTotalNumberOfOrders);
setInterval(fetchTotalNumberOfOrders, 60000); 
</script>

<script>
// the function to fetch and display the total revenue from sales for the current year
function fetchTotalRevenueThisYear() {
    fetch('./functions/analytics/total_revenue_this_year.php') 
        .then(response => response.text())
        .then(totalRevenue => {
            document.getElementById('totalRevenueYear').textContent = `£${totalRevenue}`;
        })
}
document.addEventListener('DOMContentLoaded', fetchTotalRevenueThisYear);
setInterval(fetchTotalRevenueThisYear, 60000); 
</script>

<script type="text/javascript">
    fetch('./functions/analytics/totalprodmonth.php')
    .then(response => response.json())
        .then(data => {
            const ctx = document.getElementById('productsChart').getContext('2d');
            const productsChart = new Chart(ctx, {
                type: 'pie',
                data: {
                    labels: data.productNames,
                    datasets: [{
                        label: 'Quantity Sold',
                        data: data.productQuantities,
                        backgroundColor: [
                        'rgb(252 211 77)',
                        '#ffecc4',
                        'rgb(217 119 6)',
                        'rgb(245 158 11)',
                        'rgb(251 191 36)',
                        'rgb(217 119 6)',
                        'rgb(253 230 138)',
                    ],
                    borderColor: [
                        'rgb(252 211 77)',
                        '#ffecc4',
                        'rgb(217 119 6)',
                        'rgb(245 158 11)',
                        'rgb(251 191 36)',
                        'rgb(217 119 6)',
                        'rgb(253 230 138)',
                        
                    ],
                        borderWidth: 1
                    }]
                },
                options: {
                responsive: true,
                maintainAspectRatio: false
            }
            });
        })
</script>

<script>
        fetch('./functions/analytics/salefreqmonth.php') 
            .then(response => response.json())
            .then(data => {
                const ctx = document.getElementById('salesFrequencyChart').getContext('2d');
                const salesFrequencyChart = new Chart(ctx, {
                    type: 'line',
                    data: {
                        labels: data.labels,
                        datasets: [{
                            label: 'Sales Frequency',
                            data: data.data,
                            fill: false,
                            borderColor: 'rgb(252 211 77)',
                            tension: 0.1
                        }]
                    },
                    options: {
                        scales: {
                            y: {
                                beginAtZero: true
                            }
                        },
                        
                    }
                });
            });
    </script>

   <script>
    fetch('./functions/analytics/salefreqyear.php')
        .then(response => response.json())
        .then(data => {
            const ctx = document.getElementById('yearlySalesFrequencyChart').getContext('2d');
            const yearlySalesFrequencyChart = new Chart(ctx, {
                type: 'line',
                data: {
                    labels: data.labels,
                    datasets: [{
                        label: 'Yearly Sales Frequency',
                        data: data.data,
                        backgroundColor: 'rgb(245 158 11)',
                        borderColor: 'rgb(245 158 11)',
                        borderWidth: 1,
                        fill: false
                    }]
                },
                options: {
                    scales: {
                        y: {
                            beginAtZero: true
                        },
                        x: {
                            type: 'time',
                            time: {
                                tooltipFormat: 'MMM DD',
                                unit: 'month'
                            },
                            title: {
                                display: true,
                                text: 'Date'
                            }
                        }
                    },
                    responsive: true,
                    maintainAspectRatio: false
                }
            });
        });
</script>
</html>