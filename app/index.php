<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Athenados</title>
    <link rel="stylesheet" href="css/app.css">
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
            <img src="src/images/logo-header.png" alt="Athenados">
        </div>
    </div>
    <div id="buttons">
        <img onclick="openPage('matematica/index.html')" src="src/images/matematica.png" alt="Matematica">
        <img onclick="openPage('natureza/index.html')" src="src/images/natureza.png" alt="Natureza">
        <img onclick="openPage('humanas/index.html')" src="src/images/humanas.png" alt="Humanas">
        <img onclick="openPage('linguagens/index.html')" src="src/images/linguagens.png" alt="Linguagens">

    </div>
    <div class="footer">
    <a rel="license" href="http://creativecommons.org/licenses/by/3.0/"><img alt="Creative Commons License" style="border-width:0" src="https://i.creativecommons.org/l/by/3.0/80x15.png" /><br></a>Esse trabalho é licensiado pela <a rel="license" href="http://creativecommons.org/licenses/by/3.0/">Creative Commons Attribution 3.0 Unported License</a>.
    </div> 
    <script>
        function openPage(url) {
            window.location.href = url
        }
    </script>
    <script data-ad-client="ca-pub-8031069757508954" async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
    <script type="text/javascript">
        var infolinks_pid = 3269565;
        var infolinks_wsid = 0;
    </script>
    <script type="text/javascript" src="//resources.infolinks.com/js/infolinks_main.js"></script>
</body>

</html>