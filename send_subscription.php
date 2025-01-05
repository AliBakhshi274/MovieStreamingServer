<?php

require_once 'connection.php';

if($_SERVER['REQUEST_METHOD'] == 'POST'){
	
	$email = $_POST['email'];
	$subscription = $_POST['subscription'];
	
	$query = "UPDATE users SET description = '$description' WHERE email = '$email' ";
	
	$result['message'] = "Success"; 
	$result['Success'] = "1"; 
	
	
	echo json_encode($result);
	
	
	@mysqli_close($connection);
	
}

?>