<?php

include('functions/index/connection2data.php');

// fetching orders
$stmt = $connection->prepare("SELECT order_id, items, total, order_date FROM orders");
$stmt->execute();
$orders = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>

<h2 class="text-3xl py-3">Reciepts</h2>

<table class="w-full" >
    <tr class="bg-gradient-to-r from-amber-200/25 via-amber-100/25 to-amber-200/25 border border-black font-bold ">
        <th class="text-center p-1">Order ID</th>
        <th class="text-center p-1">Items</th>
        <th class="text-center p-1">Total</th>
        <th class="text-center p-1">Order Date</th>
        <th class="text-center p-1">Action</th>
    </tr>
    <?php foreach ($orders as $order): ?>
        <tr class="border border-black">
            <td class="text-center bg-amber-200/25 border border-black p-1 font-bold"><?php echo htmlspecialchars($order['order_id']); ?></td>
            <td ><?php echo htmlspecialchars($order['items']); ?></td>
            <td class="text-center border border-black p-1">£<?php echo htmlspecialchars(number_format($order['total'], 2)); ?></td>
            <td class="text-center border border-black p-1"><?php echo htmlspecialchars($order['order_date']); ?></td>
            <td class="flex justify-center  transition ease-in duration-200 transform hover:-translate-y-1 active:translate-y-0 text-center  p-1">
                <button class="flex justify-center ">
                    <img class="h-6 w-6 mr-3"  src="./UI/Reciept.png">
                     <a class="" href="functions/POS/receipt.php?orderId=<?php echo $order['order_id']; ?>" target="_blank">Generate Receipt</a>
                </button>
               
            </td>
        </tr>
    <?php endforeach; ?>
</table>

</body>
</html>