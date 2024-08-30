<?php 
$servername = 'localhost';
$username = 'root';
$password = '';

//connection
try {
	$connection = new PDO("mysql:host=$servername;dbname=inventory_base", $username, $password);

	$connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (Exception $e) {
	$sql_connection_error = $e->getMessage();
}
 ?>