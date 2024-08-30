<?php 
session_start();

$feedback = $_SESSION['feedback'];

$tablechoose = ['feedback']; 
if (!in_array($feedback, $tablechoose)) {
    die('Invalid table name.');
}

$fullname = $_POST['fullname'];
$comment = $_POST['comment'];
$rating = $_POST['rating'];

include('connection2data.php');

try {

   $sql = "INSERT INTO $fdbkTable (`fullname`, `comment`, `rating`) 
        VALUES (:name, :comment, :rating)";

    $stmt = $connection->prepare($sql);
    
    $stmt->bindParam(':name', $fullname);
    $stmt->bindParam(':comment', $comment);
    $stmt->bindParam(':rating', $rating);


    $stmt->execute();


   
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}

header('location: ../../index.php');

?>

