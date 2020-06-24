<!DOCTYPE html>
<html lang="pt-br">

<head>
    <link rel="stylesheet" type="text/css" href="app/css/index.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Athenados - O ensino médio que cabe no seu bolso</title>
    <link rel="apple-touch-icon" sizes="57x57" href="/apple-icon-57x57.png">
    <link rel="apple-touch-icon" sizes="60x60" href="/apple-icon-60x60.png">
    <link rel="apple-touch-icon" sizes="72x72" href="/apple-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="76x76" href="/apple-icon-76x76.png">
    <link rel="apple-touch-icon" sizes="114x114" href="/apple-icon-114x114.png">
    <link rel="apple-touch-icon" sizes="120x120" href="/apple-icon-120x120.png">
    <link rel="apple-touch-icon" sizes="144x144" href="/apple-icon-144x144.png">
    <link rel="apple-touch-icon" sizes="152x152" href="/apple-icon-152x152.png">
    <link rel="apple-touch-icon" sizes="180x180" href="/apple-icon-180x180.png">
    <link rel="icon" type="image/png" sizes="192x192" href="/android-icon-192x192.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="96x96" href="/favicon-96x96.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
    <link rel="manifest" href="/manifest.json">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="/ms-icon-144x144.png">
    <meta name="theme-color" content="#ffffff">
</head>

<body>
    <?php
    error_reporting(0);
    $host = "sql156.main-hosting.eu";
    $user = "u625718687_athenadosteam";
    $pass = "athenadosinfo";
    $banco = "u625718687_info";
    $connect = mysqli_connect($host, $user, $pass);
    $db = mysqli_select_db($connect, $banco);

    $queryStart = "SELECT version FROM app_info";
    $resultStart = mysqli_query($connect, $queryStart);
    $nVersions = mysqli_num_rows($resultStart);
    //============================================
    $query = "SELECT version FROM app_info WHERE id = $nVersions";
    $result = mysqli_query($connect, $query);
    $versionArray = mysqli_fetch_row($result);
    $version = $versionArray[0];
    mysqli_close($connect);

    if ($connect && isset($_GET['version']) ? $_GET['version'] : "") {
        $app_version = $_GET['version'];
        if ($app_version != $version) {
            echo "<style>*{margin: 0; padding: 0; box-sizing: border-box;}#atualizacao{background-color: red;color: white;font-family: Abel;text-align: center;}
        #atualizacao a {text-decoration: none;color: white;}</style><div id='atualizacao'><strong>ATUALIZAÇÃO ENCONTRADA!!!</strong> BAIXE EM <a href='http://www.athenados.com'><strong>WWW.ATHENADOS.COM</strong></a></div>";
        }
    }
    ?>
    <div class="header">
        <div class='headerMain'>
            <img src="app/src/images/logo-header.png" alt="Athenados">
        </div>
    </div>
    <div class="content">
        <div class="h2">
            <h2>O APLICATIVO</h2>
        </div>
        <div id="o_app">
            <div id="left">
                <img src="app/src/images/app.png" alt="Athenados">
            </div>
            <div id="right">
                <p>
                    O aplicativo <strong>Athenados</strong> é uma iniciativa de 10 alunos do <strong>Centro de Excelência Atheneu
                        Sergipense</strong> que disponibiliza
                    conteúdos de todas as áreas do conhecimento (Ciências Exatas, Ciências da Natureza, Ciências Humanas e
                    Linguagens)
                    criando um clima de melhor aprendizado para os alunos do ensino médio.
                </p>
            </div>
        </div>
        <div class="h2">
            <h2>DOWNLOAD</h2>
        </div>
        <p>
            O nosso aplicativo ainda não chegou Google Play Store (a loja de aplicativos do android). Isso porque ainda
            estamos em
            fase de desenvolvimento e implementação.
        </p>
        <p id="testarApp">
            <strong>PARA TESTAR O APLICATIVO</strong>
        </p>
        <div class="clickHere">
            <a href="download/Athenados.apk" download="Athenados.apk"><img src="app/src/images/click_here.png" alt="Clique aqui"></a>
        </div>
        <div class="h2">
            <h2>FEEDBACK</h2>
        </div>
        <p>O seu <strong>feedback</strong> é muito importante para o desenvolvimento desse aplicativo.
            Envie um email dizendo o que achou do Athenados. </p>
        <div class="clickHere">
            <a href="mailto:suporte@athenados.com"><img src="app/src/images/feedback.png" alt="feedback"></a>
        </div>
        <div class="h2">
            <h2>DESENVOLVIMENTO DO APLICATIVO</h2>
        </div>
        <div id="graphics">
            <div id="g1">
                <?php
                include 'graphs/graph-math.php';
                ?>
            </div>
            <div id="g2">
                <?php
                include 'graphs/graph-nat.php';
                ?></div>

            <div id="g3">
                <?php
                include 'graphs/graph-ling.php';
                ?></div>

            <div id="g4">
                <?php
                include 'graphs/graph-hum.php';
                ?>
            </div>
        </div>
        <div id="descGraphics">
            <span class="descGraphics">Matemática</span>
            <span class="descGraphics">Natureza</span>
            <span class="descGraphics">Linguagens</span>
            <span class="descGraphics">Humanas</span>
        </div>
        <div class="h2">
            <h2>PROFESSORES ORIENTADORES</h2>
        </div>
        <div id="listaProf">
            <div class="prof-b">
                <div id="div-a"><img src="app/src/images/professores/diego-batista.png" alt=""></div>
                <div id="div-b">
                    <div>
                        <span><strong>DIEGO BATISTA</strong></span><br>
                        <span>Formado em Física</span>
                    </div>
                </div>
            </div>
            <div class="prof-a">
                <div id="div-a"><img src="app/src/images/professores/teste.png" alt=""></div>
                <div id="div-b">
                    <div>
                        <span><strong>HERMAN DO LAGO MENDES</strong></span><br>
                        <span>Formação</span>
                    </div>
                </div>
            </div>
            <div class="prof-b">
                <div id="div-a"><img src="app/src/images/professores/teste.png" alt=""></div>
                <div id="div-b">
                    <div>
                        <span><strong>ILSEMA DOS SANTOS CHAGAS</strong></span><br>
                        <span>Formação</span>
                    </div>
                </div>
            </div>
            <div class="prof-a">
                <div id="div-a"><img src="app/src/images/professores/teste.png" alt=""></div>
                <div id="div-b">
                    <div>
                        <span><strong>KÁTIA CRISTINA ELIZABETH DE CARVALHO ARAÚJO DA SILVA</strong></span><br>
                        <span>Formação</span>
                    </div>
                </div>
            </div>
            <div class="prof-b">
                <div id="div-a"><img src="app/src/images/professores/ronney-marcos.png" alt=""></div>
                <div id="div-b">
                    <div>
                        <span><strong>RONNEY MARCOS SANTOS</strong></span><br>
                        <span>Formado em Letras, Mestre em Letras e Doutorando em Letras pela Universidade Federal de Sergipe</span>
                    </div>
                </div>
            </div>
        </div>
        <div class="h2">
            <h2>ALUNOS ENVOLVIDOS</h2>
        </div>
        <table class="alunos">
            <tr>
                <td class="a1">ALINE ESTÉFANE MACHADO FIGUEIREDO <br> 3ºD/2019</td>
                <td class="a2">ANDRIELLY MARIA VARJÃO SILVA <br> 3ºC/2019</td>
                <td class="a1">BEATRIZ CARDOSO DA SILVA CAVALCANTE <br> 3ºD/2019</td>
                <td class="a2">ESDRAS SANTOS GOIS <br> 3ºD/2019</td>
            </tr>
            <tr>
                <td class="a2">GABRIEL REIS SANTANA <br> 2ºD/2019</td>
                <td class="a1">GABRIELA SILVA GOMES <br> 3ºD/2019</td>
                <td class="a2">ÍRIS NÉO ROCHA <br> 3ºF/2019</td>
                <td class="a1">LORENNA SANTOS NASCIMENTO <br> 2ºD/2019</td>
            </tr>
            <tr>
                <td></td>
                <td class="a2">NATANAEL GOMES CARDOSO <br> 2ºA/2019</td>
                <td class="a1">VICTÓRIA GUADALUPE DE OLIVEIRA ARAGÃO <br> 3ºC/2019</td>
                <td></td>
            </tr>
        </table>
    </div>
    <div class="footer">
        <a href="mailto:eueduassessoria@gmail.com"><img src="app/src/images/edu-almeida.png" alt="Eduardo Almeida"></a>
    </div>
</body>

</html>