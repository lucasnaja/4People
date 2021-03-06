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

	$section_id = filter_input(INPUT_GET, 'section_id', FILTER_DEFAULT);

	$sql = $database->prepare('DELETE FROM sections WHERE section_id = :section_id');
	$sql->bindValue(':section_id', $section_id);

	if ($sql->execute()) {
		echo '{"status":"1"}';

		$sql = $database->prepare('INSERT INTO admin_logs VALUES (NULL, "delete.section", CURRENT_TIMESTAMP, :admin_id)');
		$sql->bindValue(':admin_id', $_SESSION['logged']['id']);
		$sql->execute();
	} else echo '{"status":"0"}';
} catch (PDOException $e) {
	echo '{"status":"0"}';
}
