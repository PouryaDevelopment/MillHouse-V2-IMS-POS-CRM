<?php
require_once('../index/connection2data.php');
$postData = json_decode(file_get_contents('php://input'), true);

$feedbackId = $postData['feedbackId'] ?? null;
$feedbackType = $postData['feedbackType'] ?? null;

if ($feedbackId && $feedbackType) {
    $tableName = $feedbackType === 'instore' ? 'instore_feedback' : 'feedback';
    $columnName = $feedbackType === 'instore' ? 'feedback_instore_id' : 'feedback_website_id';

    $stmt = $connection->prepare("UPDATE {$tableName} SET notification_read = 1 WHERE {$columnName} = ?");
    $stmt->execute([$feedbackId]);

    echo json_encode(['success' => $stmt->rowCount() > 0]);
} else {
    echo json_encode(['success' => false]);
}
?>