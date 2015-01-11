<?php
	include_once('includes/connection.php');
	include_once('includes/image.php');
	//include_once('index.php');

	$query = $pdo->prepare('SELECT * FROM images ORDER BY score DESC');
	$query->execute();
	$sortedImages = $query->fetchAll();
?>

<html>
<head>
	<title>
		Rankings
	</title>
	<!-- My Styles -->
	<link rel="stylesheet" href="assets/style.css" />
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css">
	<!-- Optional theme -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap-theme.min.css">
	<!-- Latest compiled and minified JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/js/bootstrap.min.js"></script>
</head>
<body>
	<div class="container">
		<h2>The Top Ten: </h2>
		<ul class="list-group">
			<?php 
				$counter = 1;
				for ($i = 0; $i < 10; $i++) { ?>
					<li class="list-group-item">
						<strong><?php 
							echo $counter;
							$counter++;
						?></strong>
						<div class="rankedImages"><img src="img/<?php echo $sortedImages[$i]['image_path']; ?>"></div>
					</li>
			<?php } ?>
		</ul>
	</div>
</body>
</html>