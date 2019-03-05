<!DOCTYPE html>
<?php $path = '../../..' ?>
<html lang="pt-br">

<head>
    <?php include_once("$path/componentes/links.php") ?>
    <link rel="stylesheet" href="src/css/index.css">
    <title>Contador de Caracteres - 4People</title>
    <meta name="keywords" content="4people,4devs,pessoas,online,ferramentas,desenvolvedores,computacao,matematica,geradores,validadores,faker">
    <?php include_once("$path/componentes/metas.php") ?>
    <meta name="title" content="Contador de Caracteres - 4People">
    <meta name="description" content="Contador de Caracteres. 4People é um site feito para ajudar estudantes, professores, programadores e pessoas em suas atividades diárias.">
    <meta name="application-name" content="4People">
    <meta name="msapplication-starturl" content="https://4people.now.sh/computacao/funcoes_string/contador_de_caracteres/">
    <meta property="og:title" content="Contador de Caracteres - 4People">
    <meta name="twitter:title" content="Contador de Caracteres - 4People">
    <meta property="og:url" content="https://4people.now.sh/computacao/funcoes_string/contador_de_caracteres/">
    <meta name="twitter:url" content="https://4people.now.sh/computacao/funcoes_string/contador_de_caracteres/">
</head>

<body>
    <?php
    include_once("$path/componentes/noscript.php");
    include_once("$path/componentes/spinner.php")
    ?>

    <header class="hide">
        <?php include_once("$path/componentes/nav.php") ?>

        <ul id="slide-out" class="sidenav sidenav-fixed collapsible">
            <?php include_once("$path/componentes/logo.php") ?>

            <li class="active">
                <div class="collapsible-header"><i class="material-icons">computer</i>Computação</div>
                <div class="collapsible-body">
                    <ul class="collapsible padding-headers">
                        <li>
                            <?php include_once("$path/componentes/computacao/geradores.php") ?>
                        </li>

                        <li>
                            <?php include_once("$path/componentes/computacao/validadores.php") ?>
                        </li>

                        <li class="active">
                            <?php include_once("$path/componentes/computacao/funcoes_string.php") ?>
                        </li>

                        <li>
                            <?php include_once("$path/componentes/computacao/rede_e_internet.php") ?>
                        </li>

                        <li>
                            <?php include_once("$path/componentes/computacao/codif_decodif.php") ?>
                        </li>

                        <li>
                            <?php include_once("$path/componentes/computacao/tabelas_e_padroes.php") ?>
                        </li>
                    </ul>
                </div>
            </li>

            <li>
                <div class="collapsible-header"><i class="material-icons">functions</i>Matemática</div>
                <div class="collapsible-body">
                    <ul class="collapsible padding-headers">
                        <li>
                            <?php include_once("$path/componentes/matematica/calculadoras.php") ?>
                        </li>

                        <li>
                            <?php include_once("$path/componentes/matematica/calcular_areas.php") ?>
                        </li>

                        <li>
                            <?php include_once("$path/componentes/matematica/datas_e_horas.php") ?>
                        </li>
                    </ul>
                </div>
            </li>

            <li>
                <div class="collapsible-header"><i class="material-icons">build</i>Outras Ferramentas</div>
                <div class="collapsible-body">
                    <ul class="collapsible padding-headers">
                        <li>
                            <?php include_once("$path/componentes/outras_ferramentas/dia_a_dia.php") ?>
                        </li>

                        <li>
                            <?php include_once("$path/componentes/outras_ferramentas/jogos.php") ?>
                        </li>
                    </ul>
                </div>
            </li>
        </ul>
    </header>

    <main class="hide">
        <div class="container">
            <div class="card-panel">
                <h1 class="flow-text mt-2">Contador de Caracteres</h1>

                <label>Contador de caracteres, caracteres sem espaço, palavras, espaços, vogais, consoantes, números e linhas.</label>
                <div class="divider"></div>

                <textarea class="mt-2" id="text" placeholder="Digite aqui o texto" oninput="countChars()"></textarea>

                <ul class="collection">
                    <li class="collection-item">Caracteres: <span id="chars">0</span></li>
                    <li class="collection-item">Caracteres sem espaço: <span id="charsWSpaces">0</span></li>
                    <li class="collection-item">Palavras: <span id="words">0</span></li>
                    <li class="collection-item">Espaços: <span id="spaces">0</span></li>
                    <li class="collection-item">Vogais: <span id="vowels">0</span></li>
                    <li class="collection-item">Consoantes: <span id="consonants">0</span></li>
                    <li class="collection-item">Números: <span id="numbers">0</span></li>
                    <li class="collection-item">Linhas: <span id="lines">0</span></li>
                </ul>
            </div>
        </div>
    </main>

    <?php include_once("$path/componentes/footer.php") ?>

    <script src="/algoritmos/characters_count.js"></script>
    <script src="src/js/index.js"></script>
    <script src="/src/js/main.js"></script>
</body>

</html> 