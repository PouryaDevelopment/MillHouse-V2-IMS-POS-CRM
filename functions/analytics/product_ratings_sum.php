<?php
include('../index/connection2data.php');

// to sum the total ratings for each product from instore_feedback
// and join with the products table to include products with no ratings
$sql = "
    SELECT p.name, IFNULL(SUM(ifb.instore_rating), 0) as total_rating
    FROM product p
    LEFT JOIN instore_feedback ifb ON p.product_id = ifb.product_id
    GROUP BY p.product_id
    ORDER BY p.product_id
";

$stmt = $connection->prepare($sql);
$stmt->execute();
$productsRatingData = $stmt->fetchAll(PDO::FETCH_ASSOC);

// preps the data for chart js
$productNames = [];
$productRatings = [];
foreach ($productsRatingData as $productRating) {
    $productNames[] = $productRating['name'];
    $productRatings[] = $productRating['total_rating'];
}

// echo's the data as JSON
echo json_encode(['productNames' => $productNames, 'productRatings' => $productRatings]);
?>