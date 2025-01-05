<?php

require_once 'connection.php';

if($_SERVER['REQUEST_METHOD'] == 'POST'){
	
	$id_item = @$_POST['id_item'];
	$comment = @$_POST['comment'];
	$email = @$_POST['email'];
	$confirmation = 0;
	
	$query = "INSERT INTO comment (id_item, comment, email, confirmation ) VALUES ('$id_item', '$comment', '$email', '$confirmation')";
		
	if(mysqli_query($connection , $query)){
		
		
	$result ['message'] = "Success";	
	$result ['Success'] = "1";	
	
	
	echo json_encode($result);
		
	}

	
	@mysqli_close($connection);
	
}

?>