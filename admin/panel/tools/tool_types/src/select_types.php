<?php
try {
	header('Access-Control-Allow-Origin: localhost');
	header('Access-Control-Allow-Methods: GET');
	header('Content-Type: application/json; charset=UTF-8');

	session_start();
	if (!isset($_SESSION['logged'])) {
		header('HTTP/1.0 404 Not Found');
		exit();
	}

	include_once('../../../../../assets/src/php/Connection.php');

	$sql = $database->prepare('SELECT * FROM types');
	$sql->execute();

	if ($sql->rowCount()) {
		foreach ($sql as $key) {
			extract($key);
			$data[$type_id] = [$type_name, $type_path, $type_icon];
		}

		echo json_encode($data);
	} else echo '{}';
} catch (PDOException $e) {
	echo '{}';
}
