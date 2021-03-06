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

	$assets = '../../../../assets';
	include_once("$assets/src/php/Connection.php");
	include_once("$assets/src/php/MD5.php");

	$admin_id = filter_input(INPUT_POST, 'admin_id', FILTER_DEFAULT);
	$admin_name = ucwords(trim(filter_input(INPUT_POST, 'admin_name', FILTER_DEFAULT)));
	$admin_nickname = trim(filter_input(INPUT_POST, 'admin_nickname', FILTER_DEFAULT));
	$admin_email = trim(filter_input(INPUT_POST, 'admin_email', FILTER_DEFAULT));
	$admin_password = trim(filter_input(INPUT_POST, 'admin_password', FILTER_DEFAULT));
	$admin_image = $_FILES['admin_image'];
	$admin_image_text = filter_input(INPUT_POST, 'admin_image_text', FILTER_DEFAULT);

	$current_data = $database->prepare('SELECT admin_password, admin_image FROM admins WHERE admin_id = :admin_id LIMIT 1');
	$current_data->bindValue(':admin_id', $admin_id);
	$current_data->execute();

	$data = $current_data->fetch();
	$current_password = $data['admin_password'];
	$current_admin_image = $data['admin_image'];
	$ext = strtolower(pathinfo($admin_image['name'], PATHINFO_EXTENSION));

	if ($ext) {
		$long_name = "$admin_nickname.$ext";

		if ($current_admin_image) unlink("$assets/images/admin_images/$current_admin_image");
		move_uploaded_file($admin_image['tmp_name'], "$assets/images/admin_images/$long_name");
	} else unset($ext);

	if (isset($admin_image_text) && $admin_image_text === '') {
		$no_image = '';
		if ($current_admin_image) unlink("$assets/images/admin_images/$current_admin_image");
	}

	$sql = $database->prepare(
		'UPDATE admins
		SET admin_name = :admin_name,
			admin_nickname = :admin_nickname,
			admin_email = :admin_email,
			admin_password = :admin_password,
			admin_image = :admin_image
		WHERE admin_id = :admin_id'
	);

	$sql->bindValue(':admin_name', $admin_name);
	$sql->bindValue(':admin_nickname', $admin_nickname);
	$sql->bindValue(':admin_email', $admin_email);
	$sql->bindValue(':admin_password', $admin_password === '' ? $current_password : cript($admin_password));
	$sql->bindValue(':admin_image', isset($no_image) ? NULL : (isset($ext) && $ext ? $long_name : $current_admin_image));
	$sql->bindValue(':admin_id', $admin_id);

	if ($sql->execute()) {
		echo '{"status":"1"}';

		$sql = $database->prepare('INSERT INTO admin_logs VALUES (NULL, "update.administrator", CURRENT_TIMESTAMP, :admin_id)');
		$sql->bindValue(':admin_id', $_SESSION['logged']['id']);
		$sql->execute();
	} else echo '{"status":"0"}';
} catch (PDOException $e) {
	echo '{"status":"0"}';
}
