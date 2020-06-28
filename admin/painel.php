<?php
session_start();
include 'verifica_login.php';
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Painel Administrativo - Athenados</title>
    <link rel="stylesheet" href="css/painel.css">
</head>

<body>
    <?php
    include '../app/modules-html/header.php'
    ?>

    <?php
    $mensagem = null;
    if (isset($_POST['enviar'])) :
        $formatosPermitidos = ["apk"];
        $extensao = pathinfo($_FILES['arquivo']['name'], PATHINFO_EXTENSION);
        if (in_array($extensao, $formatosPermitidos)) {
            $pasta = "../download/";
            $temporario = $_FILES['arquivo']['tmp_name'];
            $novonome = "Athenados" . ".$extensao";
            if (move_uploaded_file($temporario, $pasta . $novonome)) {
                $mensagem = "Upload feito com sucesso!";
                include 'conexao.php';
                $query = "INSERT INTO `app_info` (`id`, `version`, `date`, `counter`) VALUES (NULL, '{$_POST['version']}', CURRENT_DATE(), 0);";
                $result = mysqli_query($conexao, $query);
            } else {
                $mensagem = "Erro. Não foi possível completar o upload.";
            }
        } else {
            $mensagem = "Formato inválido!";
        }

    endif;
    ?>

    <div class="content">
        <?php
        echo "<h1>Bem vindo, {$_SESSION['nome']}! <a style='font-size: 12pt' href='logout.php'>Sair</a></h1>"
        ?>
        <div class="all">
            <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST" enctype="multipart/form-data">
                <h2>Enviar Atualização</h2>
                <label for="version">Nome da Versão: </label><input type="text" name="version" id="version"><br>
                <input type="file" name="arquivo" id="arquivo"><br>
                <input type="submit" value="Enviar" name="enviar" id="enviar">
            </form>
            <?php
            if ($mensagem) {
                echo $mensagem;
            }
            ?>
        </div>
        <div class="all">
            <?php
            include '../admin/conexao.php';
            $_query = "SELECT * FROM app_info";
            $_result = mysqli_query($conexao, $_query);
            $rows = mysqli_num_rows($_result);
            $query_version = "SELECT version FROM app_info WHERE id = {$rows}";
            $result_version = mysqli_query($conexao, $query_version);
            $_version = mysqli_fetch_row($result_version);
            $version = $_version[0];
            //--------------------------------------
            $query_date = "SELECT date FROM app_info WHERE id = {$rows}";
            $result_date = mysqli_query($conexao, $query_date);
            $_date = mysqli_fetch_row($result_date);
            $date = $_date[0];
            //----------------------------------------
            $query_counter = "SELECT counter FROM app_info WHERE id = {$rows}";
            $result_counter = mysqli_query($conexao, $query_counter);
            $_counter = mysqli_fetch_row($result_counter);
            $counter = $_counter[0];
            //-------------------------------------------
            $downloads = 0;
            for ($i = 1; $i <= $rows; $i++) {
                $query_down = "SELECT counter FROM app_info WHERE id = {$i}";
                $result_down = mysqli_query($conexao, $query_down);
                $_down = mysqli_fetch_row($result_down);
                $down = $_down[0];
                $down = intval($down);
                $downloads += $down;
            }

            echo "
                <h2>Informações do Aplicativo</h2>
                <p>Versão Atual: <span id='second'>" . $version . "</span></p>
                <p>Data da atualização: <span id='second'>" . $date . "</span></p>
                <p>Usuários atualizados: <span id='second'>" . $counter . "</span></p>
                <p>Total de downloads: <span id='second'>" . $downloads . "</span></p>";
            ?>
        </div>
        <div class="all" id="menor">
            <h2>Trocar Senha</h2>
            <form action="trocarsenha.php" method="post">
                <label for="oldPass">Senha atual: </label><input name="oldPass" type="password">
                <label for="newPass">Nova senha: </label><input name="newPass" type="password">
                <input id="enviar" type="submit" value="Trocar Senha">
            </form>
            <?php
            if (isset($_SESSION['trocada'])) :
            ?>
                Senha trocada com sucesso!
            <?php
            endif;
            unset($_SESSION['trocada']);
            ?>
            <?php
            if (isset($_SESSION['nao_trocada'])) :
            ?>
                Senha inválida!
            <?php
            endif;
            unset($_SESSION['nao_trocada']);
            ?>
        </div>
        <div>
            <textarea name="txtArtigo" id="txtArtigo"></textarea>
        </div>
        <script src="../ckeditor/ckeditor.js"></script>
        <script>
            CKEDITOR.replace('txtArtigo', {language: 'pt-br'});            
        </script>
    </div>
</body>
</html>