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
     <!-- Total Members Card -->
            <div class="bg-amber-300 text-white p-4 rounded-lg shadow-lg">
                <div class="flex items-center">
                    <div class="">
                        <img class="h-[100px] w-[100px] "  src="./UI/members.png"> 
                    </div>
                    <div class="w-[310px]">
                        <p class="text-2xl font-semibold">Total Members:</p>
                        <p id="totalmembersCount" class="text-4xl font-bold">1</p>
                    </div>
                </div>
            </div>
            <!-- Feedback this week card -->
            <div class="bg-amber-400 text-white p-4 rounded-lg shadow-lg">
                <div class="flex items-center">
                    <div class="">
                        <img class="h-[100px] w-[100px] "  src="./UI/POSFB.png"> 
                    </div>
                    <div class="w-[310px]">
                        <p class="text-2xl font-semibold">Total Feedback This Week:</p>
                        <p id="totalFeedbackCount" class="text-4xl font-bold">1</p>
                    </div>
                </div>
            </div>
            <!-- Sales this week card -->
            <div class="bg-amber-500 text-white p-4 rounded-lg shadow-lg">
                <div class="flex items-center">
                    <div class="">
                        <img class="h-[100px] w-[100px] "  src="./UI/Post.png"> 
                    </div>
                    <div class="w-[310px]">
                        <p class=" text-2xl font-semibold">Total Sales This Week:</p>
                        <p id="totalSalesWeek" class="text-4xl font-bold">1</p>
                    </div>
                </div>
            </div>
           
            
        </div>
        <br><br>
        <div class="flex justify-center flex-wrap -mx-6 ">
            <div class="w-full md:w-1/2 lg:w-1/3 px-6 mb-6">
                <div class="p-8 bg-amber-300 rounded-lg shadow-lg h-full">
                    <h2 class="text-2xl font-bold text-white mb-6">Money Made [Weekly]</h2>
                    <div class="w-full h-64 bg-gray-200 rounded">
                        <canvas id="revenueChart" width="400" height="250"></canvas>
                    </div>
                </div>
            </div>
            <div class="w-full md:w-1/2 lg:w-1/3 px-6 mb-6">
                <div class="p-8 bg-amber-400 rounded-lg shadow-lg h-full">
                    <h2 class="text-2xl font-bold text-white mb-6">Feedback Total Pie Chart</h2>
                    <div class="w-full h-64 bg-gray-200 rounded">
                        <canvas class="w-full" id="feedbackChart" width="1000" height="250"></canvas>
                    </div>
                </div>
            </div>
             <div class="w-full md:w-1/2 lg:w-1/3 px-6 mb-6">
                <div class="p-8 bg-amber-500 from-amber-400 to-amber-500 rounded-lg shadow-lg h-full">
                    <h2 class="text-2xl font-bold text-white mb-6">Feedback Comparison [Instore vs Online]</h2>
                    <div class="w-full h-64 bg-gray-200 rounded">
                        <canvas class="" id="comparisonChart" width="400" height="250"></canvas>
                    </div>
                </div>
            </div>
        </div>
        <br><br><br>
        
        <div class="flex justify-center">
     <button onclick="POSpage()" class="text-2xl flex justify-center border-2 rounded-full bg-amber-400 text-white border-b-2 border-amber-300/25 shadow-sm ml-2  p-1 mx-3 transition ease-in duration-200 transform hover:-translate-y-1 active:translate-y-0"><img class="h-7 w-7 mx-2"  src="./UI/salesR.png">Point Of Sale</button>  
      <button onclick="CRMpage()" class="text-2xl flex justify-center border-2 rounded-full bg-amber-400 text-white border-b-2 border-amber-300/25 shadow-sm ml-2  p-1 mx-3 transition ease-in duration-200 transform hover:-translate-y-1 active:translate-y-0">CRM</button>
     <button onclick="inventorypage()" class="text-2xl flex justify-center border-2 rounded-full bg-amber-400 text-white border-b-2 border-amber-300/25 shadow-sm ml-2  p-1 mx-3 transition ease-in duration-200 transform hover:-translate-y-1 active:translate-y-0">Inventory<img class="h-7 w-7 mx-2"  src="./UI/inventory.png"></button>
    </div>
</div>
<script>
// the function to fetch and display the total number of members
function fetchTotalMembers() {
    fetch('./functions/analytics/total_members.php') 
        .then(response => response.text())
        .then(totalMembers => {
            document.getElementById('totalmembersCount').textContent = totalMembers;
        });
}
document.addEventListener('DOMContentLoaded', fetchTotalMembers);
setInterval(fetchTotalMembers, 60000); 
</script>

<script>
// the function to fetch and display the total number of feedback entries for the current week
function fetchTotalFeedbackThisWeek() {
    fetch('./functions/analytics/total_feedback_this_week.php') 
        .then(response => response.text())
        .then(totalFeedback => {
            document.getElementById('totalFeedbackCount').textContent = totalFeedback;
        });
}
document.addEventListener('DOMContentLoaded', fetchTotalFeedbackThisWeek);
setInterval(fetchTotalFeedbackThisWeek, 60000); 
</script>

<script>
// the function to fetch and display the total sales for the current week
function fetchTotalSalesThisWeek() {
    fetch('./functions/analytics/total_sales_this_week.php') 
        .then(response => response.text())
        .then(totalSales => {
            document.getElementById('totalSalesWeek').textContent = totalSales;
        });
}
document.addEventListener('DOMContentLoaded', fetchTotalSalesThisWeek);
setInterval(fetchTotalSalesThisWeek, 60000); 
</script>

 <script>
        fetch('./functions/analytics/weeksaleschart.php') 
            .then(response => response.json())
            .then(data => {
                const ctx = document.getElementById('revenueChart').getContext('2d');
                const revenueChart = new Chart(ctx, {
                    type: 'bar', 
                    data: {
                        labels: data.labels, 
                        datasets: [{
                            label: 'Daily Revenue',
                            data: data.data, 
                            backgroundColor: 'rgb(252 211 77)', 
                            borderColor: 'rgb(252 211 77)', 
                            borderWidth: 1
                        }]
                    },
                    options: {
                        scales: {
                            y: {
                                beginAtZero: true 
                            }
                        },
                        responsive: true, 
                        plugins: {
                            legend: {
                                display: true, 
                                position: 'top' 
                            },
                            tooltip: {
                                enabled: true 
                            }
                        }
                    }
                });
            });
    </script>
    <script>
        fetch('./functions/analytics/feedbackpie.php') 
            .then(response => response.json())
            .then(feedbackData => {
                const ctx = document.getElementById('feedbackChart').getContext('2d');
                const feedbackChart = new Chart(ctx, {
                    type: 'pie', 
                    data: {
                        labels: ['Good Feedback', 'Bad Feedback'], 
                        datasets: [{
                            label: 'Feedback Rating',
                            data: [feedbackData.Good, feedbackData.Bad], 
                            backgroundColor: ['rgb(252 211 77)',
                                                 'rgb(245 158 11)'
                                                            ],
                            borderColor: [
                                            '#ffecc4',
                                                         ],
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
        fetch('./functions/analytics/feedbackcomp.php')
            .then(response => response.json())
            .then(comparisonData => {
                const ctx = document.getElementById('comparisonChart').getContext('2d');
                const comparisonChart = new Chart(ctx, {
                    type: 'bar',
                    data: {
                        labels: ['Good Feedback', 'Bad Feedback'],
                        datasets: [
                            {
                                label: 'Feedback',
                                data: [
                                    comparisonData.feedback.Good, 
                                    comparisonData.feedback.Bad
                                ],
                                backgroundColor: 'rgb(245 158 11)',
                                borderColor: 'rgb(245 158 11)',
                                borderWidth: 1
                            },
                            {
                                label: 'Instore Feedback',
                                data: [
                                    comparisonData.instore_feedback.Good,
                                    comparisonData.instore_feedback.Bad
                                ],
                                backgroundColor: '#ffecc4',
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
</body>
</html>