<!DOCTYPE html>
<html lang="pt-br">

<head>
    <?php include_once($_SERVER['DOCUMENT_ROOT']."/componentes/links.php") ?>
    <link rel="stylesheet" href="src/index.css">
    <title>Conversor de Código Binário - 4People</title>
    <?php include_once($_SERVER['DOCUMENT_ROOT']."/componentes/metas.php") ?>
    <meta name="keywords" content="4people,4devs,pessoas,online,ferramentas,desenvolvedores,computacao,matematica,geradores,validadores,faker">
    <meta name="title" content="Conversor de Código Binário - 4People">
    <meta name="description" content="Conversor de Código Binário. 4People é um site feito para ajudar estudantes, professores, programadores e pessoas em suas atividades diárias.">
    <meta name="application-name" content="4People">
    <meta name="msapplication-starturl" content="https://4people.now.sh/computacao/codif_decodif/conversor_de_codigo_binario/">
    <meta property="og:title" content="Conversor de Código Binário - 4People">
    <meta name="twitter:title" content="Conversor de Código Binário - 4People">
    <meta property="og:url" content="https://4people.now.sh/computacao/codif_decodif/conversor_de_codigo_binario/">
    <meta name="twitter:url" content="https://4people.now.sh/computacao/codif_decodif/conversor_de_codigo_binario/">
</head>

<body>
    <?php
    include_once($_SERVER['DOCUMENT_ROOT']."/componentes/noscript.php");
    include_once($_SERVER['DOCUMENT_ROOT']."/componentes/spinner.php");
    include_once($_SERVER['DOCUMENT_ROOT']."/componentes/header.php")
    ?>

    <ul id="slide-out" class="sidenav sidenav-fixed collapsible hide">
        <?php include_once($_SERVER['DOCUMENT_ROOT']."/componentes/logo.php") ?>

        <li class="active">
            <div class="collapsible-header"><i class="material-icons">computer</i>Computação</div>
            <div class="collapsible-body">
                <ul class="collapsible padding-headers">
                    <li>
                        <?php include_once($_SERVER['DOCUMENT_ROOT']."/componentes/computacao/geradores.php") ?>
                    </li>

                    <li>
                        <?php include_once($_SERVER['DOCUMENT_ROOT']."/componentes/computacao/validadores.php") ?>
                    </li>

                    <li>
                        <?php include_once($_SERVER['DOCUMENT_ROOT']."/componentes/computacao/funcoes_string.php") ?>
                    </li>

                    <li>
                        <?php include_once($_SERVER['DOCUMENT_ROOT']."/componentes/computacao/rede_e_internet.php") ?>
                    </li>

                    <li class="active">
                        <?php include_once($_SERVER['DOCUMENT_ROOT']."/componentes/computacao/codif_decodif.php") ?>
                    </li>

                    <li>
                        <?php include_once($_SERVER['DOCUMENT_ROOT']."/componentes/computacao/tabelas_e_padroes.php") ?>
                    </li>
                </ul>
            </div>
        </li>

        <li>
            <div class="collapsible-header"><i class="material-icons">functions</i>Matemática</div>
            <div class="collapsible-body">
                <ul class="collapsible padding-headers">
                    <li>
                        <?php include_once($_SERVER['DOCUMENT_ROOT']."/componentes/matematica/calculadoras.php") ?>
                    </li>

                    <li>
                        <?php include_once($_SERVER['DOCUMENT_ROOT']."/componentes/matematica/calcular_areas.php") ?>
                    </li>

                    <li>
                        <?php include_once($_SERVER['DOCUMENT_ROOT']."/componentes/matematica/datas_e_horas.php") ?>
                    </li>
                </ul>
            </div>
        </li>

        <li>
            <div class="collapsible-header"><i class="material-icons">build</i>Outras Ferramentas</div>
            <div class="collapsible-body">
                <ul class="collapsible padding-headers">
                    <li>
                        <?php include_once($_SERVER['DOCUMENT_ROOT']."/componentes/outras_ferramentas/dia_a_dia.php") ?>
                    </li>

                    <li>
                        <?php include_once($_SERVER['DOCUMENT_ROOT']."/componentes/outras_ferramentas/jogos.php") ?>
                    </li>
                </ul>
            </div>
        </li>
    </ul>

    <main class="grey lighten-5 hide">
        <div class="container">
            <div class="card-panel">
                <h1 class="flow-text mt-2">Conversor de Código Binário</h1>

                <label>Tradutor OnLine de código binário e vice-versa, basta digitar abaixo e clicar no botão que desejar.</label>
                <div class="divider"></div>

                <textarea class="mt-2" id="text" placeholder="Digite aqui o texto" spellcheck="false"></textarea>

                <button title="Converter texto para Binário" class="btn waves-effect waves-dark white black-text" onclick="convertToBinary()">
                    Converter para Binário
                </button>
                <button title="Copiar texto" class="btn waves-effect waves-dark white black-text right" onclick="copyResult(txtText)">
                    Copiar
                </button>

                <textarea class="mt-2" id="binary" placeholder="Digite aqui o código binário" spellcheck="false"></textarea>

                <button title="Converter Código Binário para texto" class="btn waves-effect waves-dark white black-text" onclick="convertToText()">
                    Converter para Texto
                </button>
                <button title="Copiar Código Binário" class="btn waves-effect waves-dark white black-text right" onclick="copyResult(txtBinaryCode)">
                    Copiar
                </button>
            </div>
        </div>
    </main>

    <?php include_once($_SERVER['DOCUMENT_ROOT']."/componentes/footer.php") ?>

    <script src="/algoritmos/conversorBinario.js"></script>
    <script src="src/index.js"></script>
    <script src="/src/js/main.js"></script>
</body>

</html> 