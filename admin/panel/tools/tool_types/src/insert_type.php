<?php
try {
	header('Access-Control-Allow-Origin: localhost');
	header('Access-Control-Allow-Methods: POST');
	header('Content-Type: application/json; charset=UTF-8');

	session_start();
	if (!isset($_SESSION['logged'])) {
		header('HTTP/1.0 404 Not Found');
		exit();
	}

	include_once('../../../../../assets/src/php/Connection.php');

	$type_name = ucwords(trim(filter_input(INPUT_POST, 'type_name', FILTER_DEFAULT)));
	$type_path = strtolower(trim(filter_input(INPUT_POST, 'type_path', FILTER_DEFAULT)));
	$type_icon = trim(filter_input(INPUT_POST, 'type_icon', FILTER_DEFAULT));

	$sql = $database->prepare('INSERT INTO types VALUES (DEFAULT, :type_name, :type_path, :type_icon)');

	$sql->bindValue(':type_name', $type_name);
	$sql->bindValue(':type_path', $type_path);
	$sql->bindValue(':type_icon', $type_icon);

	if ($sql->execute()) {
		echo '{"status":"1"}';

		$sql = $database->prepare('INSERT INTO admin_logs VALUES (NULL, "insert.type", CURRENT_TIMESTAMP, :admin_id)');
		$sql->bindValue(':admin_id', $_SESSION['logged']['id']);
		$sql->execute();
	} else echo '{"status":"0"}';
} catch (PDOException $e) {
	echo '{"status":"0"}';
}
