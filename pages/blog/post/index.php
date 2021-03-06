<?php
$root = '../../..';
include_once("$root/assets/src/php/Main.php");

$post_id = filter_input(INPUT_GET, 'post_id', FILTER_DEFAULT);

$sql = $database->prepare('SELECT COUNT(post_id) FROM posts WHERE post_status = "1" LIMIT 1');
$sql->execute();

$total = $sql->fetchColumn();

$post = $database->prepare(
	'SELECT posts.post_title AS current_post_title, posts.post_image, posts.post_description, posts.post_content, posts.post_visits, posts.post_createdAt, admins.admin_name FROM posts
		INNER JOIN admins ON admins.admin_id = posts.admin_id
		WHERE post_status = "1" AND post_id = :post_id
		LIMIT 1'
);

$post->bindValue(':post_id', $post_id);
$post->execute();

if ($post->rowCount()) extract($post->fetch());
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
	<link rel="stylesheet" href="<?= $assets ?>/src/css/materialize.min.css">
	<link rel="stylesheet" href="<?= $assets ?>/src/css/main.css">
	<link rel="stylesheet" href="<?= $assets ?>/src/css/katex.min.css">
	<link rel="stylesheet" href="<?= $assets ?>/src/css/quill.snow.css">
	<link rel="stylesheet" href="src/xcode.css">
	<link rel="stylesheet" href="src/index.css">
	<title><?= $post->rowCount() ? $current_post_title : 'Erro 404' ?> - Blog do 4People</title>
	<?php include_once("$assets/components/MetaTags.php") ?>
	<meta name="keywords" content="4people,4devs,pessoas,online,ferramentas,desenvolvedores,computacao,matematica,geradores,validadores,faker">
	<meta name="title" content="<?= $post->rowCount() ? $current_post_title : 'Erro 404' ?> - Blog do 4People">
	<meta name="description" content="4People é um site feito para ajudar estudantes, professores, programadores e pessoas em suas atividades diárias.">
	<meta name="application-name" content="4People">
	<meta property="og:title" content="<?= $post->rowCount() ? $current_post_title : 'Erro 404' ?> - Blog do 4People">
	<meta name="twitter:title" content="<?= $post->rowCount() ? $current_post_title : 'Erro 404' ?> - Blog do 4People">
</head>

<body>
	<?php
	include_once("$assets/components/NoScript.php");
	include_once("$assets/components/Spinner.php");
	include_once("$assets/components/Header.php");
	include_once("$assets/components/Sidenav.php")
	?>

	<main>
		<div class="container">
			<div class="card-panel top-div-margin">
				<?php
				setlocale(LC_TIME, 'pt_BR', 'pt_BR.utf-8', 'pt_BR.utf-8', 'portuguese');
				date_default_timezone_set('America/Sao_Paulo');
				if ($post->rowCount()) : ?>
					<h1 class="mont-serrat dark-grey-text" style="font-size:30px;margin:-5px 0 10px"><i class="material-icons left" style="top:6px">comment</i><?= $current_post_title ?></h1>
					<label class="dark-grey-text"><?= $post_description ?>. Autor: <?= $admin_name ?>. Visitas: <span class="number"><?= $post_visits ?></span>. Data: <?= strftime('%A, %d de %B de %Y', strtotime(date($post_createdAt))) ?></label>

					<div class="divider"></div>

					<div class="center-align mt-2">
						<div title="<?= $current_post_title ?>" class="waves-effect waves-light">
							<img class="responsive-img" style="height:300px;margin-bottom:-5px" src="<?= $assets ?>/images/blog_images/<?= $post_image ?>" />
						</div>
					</div>

					<div class="divider mt-2"></div>

					<div id="content" class="mt-0 mb-0 ql-editor"><?= $post_content ?></div>

					<?php
						if (!isset($_SESSION['logged'])) {
							$sql = $database->prepare('SELECT post_visits FROM posts WHERE post_status = "1" AND post_id = :post_id LIMIT 1');
							$sql->bindValue(':post_id', $post_id);
							$sql->execute();

							$visits = $sql->fetchColumn();

							$sql = $database->prepare('UPDATE posts SET post_visits = :post_visits WHERE post_id = :post_id');
							$sql->bindValue(':post_visits', ++$visits);
							$sql->bindValue(':post_id', $post_id);

							if ($sql->execute()) {
								$month = $database->prepare('SELECT month_id FROM months WHERE month_name = :month_name LIMIT 1');
								$month->bindValue(':month_name', strftime('%B', strtotime('today')));
								$month->execute();

								$month_id = $month->fetchColumn();

								$year = $database->prepare('SELECT year_id FROM years WHERE year_number = :year_number LIMIT 1');
								$year->bindValue(':year_number', date('Y'));
								$year->execute();

								if ($year->rowCount() === 1) $year_id = $year->fetchColumn();
								else {
									$year = $database->prepare('INSERT INTO years VALUES (DEFAULT, :current_year)');
									$year->bindValue(':current_year', date('Y'));
									$year->execute();

									$year_id = $database->lastInsertId();

									$month_year = $database->prepare('INSERT INTO months_years VALUES (DEFAULT, "1", :year_id), (DEFAULT, "2", :year_id), (DEFAULT, "3", :year_id), (DEFAULT, "4", :year_id), (DEFAULT, "5", :year_id), (DEFAULT, "6", :year_id), (DEFAULT, "7", :year_id), (DEFAULT, "8", :year_id), (DEFAULT, "9", :year_id), (DEFAULT, "10", :year_id), (DEFAULT, "11", :year_id), (DEFAULT, "12", :year_id)');
									$month_year->bindValue(':year_id', $year_id);
									$month_year->execute();
								}

								$month_year = $database->prepare('SELECT month_year_id FROM months_years WHERE month_id = :month_id AND year_id = :year_id LIMIT 1');
								$month_year->bindValue(':month_id', $month_id);
								$month_year->bindValue(':year_id', $year_id);
								$month_year->execute();

								$month_year_id = $month_year->fetchColumn();

								$post_visit = $database->prepare('SELECT post_visit_id, post_visit_visits FROM post_visits WHERE month_year_id = :month_year_id LIMIT 1');
								$post_visit->bindValue(':month_year_id', $month_year_id);

								if ($post_visit->execute() && $post_visit->rowCount()) {
									$post_visit_data = $post_visit->fetch();

									$sql = $database->prepare('UPDATE post_visits SET post_visit_visits = :post_visit_visits WHERE post_visit_id = :post_visit_id');
									$sql->bindValue(':post_visit_visits', ++$post_visit_data['post_visit_visits']);
									$sql->bindValue(':post_visit_id', $post_visit_data['post_visit_id']);
									$sql->execute();
								} else {
									$sql = $database->prepare('INSERT INTO post_visits VALUES (DEFAULT, DEFAULT, :month_year_id)');
									$sql->bindValue(':month_year_id', $month_year_id);
									$sql->execute();
								}
							}
						} ?>
				<?php else : ?>
					<h1 class="mont-serrat" style="font-size:30px;margin:0 0 5px"><i class="material-icons left" style="top:6px">error</i>Erro 404</h1>
					<label>Erro ao encontrar o post.</label>

					<div class="divider"></div>

					<div class="row mb-0">
						<p class="mont-serrat mt-2 mb-2 red-color-text col s12">Não foi encontrado nenhuma postagem de ID "<?= $post_id ?>"</p>
					</div>
				<?php endif ?>

				<div class="divider mb-2"></div>
				<a title="Voltar ao Blog" href=".." class="btn waves-effect waves-light red-color z-depth-0"><i class="material-icons left">keyboard_return</i>Voltar</a>
				<?php if (isset($_SESSION['logged']) && $post->rowCount()) : ?>
					<a title="Editar informações da postagem" href="<?= $root ?>/admin/panel/blog/data_update/?post_id=<?= $post_id ?>" class="btn waves-effect waves-light btn-green z-depth-0"><i class="material-icons left">edit</i>Editar</a>
				<?php endif ?>

				<div class="top-div dark-grey"></div>
			</div>

			<?php
			$sql = $database->prepare('SELECT * FROM posts WHERE post_id != :post_id AND post_status = "1" ORDER BY RAND() LIMIT 2');
			$sql->bindValue(':post_id', $post_id);
			$sql->execute();

			if ($sql->rowCount()) : ?>
				<div class="card-panel left-div-margin">
					<h2 class="flow-text" style="margin:-5px 0 15px"><i class="material-icons left" style="top:3px">trending_up</i>Veja também:</h2>
					<div class="divider"></div>

					<ul class="collection with-header mb-0">
						<?php foreach ($sql as $data) : extract($data) ?>
							<li class="collection-item">
								<div><?= $post_title ?><a title="Ver <?= $current_post_title ?>" href="./?post_id=<?= $post_id ?>" class="secondary-content"><i class="material-icons red-color-text">send</i></a></div>
							</li>
						<?php endforeach ?>
					</ul>

					<div class="left-div dark-grey"></div>
				</div>
			<?php endif ?>
		</div>
	</main>

	<?php
	include_once("$assets/components/FixedActionButton.php");
	include_once("$assets/components/Footer.php");
	include_once("$assets/components/ServiceWorker.php")
	?>

	<script src="<?= $assets ?>/src/js/materialize.min.js"></script>
	<script src="<?= $assets ?>/src/js/main.js"></script>
	<script>
		const ULs = document.querySelectorAll('#content ul')
		const lblNumbers = document.querySelectorAll('.number')
		const formatter = Intl.NumberFormat('pt-BR')

		for (let i = 0; i < lblNumbers.length; i += 1) {
			const number = lblNumbers[i].textContent
			lblNumbers[i].textContent = formatter.format(number)
		}

		for (let i = 0; i < ULs.length; i++) ULs[i].classList.add('browser-default')
	</script>
</body>

</html>
