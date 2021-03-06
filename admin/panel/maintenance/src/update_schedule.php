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

	include_once('../../../../assets/src/php/Connection.php');

	$maintenance_id = filter_input(INPUT_POST, 'maintenance_id', FILTER_DEFAULT);
	$maintenance_name = filter_input(INPUT_POST, 'maintenance_name', FILTER_DEFAULT);
	$maintenance_begin_date = filter_input(INPUT_POST, 'maintenance_begin_date', FILTER_DEFAULT);
	$maintenance_end_date = filter_input(INPUT_POST, 'maintenance_end_date', FILTER_DEFAULT);
	$maintenance_begin_time = filter_input(INPUT_POST, 'maintenance_begin_time', FILTER_DEFAULT);
	$maintenance_end_time = filter_input(INPUT_POST, 'maintenance_end_time', FILTER_DEFAULT);
	$maintenance_begin = NULL;
	$maintenance_end = NULL;

	if ($maintenance_begin_date !== '') {
		if ($maintenance_begin_time === '') $maintenance_begin_time = date('H:i:s');

		$maintenance_begin = date('Y-m-d H:i:s', strtotime("$maintenance_begin_date $maintenance_begin_time"));
	}

	if ($maintenance_end_date !== '') {
		if ($maintenance_end_time === '') $maintenance_end_time = date('H:i:s');

		$maintenance_end = date('Y-m-d H:i:s', strtotime("$maintenance_end_date $maintenance_end_time"));
	}

	$sql = $database->prepare('UPDATE maintenances SET maintenance_name = :maintenance_name, maintenance_begin = :maintenance_begin, maintenance_end = :maintenance_end WHERE maintenance_id = :maintenance_id');

	$sql->bindValue(':maintenance_id', $maintenance_id);
	$sql->bindValue(':maintenance_name', $maintenance_name);
	$sql->bindValue(':maintenance_begin', $maintenance_begin);
	$sql->bindValue(':maintenance_end', $maintenance_end);

	if ($sql->execute()) {
		echo '{"status":"1"}';

		$sql = $database->prepare('INSERT INTO admin_logs VALUES (NULL, "update.schedule", CURRENT_TIMESTAMP, :admin_id)');
		$sql->bindValue(':admin_id', $_SESSION['logged']['id']);
		$sql->execute();
	} else echo '{"status":"0"}';
} catch (PDOException $e) {
	echo '{"status":"0"}';
}
