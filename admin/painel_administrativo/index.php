<?php
include_once('../../assets/assets.php');

if (!isset($_SESSION['logged'])) header('location: ../../../')
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
	<link rel="stylesheet" href="<?= $assets ?>/src/css/materialize.min.css">
	<link rel="stylesheet" href="<?= $assets ?>/src/css/main.css">
	<link rel="stylesheet" href="<?= $assets ?>/src/css/material-icons.css">
	<link rel="stylesheet" href="<?= $assets ?>/src/css/bars.css">
	<link rel="stylesheet" href="<?= $assets ?>/src/css/index.css">
	<title>4People - Ferramentas Online</title>
	<?php include_once("$assets/components/meta_tags.php") ?>
	<meta name="keywords" content="4people,4devs,pessoas,online,ferramentas,desenvolvedores,computacao,matematica,geradores,validadores,faker">
	<meta name="title" content="4People - Ferramentas Online">
	<meta name="description" content="4People é um site feito para ajudar estudantes, professores, programadores e pessoas em suas atividades diárias.">
	<meta name="application-name" content="4People">
	<meta name="msapplication-starturl" content="./">
	<meta property="og:title" content="4People - Ferramentas Online">
	<meta name="twitter:title" content="4People - Ferramentas Online">
	<meta property="og:url" content="./">
	<meta name="twitter:url" content="./">
</head>

<body class="grey lighten-3">
	<?php
	include_once("$assets/components/noscript.php");
	include_once("$assets/components/spinner.php");
	include_once("$assets/components/header.php");
	include_once("$assets/components/admin_components/sidenav.php")
	?>

	<main>
		<div class="container">
			<div class="card-panel z-depth-2 top-div-margin">
				<h1 class="flow-text" style="margin:0 0 5px"><i class="material-icons left">verified_user</i>4People - Painel Administrativo</h1>
				<label>Painel Administrativo do 4People</label>

				<div class="divider" style="margin-bottom:5px"></div>

				<div class="top-div indigo darken-4"></div>
			</div>
		</div>
	</main>

	<div id="agreements" class="modal">
		<div class="modal-content">
			<h4>Termos de uso</h4>
			<div class="divider"></div>
			<p>
				O 4People tem como intenção ajudar estudantes, Programadores, analistas, etc. no seu dia a dia.
				Normalmente necessários parar testar seus softwares em desenvolvimento.
				A má utilização das Ferramentas é de total responsabilidade do usuário.
				Os algoritmos são públicos e de código aberto, não contendo acesso a dados existentes e de pessoas reais.
			</p>

			<p class="mb-0">
				<label>
					<input type="checkbox">
					<span>Eu li e aceito os termos de uso</span>
				</label>
			</p>
		</div>

		<div class="divider"></div>

		<div class="modal-footer">
			<a href="#" class="modal-close waves-effect btn-flat" disabled>Aceito</a>
		</div>

		<div class="left-div indigo darken-4" style="border-radius:0 !important"></div>
	</div>

	<script src="<?= $assets ?>/src/js/materialize.min.js"></script>
	<script src="<?= $assets ?>/src/js/index.js"></script>
	<script src="<?= $assets ?>/src/js/main.js"></script>
</body>

</html>
