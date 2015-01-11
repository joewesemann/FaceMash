<?php

try {
	$pdo = new PDO('mysql:host=localhost;dbname=facemash', 'root', '');
} catch(PDOException $e) {
	exit('Databse error.');
}

?>