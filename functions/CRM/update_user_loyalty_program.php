<?php
require_once('../index/connection2data.php');

$data = json_decode(file_get_contents('php://input'), true);
$response = ['success' => false];

if (isset($data['id'], $data['pl_id'], $data['program_id'])) {
    $updateStmt = $connection->prepare("UPDATE user_loyalty_program SET pl_id = ?, program_id = ? WHERE id = ?");
    $updateSuccess = $updateStmt->execute([$data['pl_id'], $data['program_id'], $data['id']]);

    if ($updateSuccess) {
        $response['success'] = true;
    }
}

header('Content-Type: application/json');
echo json_encode($response);
?>