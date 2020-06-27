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
    <?php
    include 'modules-html/header.php';
    ?>
    <div id="buttons">
        <img onclick="openPage('matematica')" src="src/images/matematica.png" alt="Matematica">
        <img onclick="openPage('natureza')" src="src/images/natureza.png" alt="Natureza">
        <img onclick="openPage('humanas')" src="src/images/humanas.png" alt="Humanas">
        <img onclick="openPage('linguagens')" src="src/images/linguagens.png" alt="Linguagens">

    </div>
    <?php
    include 'modules-html/footer.php';
    ?>
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