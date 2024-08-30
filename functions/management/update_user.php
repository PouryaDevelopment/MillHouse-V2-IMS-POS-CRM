<?php
include('../index/connection2data.php');

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['update'])) {
    $userId = $_POST['update'];
    
    $firstName = $_POST['first_name'][$userId];
    $lastName = $_POST['last_name'][$userId];
    $email = $_POST['email'][$userId];
    $password = $_POST['password'][$userId]; 
    $role = $_POST['role'][$userId];
    $branchId = $_POST['branch_id'][$userId];

    //  update statement
    $sql = "UPDATE users SET first_name = :first_name, last_name = :last_name, email = :email, role = :role, branch_id = :branch_id" .
           (!empty($password) ? ", password = :password" : "") . 
           " WHERE ID = :id";

    $stmt = $connection->prepare($sql);

    // parameters binded
    $stmt->bindParam(':first_name', $firstName);
    $stmt->bindParam(':last_name', $lastName);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':role', $role);
    $stmt->bindParam(':branch_id', $branchId);
    $stmt->bindParam(':id', $userId);

    // binds the password if a new one is provided
    if (!empty($password)) {
        $stmt->bindParam(':password', $password);
    }

    try {
        $stmt->execute();
        header('Location: ../../management-employee.php?message=success');
    } catch (PDOException $e) {
        // handles the PDOException for the branch id being incorrect.
        header('Location: ../../management-employee.php?message=updatefailure');
    }
}
?>