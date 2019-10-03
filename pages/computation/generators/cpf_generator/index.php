<?php include_once('../../../../assets/assets.php') ?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
	<link rel="stylesheet" href="<?= $assets ?>/src/css/materialize.min.css">
	<link rel="stylesheet" href="<?= $assets ?>/src/css/main.css">
   <link rel="stylesheet" href="<?= $assets ?>/src/css/material-icons.css">
	<link rel="stylesheet" href="<?= $assets ?>/src/css/bars.css">
	<link rel="stylesheet" href="src/index.css">
	<title>Gerador de CPF - 4People</title>
	<?php include_once("$assets/components/meta_tags.php") ?>
	<meta name="keywords" content="4people,4devs,pessoas,online,ferramentas,desenvolvedores,computacao,matematica,geradores,validadores,faker">
	<meta name="title" content="Gerador de CPF - 4People">
	<meta name="description" content="Gerador de CPF Online para gerar CPFs verdadeiros. 4People é um site feito para ajudar estudantes, professores, programadores e pessoas em suas atividades diárias.">
	<meta name="application-name" content="4People">
	<meta name="msapplication-starturl" content="./computacao/geradores/gerador_de_cpf/">
	<meta property="og:title" content="Gerador de CPF - 4People">
	<meta name="twitter:title" content="Gerador de CPF - 4People">
	<meta property="og:url" content="./computacao/geradores/gerador_de_cpf/">
	<meta name="twitter:url" content="./computacao/geradores/gerador_de_cpf/">
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
				<h1 class="flow-text" style="margin:0 0 5px"><i class="material-icons left">autorenew</i>Gerador de CPF</h1>

				<label><?= $description ?></label>
				<div class="divider"></div>

				<div class="row mb-0" style="position:relative">
					<div class="col s12 m6">
						<div class="row mb-0">
							<p class="mb-0 col s12">Gerar com pontuação:</p>

							<div class="col s12">
								<p>
									<label>
										<input class="with-gap" name="punctuation" type="radio" checked>
										<span>Sim</span>
									</label>

									<label class="ml-4">
										<input class="with-gap" name="punctuation" type="radio">
										<span>Não</span>
									</label>
								</p>
							</div>
						</div>
					</div>

					<div class="col s12 m6">
						<div class="row mb-0">
							<p class="mb-0 col s12">Estado:</p>
							<div class="input-field col s12">
								<select>
									<option value="-1" selected>Aleatório</option>
									<option value="2">Acre</option>
									<option value="4">Alagoas</option>
									<option value="2">Amazonas</option>
									<option value="2">Amapá</option>
									<option value="5">Bahia</option>
									<option value="3">Ceará</option>
									<option value="1">Distrito Federal</option>
									<option value="7">Espírito Santo</option>
									<option value="1">Goiás</option>
									<option value="3">Maranhão</option>
									<option value="6">Minas Gerais</option>
									<option value="1">Mato Grosso do Sul</option>
									<option value="1">Mato Grosso</option>
									<option value="4">Pará</option>
									<option value="4">Paraíba</option>
									<option value="4">Pernambuco</option>
									<option value="3">Piauí</option>
									<option value="9">Paraná</option>
									<option value="7">Rio de Janeiro</option>
									<option value="4">Rio Grande do Norte</option>
									<option value="0">Rio Grande do Sul</option>
									<option value="2">Rondônia</option>
									<option value="2">Roraima</option>
									<option value="9">Santa Catarina</option>
									<option value="5">Sergipe</option>
									<option value="8">São Paulo</option>
									<option value="1">Tocantins</option>
								</select>
							</div>
						</div>
					</div>
				</div>

				<div class="divider mb-2"></div>
				<button title="Gerar CPF" class="btn btn-center waves-effect waves-light btn-green z-depth-2" onclick="generate()">
					Gerar CPF
				</button>
				<div class="divider mt-2"></div>

				<textarea class="mt-2" id="result" placeholder="Resultado" spellcheck="false" readonly></textarea>
				<button title="Copiar CPF" class="btn waves-effect waves-light dark-grey mt-1 z-depth-0" onclick="copyResult()">
					Copiar
				</button>
				<button title="Limpar CPF" class="btn waves-effect waves-light dark-grey mt-1 z-depth-0" onclick="clearInput()">
					Limpar
				</button>

				<div class="top-div dark-grey"></div>
			</div>

			<div class="card-panel left-div-margin">
				<h1 class="flow-text" style="margin:0 0 5px"><i class="material-icons left">trending_up</i>Veja também:</h1>
				<div class="divider"></div>

				<ul class="collection with-header mb-0">
					<li class="collection-item">
						<div>Gerador de Senhas<a href="<?= $root ?>/" class="secondary-content"><i class="material-icons btn-green-text">send</i></a></div>
					</li>
					<li class="collection-item">
						<div>Gerador de Cartão de Crédito<a href="<?= $root ?>/" class="secondary-content"><i class="material-icons btn-green-text">send</i></a></div>
					</li>
				</ul>

				<div class="left-div dark-grey"></div>
			</div>
		</div>
	</main>

	<?php
   include_once("$assets/components/footer.php");
   include_once("$assets/components/service_worker.php")
   ?>

	<script src="<?= $assets ?>/algorithms/generators/CPFGenerator.js"></script>
	<script src="<?= $assets ?>/src/js/materialize.min.js"></script>
	<script src="src/index.js"></script>
	<script src="<?= $assets ?>/src/js/main.js"></script>
</body>

</html>