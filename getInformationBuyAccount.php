<?php

require_once 'connection.php';

$query = " SELECT * FROM buy_account ";

$result = mysqli_query($connection,$query);


if($result){
	
	
	$response ['movie_streaming'] = array();
	
	while($row = mysqli_fetch_array($result)){
		
		
		$intro = array();
		
		
		$intro['id'] = $row ['id'];
		$intro['price'] = $row ['price'];
		$intro['month'] = $row ['month'];
		
		array_push($response ['movie_streaming'],$intro);
		
	}
	
	
}else{
	
	echo "Failed";
	
}

echo json_encode($response);

mysqli_close($connection);



?>