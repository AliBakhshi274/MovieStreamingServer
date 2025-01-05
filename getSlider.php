<?php

require_once 'connection.php';

$query = " SELECT * FROM slider ";

$result = mysqli_query($connection,$query);


if($result){
	
	
	$response ['slider'] = array();
	
	while($row = mysqli_fetch_array($result)){
		
		
		$slider = array();
		
		$slider['id'] = $row ['id'];
		$slider['name'] = $row ['name'];
		$slider['link_img'] = $row ['link_img'];
		$slider['time'] = $row ['time'];
		$slider['published'] = $row ['published'];
		
		array_push($response ['slider'],$slider);
		
	}
	
	
}else{
	
	echo "Failed";
	
}

echo json_encode($response);

mysqli_close($connection);



?>