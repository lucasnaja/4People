<?php
$root = '../../..';
include_once("$root/assets/src/php/Main.php");

if (!isset($_SESSION['logged'])) {
	include_once("$root/pages/index.html");
	exit();
}
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
	<link rel="stylesheet" href="<?= $assets ?>/src/css/materialize.min.css">
	<link rel="stylesheet" href="src/index.css">
	<link rel="stylesheet" href="<?= $assets ?>/src/css/main.css">
	<title>Logs Administradores - 4People</title>
	<?php include_once("$assets/components/admin_components/MetaTags.php") ?>
</head>

<body>
	<?php
	include_once("$assets/components/NoScript.php");
	include_once("$assets/components/Spinner.php");
	include_once("$assets/components/Header.php");
	include_once("$assets/components/admin_components/Sidenav.php")
	?>

	<main>
		<div class="container">
			<div class="card-panel left-div-margin" style="padding-bottom:10px">
				<h1 class="flow-text dark-grey-text" style="margin:-5px 0 15px"><i class="material-icons left" style="top:3px">format_list_bulleted</i>Logs de Administradores</h1>
				<div class="divider"></div>

				<table class="centered highlight responsive-table">
					<thead>
						<tr>
							<th>Nome</th>
							<th>E-mail</th>
							<th>Ação</th>
							<th>Horário</th>
						</tr>
					</thead>

					<tbody id="logs"></tbody>
				</table>

				<div class="left-div dark-grey"></div>
			</div>

			<div class="card-panel" style="padding-top:10px">
				<div class="center-align">
					<button title="Anterior" class="btn waves-effect waves-light red-color z-depth-0" onclick="selectLogs(0)">Anterior</button>
					<button title="Próxima" class="btn waves-effect waves-light red-color z-depth-0" onclick="selectLogs(1)">Próxima</button>
				</div>

				<div class="left-div dark-grey"></div>
				<div class="right-div dark-grey"></div>
			</div>
		</div>
	</main>

	<?php include_once("$assets/components/FixedActionButton.php");
	include_once("$assets/components/Footer.php") ?>
	<?php include_once("$assets/components/ServiceWorker.php") ?>

	<script src="<?= $assets ?>/src/js/materialize.min.js"></script>
	<script src="<?= $assets ?>/src/js/main.js"></script>
	<script src="src/index.js"></script>
</body>

</html>
