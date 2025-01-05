<?php

require_once 'connection.php';

$id_season = @$_GET['id_season'];

$myquery = " SELECT * FROM  episode WHERE id_season = '$id_season' ";
	
	$result = @mysqli_query($connection,$myquery);
	
	if($result){
		
		$response ['movie_streaming'] = array(); 
		
		while($row = @mysqli_fetch_array($result)){
			
			$movie_streaming = array();
			
			$movie_streaming['id']      = $row['id'];					
			$movie_streaming['id_season']    = $row['id_season'];			
			$movie_streaming['name']    = $row['name'];			
			$movie_streaming['time']      = $row['time'];								
			$movie_streaming['detail']      = $row['detail'];								
			$movie_streaming['link_img']    = $row['link_img'];		
			$movie_streaming['link_play_episode']    = $row['link_play_episode'];			


			array_push($response['movie_streaming'],$movie_streaming);
			
		}

	}
	
	else{
		
		$response ['success'] = "nothing";
	
	}
	
	echo (json_encode($response));
	
	@mysqli_close($connection);


?>