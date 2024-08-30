<?php
include('../index/connection2data.php');

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['acc_req_id'])) {
    $accReqId = $_GET['acc_req_id'];

    $stmt = $connection->prepare("DELETE FROM accreq WHERE acc_req_id = :acc_req_id");
    $stmt->bindParam(':acc_req_id', $accReqId, PDO::PARAM_INT);

    if ($stmt->execute()) {
    header('Location: ../../management-LR.php?message=success');
    } else {
    header('Location: ../../management-LR.php?message=failure');
    }
}
?>