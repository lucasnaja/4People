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

	include_once('../../../../assets/src/php/Connection.php');

	$sql = $database->prepare(
		'SELECT message_id, message_name, message_email, message_subject, message_content, message_read
			FROM messages
			ORDER BY message_read, message_createdAt'
	);

	$sql->execute();

	if ($sql->rowCount()) {
		foreach ($sql as $key) {
			extract($key);
			$data["msg_$message_id"] = [$message_id, $message_name, $message_email, $message_subject, $message_content, $message_read];
		}

		echo json_encode($data);
	} else echo '{}';
} catch (PDOException $e) {
	echo '{}';
}
