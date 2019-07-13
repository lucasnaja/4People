<?php
include_once('../../../../assets/assets.php');

if ($_SESSION['logged']) header('Location: ../../')
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
	<link rel="stylesheet" href="<?= $assets ?>/src/css/materialize.min.css">
	<link rel="stylesheet" href="<?= $assets ?>/src/css/material-icons.css">
	<link rel="stylesheet" href="<?= $assets ?>/src/css/bars.css">
	<link rel="stylesheet" href="src/index.css">
	<title>4People - Registrar-se</title>
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

<body style="background:#242b38">
	<?php include_once("$assets/components/noscript.php") ?>

	<main>
		<div class="container">
			<div class="card-panel z-depth-2 left-div-margin">
				<h1 class="flow-text" style="margin:0 0 5px"><i class="material-icons left">person_add</i>4People - Página de Registro</h1>
				<label>Faça registro e receba muitas vantagens!</label>

				<div class="divider" style="margin-bottom:5px"></div>

				<form style="margin-top:15px" action="src/register.php" method="post">
					<div class="row mb-0">
						<div class="input-field col s12">
							<i class="material-icons prefix">account_circle</i>
							<input minlength="8" title="Preencha este campo com seu nome." placeholder="Nome e sobrenome" class="validate" type="text" name="user_name" oninvalid="this.setCustomValidity('Preencha este campo com seu nome.')" oninput="setCustomValidity('')" required>
							<label>Nome de usuário</label>
							<span class="helper-text" data-error="Nome de usuário inválido. Tamanho mínimo: 8" data-success="Nome de usuário válido.">Ex: Lucas Bittencourt</span>
						</div>

						<div class="input-field col s12">
							<i class="material-icons prefix">mail</i>
							<input title="Preencha este campo com seu e-mail." placeholder="E-mail do usuário" class="validate" type="email" name="user_email" oninvalid="if (this.value === '') this.setCustomValidity('Preencha este campo com seu e-mail.'); else this.setCustomValidity('Este e-mail não é válido.')" oninput="setCustomValidity('')" required>
							<label>E-mail</label>
							<span class="helper-text" data-error="E-mail inválido." data-success="E-mail válido.">Ex: lucasnaja0@gmail.com</span>
						</div>

						<div class="input-field col s12 m6">
							<i class="material-icons prefix">more</i>
							<input minlength="6" title="Preencha este campo com sua senha." placeholder="Senha do usuário" class="validate" type="password" name="user_password" oninvalid="this.setCustomValidity('Preencha este campo com sua senha.')" oninput="setCustomValidity('')" required>
							<label>Senha</label>
							<span class="helper-text" data-error="Senha inválida. Tamanho mínimo: 6" data-success="Senha válida.">Aguardando...</span>
						</div>

						<div class="input-field col s12 m6">
							<i class="material-icons prefix">more</i>
							<input minlength="6" title="Preencha novamente este campo com sua senha." placeholder="Repitir novamente a senha" class="validate" type="password" name="user_password_again" oninvalid="this.setCustomValidity('Preencha novamente este campo com sua senha.')" oninput="setCustomValidity('')" required>
							<label>Repita a senha</label>
							<span class="helper-text" data-error="Senha inválida. Tamanho mínimo: 6" data-success="Senha válida.">Aguardando...</span>
						</div>

						<div class="col s12" style="margin-top:5px">
							<a title="Voltar ao 4People" class="btn indigo darken-4" href="../../">Voltar</a>
							<input title="Registrar no 4People" class="btn indigo darken-4" title="Registar-se" type="submit" value="Registrar-se">
							<a class="btn btn-flat waves-effect right" href="#">Esqueci minha senha</a>
							<a class="btn btn-flat waves-effect right" href="../login/">Entrar</a>
						</div>
					</div>
				</form>

				<div class="left-div indigo darken-4"></div>
			</div>
		</div>
	</main>

	<script src="<?= $assets ?>/src/js/materialize.min.js"></script>
</body>

</html>