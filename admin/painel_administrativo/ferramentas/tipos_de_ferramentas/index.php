<?php
include_once('../../../../assets/assets.php');

if (!isset($_SESSION['logged'])) {
	header('HTTP/1.0 404 Not Found');
	exit();
}
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
	<link rel="stylesheet" href="<?= $assets ?>/src/css/materialize.min.css">
	<link rel="stylesheet" href="<?= $assets ?>/src/css/material-icons.css">
	<link rel="stylesheet" href="<?= $assets ?>/src/css/main.css">
	<link rel="stylesheet" href="<?= $assets ?>/src/css/bars.css">
	<link rel="stylesheet" href="src/index.css">
	<title>Tipos de Ferramentas - 4People</title>
	<?php include_once("$assets/components/admin_components/meta_tags.php") ?>
</head>

<body class="grey lighten-4">
	<?php
	include_once("$assets/components/noscript.php");
	include_once("$assets/components/spinner.php");
	include_once("$assets/components/header.php");
	include_once("$assets/components/admin_components/sidenav.php")
	?>

	<main>
		<div class="container">
			<div class="card-panel z-depth-2 top-div-margin" style="padding-bottom:10px">
				<h1 class="flow-text" style="margin:0 0 5px"><i class="material-icons left">folder</i>Adicionar um Tipo de Ferramentas</h1>
				<label>Adicionar um novo Tipo de Ferramentas no 4People</label>

				<div class="divider"></div>

				<form style="margin-top:15px" action="src/insert_type.php" method="POST">
					<div class="row mb-0">
						<div class="input-field col s12 m6">
							<i class="material-icons prefix">format_size</i>
							<input id="type_name" title="Preencha este campo com o nome." placeholder="Tipo de Ferramenta" class="validate" type="text" name="type_name" oninvalid="this.setCustomValidity('Preencha este campo com o nome.')" oninput="setCustomValidity('')" required>
							<label class="active" for="type_name">Nome *</label>
							<span class="helper-text" data-error="Tipo de Ferramenta inválido." data-success="Tipo de Ferramenta válida.">Ex: Computação</span>
						</div>

						<div class="input-field col s12 m6">
							<i class="material-icons prefix">folder</i>
							<input id="type_path" title="Preencha este campo com o caminho." placeholder="Caminho da Ferramenta" class="validate" type="text" name="type_path" oninvalid="this.setCustomValidity('Preencha este campo com o caminho.')" oninput="setCustomValidity('')" required>
							<label class="active" for="type_path">Path *</label>
							<span class="helper-text" data-error="Caminho de Ferramenta inválido." data-success="Caminho de Ferramenta válido.">Ex: computacao</span>
						</div>

						<div class="input-field col s12">
							<i class="material-icons prefix">insert_emoticon</i>
							<input id="type_icon" title="Preencha este campo com o ícone." placeholder="Ícone de Ferramenta" class="validate" type="text" name="type_icon" oninvalid="this.setCustomValidity('Preencha este campo com o ícone.')" oninput="setCustomValidity('')" required>
							<label class="active" for="type_icon">Ícone *</label>
							<span class="helper-text" data-error="Ícone de Ferramenta inválido." data-success="Ícone de Ferramenta válido.">Ex: computer</span>
						</div>

						<div class="col s12">
							<div class="divider"></div>
							<button title="Inserir Tipo de Ferramentas no 4People" class="btn waves-effect waves-light indigo darken-4 mt-2 z-depth-0">
								<i class="material-icons left">folder</i>Inserir
								<input class="hide" type="submit" value="">
							</button>
						</div>
					</div>
				</form>

				<div class="top-div indigo darken-4"></div>
			</div>

			<div class="card-panel left-div-margin" style="padding-bottom:10px">
				<h2 class="flow-text" style="margin: 0 0 5px"><i class="material-icons left">format_list_bulleted</i>Lista de Tipos de Ferramentas</h2>
				<label>Lista de Tipos de Ferramentas do 4People</label>
				<div class="divider"></div>

				<table class="centered highlight responsive-table">
					<thead>
						<tr>
							<th>Nome</th>
							<th>Ícone</th>
							<th>Caminho</th>
							<th>Operações</th>
						</tr>
					</thead>

					<tbody>
						<?php include_once('src/select_types.php') ?>
					</tbody>
				</table>

				<div class="left-div indigo darken-4"></div>
			</div>
		</div>
	</main>

	<div id="removeType" class="modal">
		<div class="modal-content left-div-margin">
			<h4><i class="material-icons left" style="top:7px">delete</i>Remover Tipo</h4>
			<p class="mb-0">Você tem certeza que deseja remover <span id="type"></span>?</p>

			<div class="left-div indigo darken-4" style="border-radius:0"></div>
		</div>

		<div class="divider"></div>

		<div class="modal-footer">
			<button title="Cancelar" class="modal-close btn waves-effect waves-light indigo darken-4 z-depth-0"><i class="material-icons left">close</i>Cancelar</button>
			<a id="linkRemoveType" title="Remover Tipo" class="modal-close btn waves-effect waves-light red accent-4 z-depth-0"><i class="material-icons left">delete</i>Remover</a>
		</div>
	</div>

	<script src="<?= $assets ?>/src/js/materialize.min.js"></script>
	<script src="<?= $assets ?>/src/js/clipboard.min.js"></script>
	<script src="<?= $assets ?>/src/js/index.js"></script>
	<script src="<?= $assets ?>/src/js/main.js"></script>
	<script>
		M.Modal.init(document.querySelectorAll('.modal'))

		const linkRemoveType = document.querySelector('#linkRemoveType')
		const lblType = document.querySelector('#type')
		const btnsCopy = document.querySelectorAll('.copy')

		new ClipboardJS(btnsCopy).on('success', () => {
			M.toast({
				html: 'Caminho copiado com sucesso.',
				classes: 'green'
			})
		})

		const changeLink = (link, type) => {
			linkRemoveType.href = link
			lblType.innerHTML = type
		}
	</script>
</body>

</html>
