
   <?php 
$_SESSION['promolist'] = 'promolist'; 
if($_POST){
    include('connection2data.php');
$full_name = $_POST['full_name'];
$email = $_POST['email'];


 $query = 'INSERT INTO promolist (`full_name`, `email`) 
        VALUES (:full_name, :email)';
$stmt = $connection->prepare($query);
         $stmt->bindParam(':full_name', $full_name);
    $stmt->bindParam(':email', $email);


    $stmt->execute();

    header('location: ../../index.php?message=success');
    }?>