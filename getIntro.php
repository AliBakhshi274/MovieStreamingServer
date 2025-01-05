<?php

require_once 'connection.php';

$query = " SELECT * FROM intro ";

$result = mysqli_query($connection,$query);


if($result){
	
	
	$response ['movie_streaming'] = array();
	
	while($row = mysqli_fetch_array($result)){
		
		
		$intro = array();
		
		
		$intro['id'] = $row ['id'];
		$intro['description'] = $row ['description'];
		$intro['link_img'] = $row ['link_img'];
		
		array_push($response ['movie_streaming'],$intro);
		
	}
	
	
}else{
	
	echo "Failed";
	
}

echo json_encode($response);

mysqli_close($connection);



?>