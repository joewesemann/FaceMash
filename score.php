<?php
	include_once('includes/connection.php');
	include_once('includes/image.php');
	include_once('index.php');

	//if left image was chosen
	if(isset($_POST['imageLeft']) or isset($_POST['imageLeft_x'])) {
		$id = $_POST['leftId'];
		
		//add one point to the image
		$query = $pdo->prepare('UPDATE images SET score = score + 1 WHERE image_id = ?');
		$query->bindValue(1, $id);
		$query->execute();		
	}
	//otherwise check if right image was chosen
	else if(isset($_POST['imageRight']) or isset($_POST['imageRight_x'])){
		$id = $_POST['rightId'];

		//add one point to the image
		$query = $pdo->prepare('UPDATE images SET score = score + 1 WHERE image_id = ?');
		$query->bindValue(1, $id);
		$query->execute();
	}


?> 