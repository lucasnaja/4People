<?php include_once('../../../../assets/assets.php') ?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
	<link rel="stylesheet" href="<?= $assets ?>/src/css/materialize.min.css">
	<link rel="stylesheet" href="<?= $assets ?>/src/css/main.css">
	<link rel="stylesheet" href="<?= $assets ?>/src/css/material-icons.css">
	<link rel="stylesheet" href="<?= $assets ?>/src/css/bars.css">
	<link rel="stylesheet" href="src/index.css">
	<title>Contador de Caracteres - 4People</title>
	<?php include_once("$assets/components/meta_tags.php") ?>
	<meta name="keywords" content="4people,4devs,pessoas,online,ferramentas,desenvolvedores,computacao,matematica,geradores,validadores,faker">
	<meta name="title" content="Contador de Caracteres - 4People">
	<meta name="description" content="Contador de Caracteres. 4People é um site feito para ajudar estudantes, professores, programadores e pessoas em suas atividades diárias.">
	<meta name="application-name" content="4People">
	<meta property="og:title" content="Contador de Caracteres - 4People">
	<meta name="twitter:title" content="Contador de Caracteres - 4People">
</head>

<body>
	<?php
	include_once("$assets/components/noscript.php");
	include_once("$assets/components/spinner.php");
	include_once("$assets/components/header.php");
	include_once("$assets/components/sidenav.php")
	?>

	<main>
		<div class="container">
			<div class="card-panel top-div-margin">
				<h1 class="mont-serrat" style="font-size:30px;margin:5px 0 5px 0"><i class="material-icons left red-color-text" style="top:5px"><?= $icon_section ?></i><?= $name_tool ?></h1>

				<label><?= $description_tool ?></label>
				<div class="divider" style="margin-top:10px"></div>

				<textarea class="mt-2" id="text" placeholder="Digite aqui o texto" oninput="countChars()"></textarea>

				<ul class="collection mb-0">
					<li class="collection-item">Caracteres: <span id="chars">0</span></li>
					<li class="collection-item">Caracteres sem espaço: <span id="charsWSpaces">0</span></li>
					<li class="collection-item">Palavras: <span id="words">0</span></li>
					<li class="collection-item">Espaços: <span id="spaces">0</span></li>
					<li class="collection-item">Vogais: <span id="vowels">0</span></li>
					<li class="collection-item">Consoantes: <span id="consonants">0</span></li>
					<li class="collection-item">Números: <span id="numbers">0</span></li>
					<li class="collection-item">Linhas: <span id="lines">0</span></li>
				</ul>

				<div class="top-div dark-grey"></div>
			</div>

			<?php
			$sql = $database->prepare(
				'SELECT tools.tool_name, tools.tool_path FROM tools
					INNER JOIN sections ON sections.section_id = tools.section_id
					WHERE tools.tool_status = "1" AND tools.tool_name != :tool_name AND sections.section_name = :section_name 
					ORDER BY RAND()
					LIMIT 2'
			);

			$sql->bindValue(':section_name', $name_section);
			$sql->bindValue(':tool_name', $name_tool);
			$sql->execute();

			if ($sql->rowCount() > 0) : ?>
				<div class="card-panel left-div-margin">
					<h1 class="flow-text" style="margin:0 0 5px"><i class="material-icons left">trending_up</i>Veja também:</h1>
					<div class="divider"></div>

					<ul class="collection with-header mb-0">
						<?php foreach ($sql as $data) : extract($data) ?>
							<li class="collection-item">
								<div><?= $tool_name ?><a href="../<?= $tool_path ?>/" class="secondary-content"><i class="material-icons red-color-text">send</i></a></div>
							</li>
						<?php endforeach ?>
					</ul>

					<div class="left-div dark-grey"></div>
				</div>
			<?php endif ?>
		</div>
	</main>

	<?php
	include_once("$assets/components/footer.php");
	include_once("$assets/components/service_worker.php")
	?>

	<script src="<?= $assets ?>/algorithms/string_functions/charactersCount.js"></script>
	<script src="<?= $assets ?>/src/js/materialize.min.js"></script>
	<script src="src/index.js"></script>
	<script src="<?= $assets ?>/src/js/main.js"></script>
</body>

</html>
