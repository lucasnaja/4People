<?php
include_once('../../assets/assets.php');

if (isset($_SESSION['logged'])) {
	header("Location: $root/");
	exit();
}
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
	<link rel="stylesheet" href="<?= $assets ?>/src/css/materialize.min.css">
	<link rel="stylesheet" href="<?= $assets ?>/src/css/material-icons.css">
	<link rel="stylesheet" href="<?= $assets ?>/src/css/bars.css">
	<link rel="stylesheet" href="src/index.css">
	<title>Painel de Login</title>
	<?php include_once("$assets/components/admin_components/meta_tags.php") ?>
</head>

<body style="background-color:#ebebeb">
	<?php include_once("$assets/components/noscript.php") ?>

	<header class="navbar-fixed">
		<nav class="z-depth-2">
			<a href="#" data-target="slide-out" class="sidenav-trigger right"><i class="material-icons">menu</i></a>
			<div class="nav-wrapper">
				<a href="<?= $root ?>" class="brand-logo center hide-on-large-only">4People</a>
				<ul id="nav-mobile" class="hide-on-med-and-down">
					<li title="Página Inicial" class="waves-effect"><a href="<?= $root ?>/">Página Inicial</a></li>
					<?php
					if (isset($_SESSION['logged'])) : ?>
						<li title="Painel Administrativo" class="waves-effect"><a href="<?= $root ?>/admin/panel/"><i class="material-icons left">verified_user</i>Painel Administrativo</a></li>
						<li title="Sair" class="waves-effect"><a href="<?= $assets ?>/php/Logout.php"><i class="material-icons left">exit_to_app</i>Sair</a></li>
					<?php else : ?>
						<?php
							include_once("$assets/php/Connection.php");
							$sql = $database->prepare('SELECT type_name, type_path, type_icon FROM types');
							$sql->execute();

							foreach ($sql as $data) : extract($data) ?>
							<li title="<?= $type_name ?>" class="waves-effect"><a href="<?= $root ?>/<?= $type_path ?>/"><?= $type_name ?></a></li>
						<?php endforeach ?>
					<?php endif ?>
				</ul>
			</div>
		</nav>
	</header>

	<ul id="slide-out" class="sidenav collapsible grey lighten-5">
		<li style="position:relative">
			<div class="user-view mb-0 left-div-margin-mobile" style="background: #FAFAFA !important;border-bottom:1px solid #E0E0E0">
				<div class="background"></div>
				<img title="Logo" class="circle" src="<?= $assets ?>/images/logo.png" alt="Logo">
				<span class="name black-text">4People - Ferramentas Online</span>
				<a class="linkHover" href="<?= $root ?>/pages/about/"><span class="email">Sobre o 4People »</span></a>
			</div>

			<div class="left-div-mobile dark-grey" style="border-radius:0"></div>
		</li>

		<li>
			<ul class="padding-headers padding-buttons">
				<li>
					<ul>
						<li><a class="waves-effect" href="<?= $root ?>/pages/about/" title="Sobre - 4People"><i class="material-icons left">keyboard_arrow_right</i>Sobre</a></li>
						<li><a class="waves-effect" href="<?= $root ?>/pages/contact/" title="Fale Conosco - 4People"><i class="material-icons left">keyboard_arrow_right</i>Fale Conosco</a></li>
						<?php
						$sql = $database->prepare('SELECT type_name, type_path FROM types');
						$sql->execute();

						foreach ($sql as $data) : extract($data) ?>
							<li><a class="waves-effect" href="<?= $root ?>/<?= $type_path ?>/" title="<?= $type_name ?>"><i class="material-icons left">keyboard_arrow_right</i><?= $type_name ?></a></li>
						<?php endforeach ?>
					</ul>
				</li>
			</ul>
		</li>
	</ul>

	<main style="background-color:transparent">
		<div class="container">
			<div class="card-panel z-depth-3 left-div-margin" style="padding-bottom:10px">
				<?php
				include_once("$assets/php/Connection.php");
				$sql = $database->prepare('SELECT admin_id FROM admins LIMIT 1');
				$sql->execute();

				if ($sql->rowCount()) : ?>
					<h1 class="flow-text" style="margin:0 0 5px"><i class="material-icons left">person</i>Painel Administrativo - Login</h1>
					<label>Painel de Login Administrativo. Área restrita!</label>

					<div class="divider"></div>

					<form style="margin-top:15px" name="formLogin" method="POST">
						<div class="row mb-0">
							<div class="input-field col s12">
								<i class="material-icons prefix">account_circle</i>
								<input id="admin_nickname" minlength="4" title="Preencha este campo com seu Login." placeholder="Login de Administrador" class="validate" type="text" name="admin_nickname" oninvalid="this.setCustomValidity('Preencha este campo com seu Login.')" oninput="setCustomValidity('')" required>
								<label class="active" for="admin_nickname">Login</label>
								<span class="helper-text" data-error="Login inválido." data-success="Login válido.">Aguardando...</span>
							</div>

							<div class="input-field col s12">
								<i class="material-icons prefix">https</i>
								<input id="admin_password" style="width:calc(100% - 4.5rem)" minlength="6" title="Preencha este campo com sua senha." placeholder="Senha de Administrador" class="validate" type="password" name="admin_password" oninvalid="this.setCustomValidity('Preencha este campo com sua senha.')" oninput="setCustomValidity('')" required>
								<label class="active" for="admin_password">Senha</label>
								<i id="visibility" onclick="switchVisibility()" class="material-icons prefix" style="cursor:pointer">visibility</i>
								<span class="helper-text" data-error="Senha inválida." data-success="Senha válida.">Aguardando...</span>
							</div>

							<div class="col s12" style="margin-top:5px">
								<div class="divider"></div>
								<a title="Voltar ao 4People" class="btn btn-green mt-2 z-depth-0" href="../../"><i class="material-icons left">arrow_back</i>Voltar</a>

								<span id="bannedStatus"></span>

								<button title="Logar no 4People" class="btn btn-green mt-2 z-depth-0 right"><i class="material-icons right">arrow_forward</i>Entrar</button>
							</div>
						</div>
					</form>
				<?php else : ?>
					<h1 class="flow-text" style="margin:0 0 5px"><i class="material-icons left">person_add</i>Adicionar um Administrador</h1>
					<label>Adicionar um novo Administrador ao 4People</label>

					<div class="divider"></div>

					<form style="margin-top:15px" name="formInsert" method="POST" enctype="multipart/form-data">
						<div class="row mb-0">
							<div class="input-field col s12 m6">
								<i class="material-icons prefix">person</i>
								<input id="admin_name" minlength="4" title="Preencha este campo com o nome." placeholder="Login de Administrador" class="validate" type="text" name="admin_name" oninvalid="this.setCustomValidity('Preencha este campo com o nome.')" oninput="setCustomValidity('')" required>
								<label class="active" for="admin_name">Nome *</label>
								<span class="helper-text" data-error="Nome de Administrador inválido." data-success="Nome de Administrador válido.">Ex: Lucas Bittencourt</span>
							</div>

							<div class="input-field col s12 m6">
								<i class="material-icons prefix">account_circle</i>
								<input id="admin_nickname" minlength="8" title="Preencha este campo com o login." placeholder="Login de Administrador" class="validate" type="text" name="admin_nickname" oninvalid="this.setCustomValidity('Preencha este campo com o login.')" oninput="setCustomValidity('')" required>
								<label class="active" for="admin_nickname">Login *</label>
								<span class="helper-text" data-error="Login de Administrador inválido. Tamanho mínimo: 8" data-success="Login de Administrador válido.">Ex: lucasnaja</span>
							</div>

							<div class="input-field col s12">
								<i class="material-icons prefix">mail</i>
								<input id="admin_email" title="Preencha este campo com o e-mail." placeholder="E-mail do Administrador" class="validate" type="email" name="admin_email" oninvalid="if (this.value === '') this.setCustomValidity('Preencha este campo com o e-mail.'); else this.setCustomValidity('Este e-mail não é válido.')" oninput="setCustomValidity('')" required>
								<label class="active" for="admin_email">E-mail *</label>
								<span class="helper-text" data-error="E-mail inválido." data-success="E-mail válido.">Ex: lucasnaja0@gmail.com</span>
							</div>

							<div class="input-field col s12 m6">
								<i class="material-icons prefix">https</i>
								<input id="admin_password" style="width:calc(100% - 4.5rem)" minlength="6" title="Preencha este campo com a senha." placeholder="Senha do Administrador" class="validate" type="password" name="admin_password" oninvalid="this.setCustomValidity('Preencha este campo com a senha.')" oninput="setCustomValidity('')" required>
								<i id="visibility" onclick="switchVisibility()" class="material-icons prefix" style="cursor:pointer">visibility</i>
								<label class="active" for="admin_password">Senha *</label>
								<span class="helper-text" data-error="Senha inválida. Tamanho mínimo: 6" data-success="Senha válida.">Aguardando...</span>
							</div>

							<div class="file-field input-field col s12 m6">
								<i class="material-icons prefix">image</i>
								<input type="file" name="admin_image" accept=".png, .jpg, .jpeg, .svg, .gif">
								<input style="width:calc(100% - 3rem)" placeholder="Selecionar imagem" type="text" class="file-path">
								<label class="active">Imagem</label>
								<span class="helper-text">.png, .jpg, .jpeg, .svg, .gif</span>
							</div>

							<div class="col s12">
								<div class="divider"></div>
								<button title="Inserir um Administrador no 4People" class="btn waves-effect waves-light btn-green mt-2 z-depth-0"><i class="material-icons left">person_add</i>Inserir</button>
							</div>
						</div>
					</form>
				<?php endif ?>

				<div class="left-div dark-grey" style="border-radius:0"></div>
			</div>
		</div>
	</main>

	<?php include_once("$assets/components/service_worker.php") ?>

	<script src="<?= $assets ?>/src/js/materialize.min.js"></script>
	<script src="src/index.js"></script>
	<script src="<?= $assets ?>/src/js/sidenav.js"></script>
</body>

</html>
