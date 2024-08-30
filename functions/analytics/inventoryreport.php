<!DOCTYPE html>
<html lang="en">
<head>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body>
<div class="w-full ">
    <!-- Status cards -->
<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mb-6 mt-2">
     <!-- Product Card -->
            <div class="bg-amber-300 text-white p-4 rounded-lg shadow-lg">
                <div class="flex items-center">
                    <div class="">
                        <img class="h-[100px] w-[100px] "  src="./UI/foodndrink.png"> 
                    </div>
                    <div class="w-[310px]">
                        <p class="text-2xl font-semibold">Total Products:</p>
                        <p id="totalProductsCount" class="text-4xl font-bold"></p>
                    </div>
                </div>
            </div>
            <!-- Ingredients Card -->
            <div class="bg-amber-400 text-white p-4 rounded-lg shadow-lg">
                <div class="flex items-center">
                    <div class="">
                        <img class="h-[100px] w-[100px] "  src="./UI/ingredient.png"> 
                    </div>
                    <div class="w-[310px]">
                        <p class="text-2xl font-semibold">Total Ingredients:</p>
                        <p id="totalIngredientsCount" class="text-4xl font-bold"></p>
                    </div>
                </div>
            </div>
            <!-- Ingredients Total Value Card -->
            <div class="bg-amber-500 text-white p-4 rounded-lg shadow-lg">
                <div class="flex items-center">
                    <div class="">
                        <img class="h-[100px] w-[100px] "  src="./UI/ingredientquantity.png"> 
                    </div>
                    <div class="w-[310px]">
                        <p class=" text-2xl font-semibold">Ingredients Total Value:</p>
                        <p id="ingredientsTotalValue" class="text-4xl font-bold"></p>
                    </div>
                </div>
            </div>
           
            
        </div>
        <br><br>
        <div class="flex justify-center flex-wrap -mx-6 ">
            <div class="w-full md:w-1/2 lg:w-1/3 px-6 mb-6">
                <div class="p-8 bg-amber-300 rounded-lg shadow-lg h-full">
                    <h2 class="text-2xl font-bold text-white mb-6">Product quantity line bar chart</h2>
                    <div class="w-full h-64 bg-gray-200 rounded">
                        <canvas id="productQuantityChart" width="400" height="250"></canvas>
                    </div>
                </div>
            </div>
            <div class="w-full md:w-1/2 lg:w-1/3 px-6 mb-6">
                <div class="p-8 bg-amber-400 rounded-lg shadow-lg h-full">
                    <h2 class="text-2xl font-bold text-white mb-6">Product Category pie chart</h2>
                    <div class="w-full h-64 bg-gray-200 rounded">
                        <canvas class="w-full" id="productCategoryChart" width="1000" height="250"></canvas>
                    </div>
                </div>
            </div>
             <div class="w-full md:w-1/2 lg:w-1/3 px-6 mb-6">
                <div class="p-8 bg-amber-500 from-amber-400 to-amber-500 rounded-lg shadow-lg h-full">
                    <h2 class="text-2xl font-bold text-white mb-6">Ingredients quantity line bar chart</h2>
                    <div class="w-full h-64 bg-gray-200 rounded">
                        <canvas class="" id="ingredientQuantityChart" width="400" height="250"></canvas>
                    </div>
                </div>
            </div>
        </div>
        <br><br><br>
        
        <div class="flex justify-center">
     <button onclick="inventorypage()" class="text-2xl flex justify-center border-2 rounded-full bg-amber-400 text-white border-b-2 border-amber-300/25 shadow-sm ml-2  p-1 mx-3 transition ease-in duration-200 transform hover:-translate-y-1 active:translate-y-0"><img class="h-7 w-7 mx-2"  src="./UI/ProductQ.png">View Products</button>   
     <button onclick="ingredientspage()" class="text-2xl flex justify-center border-2 rounded-full bg-amber-400 text-white border-b-2 border-amber-300/25 shadow-sm ml-2  p-1 mx-3 transition ease-in duration-200 transform hover:-translate-y-1 active:translate-y-0">View ingredients<img class="h-7 w-7 mx-2"  src="./UI/inventory.png"></button>
    </div>
</div>

<script>
// The function to fetch and display the total number of products
function fetchTotalProducts() {
    fetch('./functions/analytics/totalproducts.php') 
        .then(response => response.text())
        .then(totalProducts => {
            document.getElementById('totalProductsCount').textContent = totalProducts;
        })        
}

document.addEventListener('DOMContentLoaded', fetchTotalProducts);

setInterval(fetchTotalProducts, 60000); 
</script>

<script>
// the function to fetch and display the total number of ingredients
function fetchTotalIngredients() {
    fetch('./functions/analytics/totalingredient.php') 
        .then(response => response.text())
        .then(totalIngredients => {
            document.getElementById('totalIngredientsCount').textContent = totalIngredients;
        })
}

document.addEventListener('DOMContentLoaded', fetchTotalIngredients);

setInterval(fetchTotalIngredients, 60000); 
</script>


<script>
// a ffunction to fetch and display the ingredients total value
function fetchIngredientsTotalValue() {
    fetch('./functions/analytics/ingredients_total_value.php') 
        .then(response => response.text())
        .then(totalValue => {
            document.getElementById('ingredientsTotalValue').textContent = `£${totalValue}`;
        })
}
document.addEventListener('DOMContentLoaded', fetchIngredientsTotalValue);
setInterval(fetchIngredientsTotalValue, 60000); 
</script>

<script>
fetch('./functions/analytics/product_inventory_data.php') 
    .then(response => response.json())
    .then(data => {
        const ctx = document.getElementById('productQuantityChart').getContext('2d');
        const productQuantityChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: data.names,
                datasets: [{
                    label: 'Quantity',
                    data: data.quantities,
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
                }
            }
        });
    });
</script>

<script>
fetch('./functions/analytics/product_category_distribution.php') 
    .then(response => response.json())
    .then(data => {
        const ctx = document.getElementById('productCategoryChart').getContext('2d');
        const productCategoryChart = new Chart(ctx, {
            type: 'pie',
            data: {
                labels: data.categoryNames,
                datasets: [{
                    data: data.categoryCounts,
                    backgroundColor: [
                        'rgb(245 158 11)', 
                        'rgb(252 211 77)' 
                    ],
                    borderColor: [
                        ' rgb(251 191 36)', 
                        
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
fetch('./functions/analytics/ingredient_quantities_data.php') 
    .then(response => response.json())
    .then(data => {
        const ctx = document.getElementById('ingredientQuantityChart').getContext('2d');
        const ingredientQuantityChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: data.names,
                datasets: [{
                    label: 'Quantity',
                    data: data.quantities,
                    backgroundColor: 'rgb(245 158 11)',
                    borderColor: 'rgb(245 158 11)',
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
</body>
</html>