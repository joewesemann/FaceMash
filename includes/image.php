<?php

class Image {
	public function fetch_all() {
		global $pdo;

		$query = $pdo->prepare("SELECT * FROM images");
		$query->execute();

		return $query->fetchAll();
	}

	public function fetch_path($image_id) {
		global $pdo;

		$query = $pdo->prepare("SELECT image_path FROM images WHERE image_id = ?");
		$query->bindValue(1, $image_id);
		$query->execute();

		return $query->fetch();
	}
}

?>