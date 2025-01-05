<?php

require_once 'connection.php';

$email = @$_GET['email'];


$query = " SELECT subscription FROM users WHERE email = '$email' ";
	
	$result = @mysqli_query($connection,$query);
	
	if($result){
		
		$response ['movie_streaming'] = array(); 
		
		while($row = @mysqli_fetch_array($result)){
			
			$movie_streaming = array();
			
			$movie_streaming['subscription']      = $row['subscription'];

			array_push($response['movie_streaming'],$movie_streaming);
			
		}

	}
	
	else{
		
		$response ['success'] = "nothing";
	
	}
	
	echo (json_encode($response));
	
	@mysqli_close($connection);


?>