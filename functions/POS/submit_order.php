<?php
include('../index/connection2data.php'); 

if (isset($_POST['basketData'])) {
    $orderDetails = json_decode($_POST['basketData'], true);
    
    if (!isset($orderDetails['basket']) || !is_array($orderDetails['basket'])) {
        die("basket data missing");
    }

    $basket = $orderDetails['basket'];
    $selectedDiscount = $orderDetails['discount'] ?? 0; // this will make it default to 0 if not set
    $discountLabel = $orderDetails['discountLabel'] ?? ''; // will make it default to empty if not set
    $totalPrice = 0;

    
    $connection->beginTransaction();

    try {
        // calculatating the overall price and will prepare the items  list for insertion
        $itemsList = '';
        foreach ($basket as $item) {
            $totalPrice += $item['price'] * $item['quantity'];
            $itemsList .= $item['productName'] . ' x ' . $item['quantity'] . ', ';

            // here we deduct the the basket data from the inventory table.
            $updateInventoryStmt = $connection->prepare("UPDATE inventory SET quantity = quantity - :quantity WHERE product_id = :product_id");
            $updateInventoryStmt->execute([
                'quantity' => $item['quantity'],
                'product_id' => $item['productId']
            ]);
        }

        // we take away the  comma and space from the items list
        $itemsList = rtrim($itemsList, ', ');

        //  discount
        if ($selectedDiscount > 0) {
            $totalPrice *= (1 - $selectedDiscount);
            $itemsList .= " (Discount: $discountLabel)";
        }

        // insert into orders table query
        $stmt = $connection->prepare("INSERT INTO orders (items, total) VALUES (:items, :total)");
        $stmt->execute(['items' => $itemsList, 'total' => $totalPrice]);
        $orderId = $connection->lastInsertId();

        
        $connection->commit();
        
        
         header('location: ../../POS.php?message=success');
    } catch (Exception $e) {
        $connection->rollBack();
        echo "Error: " . $e->getMessage();
    }
} else {
    echo "No basket data received.";
}
?>