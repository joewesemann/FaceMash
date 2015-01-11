<?php
	include_once('includes/connection.php');
	include_once('includes/image.php');

	//store all images with fetch_all query
	$image = new Image;
	$images = $image->fetch_all();

	//count number of rows, store it in imgCount
	$query = $pdo->prepare("SELECT COUNT(*) FROM images");
	$query->execute();
	$imgCountArray = $query->fetch();
	$imgCount = $imgCountArray[0];

	//get random id to pull the image from
	$idLeft = rand(1, $imgCount);
	$idRight = rand(1, $imgCount);

	//make sure the random id's are not the same
	if($idLeft == $idRight){
		$idRight++;
	}
?>

<html>
<head>
	<title>
		FaceMash
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
		<h3>FaceMash</h3>
		Thanks for your support. ilysm.
		<br>Pick One.
		<?php
			//get the first path
			$pathArray = $image->fetch_path($idLeft);
			$pathLeft = $pathArray[0];

			//get the second path
			$pathArray = $image->fetch_path($idRight);
			$pathRight = $pathArray[0];
		?>
		<br>
		<div class="images">
			<form action="score.php" method="POST">
				<input type="image" src="img/<?php echo $pathLeft; ?>" name="imageLeft" width="260" height="235">
				<input type="image" src="img/<?php echo $pathRight; ?>" name="imageRight" width="260" height="235">
				<input type="hidden" name="leftId" value="<?php echo $idLeft; ?>" />
				<input type="hidden" name="rightId" value="<?php echo $idRight; ?>" />
			</form>
		</div>
		<form action="rank.php" method="POST">
			<input type="submit" class="btn btn-success" value="View Current Rankings"/>
		</form>
	</div>
</body>
</html>