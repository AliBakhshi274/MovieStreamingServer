<?php

require_once 'connection.php';

$username=@$_POST['username'];
$email=@$_POST['email'];
$phone=@$_POST['phone'];
$password=@$_POST['password'];


$isValidEmail = filter_var($email, FILTER_VALIDATE_EMAIL);

if($connection){
	
	if(strlen($password) > 15 || strlen($password) < 7){
		
		echo "Password length must be less than 15 and more than 7 characters!";
	
	}else if($isValidEmail === false){
		
		echo "Email not validate!";
	}else{
	
		$queryCheckUsername = "SELECT * FROM Users WHERE username LIKE '$username' ";
		$usernameQuery = mysqli_query($connection, $queryCheckUsername);
		
		$queryCheckEmail = "SELECT * FROM users WHERE email LIKE '$email' ";
		$emailQuery = mysqli_query($connection, $queryCheckEmail);
		
		if(mysqli_num_rows($usernameQuery) > 0){
			
			echo "Username already exists!";
		
		}else if(mysqli_num_rows($emailQuery) > 0){
			
			echo "Email alredy exists!";
		
		}else{
			
			$queryRegister = "INSERT INTO users (username, email, phone, password) VALUES ('$username', '$email', '$phone', '$password')";
			
			if(mysqli_query($connection, $queryRegister)){
				
				echo "Register was successful";
			}else{
				echo "Register failed!";
			}
		}
	
	}

}else{
	
	echo "Connection failed!";
}



?>