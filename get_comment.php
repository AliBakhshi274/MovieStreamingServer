<?php

require_once 'connection.php';

$id_item = @$_GET['id_item'];


$query = " SELECT * FROM comment WHERE id_item = '$id_item' AND confirmation = 1 ";
	
	$result = @mysqli_query($connection,$query);
	
	if($result){
		
		$response ['movie_streaming'] = array(); 
		
		while($row = @mysqli_fetch_array($result)){
			
			$movie_streaming = array();
			
			$movie_streaming['email']      = $row['email'];
			$movie_streaming['comment']      = $row['comment'];

			array_push($response['movie_streaming'],$movie_streaming);
			
		}

	}
	
	else{
		
		$response ['success'] = "nothing";
	
	}
	
	echo (json_encode($response));
	
	@mysqli_close($connection);


?>