<?php
include('../index/connection2data.php');

if ($_SERVER['REQUEST_METHOD'] == 'GET' && isset($_GET['id'])) {
    $userId = $_GET['id'];
    
    $stmt = $connection->prepare("DELETE FROM users WHERE ID = :id");
    $stmt->bindParam(':id', $userId, PDO::PARAM_INT);
    
    try {
        $stmt->execute();
        header('Location: ../../management-employee.php?message=success');
    } catch (PDOException $e) {
        // handles PDOException for fk employee_work_schedule entries
        header('Location: ../../management-employee.php?message=failure');
    }
}
?>