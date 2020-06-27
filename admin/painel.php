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
                $query = "INSERT INTO `app_info` (`id`, `version`, `date`) VALUES (NULL, '{$_POST['version']}', CURRENT_DATE());";
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
        <div id="versionUpdate" class="left">
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
    </div>
</body>

</html>