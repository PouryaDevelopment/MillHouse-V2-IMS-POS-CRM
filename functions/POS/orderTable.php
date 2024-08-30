<?php
include('functions/index/connection2data.php');

// fetchs all the orders 
$stmt = $connection->prepare("SELECT order_id, items, total, order_date FROM orders");
$stmt->execute();
$orders = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">

<body>
<h2 class="text-3xl py-3">Manage Orders</h2>

<table class="w-full">
    <tr class="bg-gradient-to-r from-amber-200/25 via-amber-100/25 to-amber-200/25 border border-black font-bold ">
        <th class="text-center p-1">Order ID</th>
        <th class="text-center p-1">Items</th>
        <th class="text-center p-1">Total</th>
        <th class="text-center p-1">Order Date</th>
        <th class="text-center p-1">Edit</th>
        <th class="text-center p-1">Delete</th>
    </tr>
    <?php foreach ($orders as $order): ?>
        <tr class="border border-black">
    <td class="text-center bg-amber-200/25 border border-black p-1 font-bold"><?php echo htmlspecialchars($order['order_id']); ?></td>
    <td contenteditable="true" class="editable" data-id="<?php echo $order['order_id']; ?>" data-column="items"><?php echo htmlspecialchars($order['items']); ?></td>
    <td class="text-center border border-black p-1 editable" contenteditable="true" data-id="<?php echo $order['order_id']; ?>" data-column="total">£<?php echo htmlspecialchars(number_format($order['total'], 2)); ?></td>
    <td class="text-center border border-black p-1"><?php echo htmlspecialchars($order['order_date']); ?></td>
    <td class="text-center  p-1 flex justify-center transition ease-in duration-200 transform hover:-translate-y-1 active:translate-y-0">
        <button class="saveBtn flex justify-center" data-id="<?php echo $order['order_id']; ?>">Save<img class="h-5 w-5 ml-2"  src="./UI/save.png"></button>
    </td>
    <td class="text-center border border-black transition ease-in duration-200 transform hover:-translate-y-1 active:translate-y-0">
        <a class="flex justify-center" href="./functions/POS/delete_order.php?orderId=<?php echo $order['order_id']; ?>" onclick="return confirm('Are you sure?');">Delete<img class="h-5 w-5 mx-2"  src="./UI/delete.png"></a>
    </td>
</tr>
    <?php endforeach; ?>
</table>
<script type="text/javascript">
    document.addEventListener('DOMContentLoaded', function() {
    const saveButtons = document.querySelectorAll('.saveBtn');

    saveButtons.forEach(button => {
        button.addEventListener('click', function() {
            const orderId = this.getAttribute('data-id');
            const itemsCell = document.querySelector(`.editable[data-id='${orderId}'][data-column='items']`);
            const totalCell = document.querySelector(`.editable[data-id='${orderId}'][data-column='total']`);

            const data = {
                orderId: orderId,
                items: itemsCell.textContent,
                total: totalCell.textContent.replace('£', '').trim()
            };

            // this is a ajax rrequest to save_order.php
            fetch('functions/POS/save_order.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                },
                body: JSON.stringify(data)
            })
            .then(response => response.json())
            .then(data => {
                console.log('Success:', data);
                alert('Order updated successfully!');
            })
            .catch((error) => {
                console.error('Error:', error);
                alert('Error updating order.');
            });
        });
    });
});
</script>
</body>
</html>