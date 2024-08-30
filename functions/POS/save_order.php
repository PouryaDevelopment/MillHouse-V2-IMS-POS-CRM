<?php
require_once('../index/connection2data.php');

$input = file_get_contents('php://input');
$data = json_decode($input, true);

if (isset($data['orderId'], $data['items'], $data['total'])) {
    $orderId = $data['orderId'];
    $items = $data['items'];
    $total = $data['total'];

    // update the order query
    $stmt = $connection->prepare("UPDATE orders SET items = ?, total = ? WHERE order_id = ?");
    if ($stmt->execute([$items, $total, $orderId])) {
        echo json_encode(['success' => true]);
    } else {
        echo json_encode(['success' => false]);
    }
} else {
    echo json_encode(['success' => false, 'error' => 'invalid data provided.']);
}
?>