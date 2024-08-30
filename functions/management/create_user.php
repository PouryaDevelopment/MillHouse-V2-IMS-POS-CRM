<?php
include('../index/connection2data.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $firstName = $_POST['first_name'];
    $lastName = $_POST['last_name'];
    $email = $_POST['email'];
    $password = $_POST['password']; 
    $role = $_POST['role'];
    $branchId = $_POST['branch_id'];

    

    // insert statement
    $stmt = $connection->prepare("INSERT INTO users (first_name, last_name, email, password, role, branch_id) VALUES (:first_name, :last_name, :email, :password, :role, :branch_id)");

    // Bind parameters
    $stmt->bindParam(':first_name', $firstName);
    $stmt->bindParam(':last_name', $lastName);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':password', $password); 
    $stmt->bindParam(':role', $role);
    $stmt->bindParam(':branch_id', $branchId);

    if ($stmt->execute()) {
        header('Location: ../../management-employee.php?message=success');
    } else {
        header('Location: ../../management-Addemployee.php?message=failure');
        exit();
    }
}
?>