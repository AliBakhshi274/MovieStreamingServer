<?php

require_once 'connection.php';

$category_name = @$_GET['category_name'];
$name = @$_GET['name'];


$myquery = " SELECT * FROM  information_home WHERE category_name = '$category_name' AND name LIKE '%$name%' ";
	
	$result = @mysqli_query($connection,$myquery);
	
	if($result){
		
		$response ['movie_streaming'] = array(); 
		
		while($row = @mysqli_fetch_array($result)){
			
			$movie_streaming = array();
			
			$movie_streaming['id']      = $row['id'];			
			$movie_streaming['name']    = $row['name'];						
			$movie_streaming['link_img']    = $row['link_img'];			
			$movie_streaming['time']    = $row['time'];			
			$movie_streaming['category_name']    = $row['category_name'];			
			$movie_streaming['rank']    = $row['rank'];			
			$movie_streaming['rate_imdb']    = $row['rate_imdb'];			
			$movie_streaming['published']    = $row['published'];			
			$movie_streaming['director']    = $row['director'];			
			$movie_streaming['genre']    = $row['genre'];			


			array_push($response['movie_streaming'],$movie_streaming);
			
		}

	}
	
	else{
		
		$response ['success'] = "nothing";
	
	}
	
	echo (json_encode($response));
	
	@mysqli_close($connection);


?>