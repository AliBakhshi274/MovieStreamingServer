<?php

require_once 'connection.php';

$id_item = @$_GET['id_item'];

$myquery = " SELECT * FROM  cast WHERE id_item = '$id_item' ";
	
	$result = @mysqli_query($connection,$myquery);
	
	if($result){
		
		$response ['movie_streaming'] = array(); 
		
		while($row = @mysqli_fetch_array($result)){
			
			$movie_streaming = array();
			
			$movie_streaming['id']      = $row['id'];					
			$movie_streaming['name']      = $row['name'];								
			$movie_streaming['link_img']    = $row['link_img'];		
			$movie_streaming['id_item']    = $row['id_item'];			

			array_push($response['movie_streaming'],$movie_streaming);
			
		}

	}
	
	else{
		
		$response ['success'] = "nothing";
	
	}
	
	echo (json_encode($response));
	
	@mysqli_close($connection);


?>