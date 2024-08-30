<?php
include('../index/connection2data.php');

// count the number of products in each category and get category names
$sql = "SELECT pc.name, COUNT(p.product_id) as count 
        FROM product p 
        JOIN product_category pc ON p.category_id = pc.category_id 
        GROUP BY p.category_id";

$stmt = $connection->prepare($sql);
$stmt->execute();
$categoriesData = $stmt->fetchAll(PDO::FETCH_ASSOC);

// for Chart js
$categoryNames = [];
$categoryCounts = [];
foreach ($categoriesData as $category) {
    $categoryNames[] = $category['name'];
    $categoryCounts[] = $category['count'];
}

echo json_encode(['categoryNames' => $categoryNames, 'categoryCounts' => $categoryCounts]);
?>