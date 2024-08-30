   <?php 
$_SESSION['accreq'] = 'accreq'; 
if($_POST){
    include('connection2data.php');
$full_name = $_POST['full_name'];
$phonenumber = $_POST['phonenumber'];


 $query = 'INSERT INTO accreq (`full_name`, `phonenumber`) 
        VALUES (:full_name, :phonenumber)';
$stmt = $connection->prepare($query);
         $stmt->bindParam(':full_name', $full_name);
    $stmt->bindParam(':phonenumber', $phonenumber);

    $stmt->execute();

    header('location: ../../login.php?message=success');
    }?>