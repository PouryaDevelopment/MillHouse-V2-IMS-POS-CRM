<!DOCTYPE html>
<html lang="en">
<head>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body>
<div class="w-full ">
    <!-- Status cards -->
<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-6 mt-2">
     <!-- Good feedback month Card -->
            <div class="bg-amber-300 text-white p-4 rounded-lg shadow-lg">
                <div class="flex items-center">
                    <div class="">
                        <img class="h-[100px] w-[100px] "  src="./UI/members.png"> 
                    </div>
                    <div class="w-[310px]">
                        <p class="text-2xl font-semibold">Total Good feedback This month:</p>
                        <p id="goodFeedbackCount" class="text-4xl font-bold"></p>
                    </div>
                </div>
            </div>
            <!-- Good feedback year Card -->
            <div class="bg-amber-400 text-white p-4 rounded-lg shadow-lg">
                <div class="flex items-center">
                    <div class="">
                        <img class="h-[100px] w-[100px] "  src="./UI/members.png"> 
                    </div>
                    <div class="w-[310px]">
                        <p class="text-2xl font-semibold">Total Good feedback This Current year :</p>
                        <p id="goodFeedbackYearlyCount" class="text-4xl font-bold"></p>
                    </div>
                </div>
            </div>
            <!-- bad feedback month Card -->
            <div class="bg-amber-500 text-white p-4 rounded-lg shadow-lg">
                <div class="flex items-center">
                    <div class="">
                        <img class="h-[100px] w-[100px] "  src="./UI/neg.png"> 
                    </div>
                    <div class="w-[310px]">
                        <p class=" text-2xl font-semibold">Total Bad feedback This month:</p>
                        <p id="badFeedbackMonthCount" class="text-4xl font-bold"></p>
                    </div>
                </div>
            </div>
            <!-- bad feedback year Card -->
            <div class="bg-amber-600 text-white p-4 rounded-lg shadow-lg">
                <div class="flex items-center">
                    <div class="">
                        <img class="h-[100px] w-[100px] "  src="./UI/neg.png"> 
                    </div>
                    <div class="w-[310px]">
                        <p class=" text-2xl font-semibold">Total Bad feedback This Current Year:</p>
                        <p id="badFeedbackYearCount" class="text-4xl font-bold"></p>
                    </div>
                </div>
            </div>
           
            
        </div>
        <br><br>
        <div class="flex justify-center flex-wrap -mx-6 ">
            <div class="w-full md:w-1/2 lg:w-1/3 px-6 mb-6">
                <div class="p-8 bg-gradient-to-r from-amber-300 to-amber-400 rounded-lg shadow-lg h-full">
                    <h2 class="text-2xl font-bold text-white mb-6">Good Feedback frequency [current month]</h2>
                    <div class="w-full h-64 bg-gray-200 rounded">
                        <canvas id="goodFeedbackFrequencyChart" width="400" height="250"></canvas>
                    </div>
                </div>
            </div>
            <div class="w-full md:w-1/2 lg:w-1/3 px-6 mb-6">
                <div class="p-8 bg-gradient-to-r from-amber-400 to-amber-500 rounded-lg shadow-lg h-full">
                    <h2 class="text-2xl font-bold text-white mb-6">Product Ratings</h2>
                    <div class="w-full h-64 bg-gray-200 rounded">
                        <canvas class="w-full" id="productRatingsSumChart" width="1000" height="250"></canvas>
                    </div>
                </div>
            </div>
             <div class="w-full md:w-1/2 lg:w-1/3 px-6 mb-6">
                <div class="p-8 bg-gradient-to-r from-amber-500 to-amber-600 rounded-lg shadow-lg h-full">
                    <h2 class="text-2xl font-bold text-white mb-6">Bad Feedback frequency [current month]</h2>
                    <div class="w-full h-64 bg-gray-200 rounded">
                        <canvas class="" id="badFeedbackFrequencyChart" width="400" height="250"></canvas>
                    </div>
                </div>
            </div>
        </div>
        <br><br><br>
        
        <div class="flex justify-center">
     <button onclick="instorefdbkpage()" class="text-2xl flex justify-center border-2 rounded-full bg-amber-400 text-white border-b-2 border-amber-300/25 shadow-sm ml-2  p-1 mx-3 transition ease-in duration-200 transform hover:-translate-y-1 active:translate-y-0"><img class="h-7 w-7 mx-2"  src="./UI/feedback.png">View Instore Feedback</button>
      <button onclick="CRMpage()" class="text-2xl flex justify-center border-2 rounded-full bg-amber-400 text-white border-b-2 border-amber-300/25 shadow-sm ml-2  p-1 mx-3 transition ease-in duration-200 transform hover:-translate-y-1 active:translate-y-0"> CRM</button>   
     <button onclick="websitefdbkpage()" class="text-2xl flex justify-center border-2 rounded-full bg-amber-400 text-white border-b-2 border-amber-300/25 shadow-sm ml-2  p-1 mx-3 transition ease-in duration-200 transform hover:-translate-y-1 active:translate-y-0">View Website Feedback<img class="h-7 w-7 mx-2"  src="./UI/feedbackreport.png"></button>
    </div>
</div>
<script>
// a function to fetch and display the total good feedback count for the current month
function fetchGoodFeedbackCount() {
    fetch('./functions/analytics/good_feedback_count.php') 
        .then(response => response.text())
        .then(goodFeedbackCount => {
            document.getElementById('goodFeedbackCount').textContent = goodFeedbackCount;
        })        
}
document.addEventListener('DOMContentLoaded', fetchGoodFeedbackCount);
setInterval(fetchGoodFeedbackCount, 60000); 
</script>

<script>
// a function to fetch and display the total good feedback count for the current year
function fetchGoodFeedbackYearlyCount() {
    fetch('./functions/analytics/good_feedback_yearly_count.php') 
        .then(response => response.text())
        .then(goodFeedbackCount => {
            document.getElementById('goodFeedbackYearlyCount').textContent = goodFeedbackCount;
        })
}
document.addEventListener('DOMContentLoaded', fetchGoodFeedbackYearlyCount);
setInterval(fetchGoodFeedbackYearlyCount, 60000); 
</script>

<script>
// a function to fetch and display the total bad feedback count for the current month
function fetchBadFeedbackMonthCount() {
    fetch('./functions/analytics/bad_feedback_monthly_count.php') 
        .then(response => response.text())
        .then(badFeedbackCount => {
            document.getElementById('badFeedbackMonthCount').textContent = badFeedbackCount;
        })
}
document.addEventListener('DOMContentLoaded', fetchBadFeedbackMonthCount);
setInterval(fetchBadFeedbackMonthCount, 60000); 
</script>


<script>
// a function to fetch and display the total bad feedback count for the current year
function fetchBadFeedbackYearCount() {
    fetch('./functions/analytics/bad_feedback_yearly_count.php') 
        .then(response => response.text())
        .then(badFeedbackCount => {
            document.getElementById('badFeedbackYearCount').textContent = badFeedbackCount;
        })
        
}
document.addEventListener('DOMContentLoaded', fetchBadFeedbackYearCount);
setInterval(fetchBadFeedbackYearCount, 60000); 
</script>

<script>
fetch('./functions/analytics/good_feedback_frequency.php') 
    .then(response => response.json())
    .then(data => {
        const ctx = document.getElementById('goodFeedbackFrequencyChart').getContext('2d');
        const goodFeedbackFrequencyChart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: data.labels,
                datasets: [{
                    label: 'Good Feedback Frequency',
                    data: data.data,
                    backgroundColor: 'rgb(252 211 77)',
                    borderColor: 'rgb(252 211 77)',
                    borderWidth: 2
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
fetch('./functions/analytics/bad_feedback_frequency.php') 
    .then(response => response.json())
    .then(data => {
        const ctx = document.getElementById('badFeedbackFrequencyChart').getContext('2d');
        const badFeedbackFrequencyChart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: data.labels,
                datasets: [{
                    label: 'Bad Feedback Frequency',
                    data: data.data,
                    backgroundColor: 'rgb(217 119 6)',
                    borderColor: 'rgb(217 119 6)',
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
fetch('./functions/analytics/product_ratings_sum.php') 
    .then(response => response.json())
    .then(data => {
        const ctx = document.getElementById('productRatingsSumChart').getContext('2d');
        const productRatingsSumChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: data.productNames,
                datasets: [{
                    label: 'Total Product Ratings',
                    data: data.productRatings,
                    backgroundColor: 'rgb(251 191 36)',
                    borderColor: 'rgb(251 191 36)',
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

</body>
</html>