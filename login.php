<?php

require_once 'connection.php';

$email=@$_POST['email'];
$phone=@$_POST['phone'];
$password=@$_POST['password'];


$isValidEmail = filter_var($email, FILTER_VALIDATE_EMAIL);

if($connection){
	
	if($isValidEmail === false){
		
		echo "Email not validate!";
	
	}else{
		
		$queryCheckEmail = "SELECT * FROM users WHERE email LIKE '$email' ";
		$emailQuery = mysqli_query($connection, $queryCheckEmail);
		
		if(mysqli_num_rows($emailQuery) > 0){
			
			$queryCheckLogin = "SELECT * FROM users WHERE email LIKE '$email' AND phone LIKE '$phone' AND password LIKE '$password' ";
			$loginQuery = mysqli_query($connection, $queryCheckEmail);
			
			if(mysqli_num_rows($loginQuery) > 0){
				echo "Login was successful";
			}else{
				echo "Login failed!";
			}
			
			
		
		}else{
			
			echo "Email not exists!";
			
		}
	
	}

}else{
	
	echo "Connection failed!";
}



?>