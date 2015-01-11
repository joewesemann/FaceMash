
<?php
	include_once('../includes/connection.php');

	echo "FaceMash has been restarted with any new images that were added to the directory. Thanks for your support. ilysm.";

	//scan images directory for file paths 
	$dir = '../img';
	$images = array_diff(scandir($dir), array('..', '.'));	

	//truncate the table
	$query = $pdo->prepare('TRUNCATE TABLE images');
	$query->execute();	

	//loop through images and insert into database
	foreach ($images as $value) {
		$query = $pdo->prepare('INSERT INTO images (image_path) VALUES (?)');
		$query->bindValue(1, $value);
		$query->execute();	
	}
?>