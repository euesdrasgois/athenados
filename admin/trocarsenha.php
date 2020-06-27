<?php
session_start();
include('conexao.php');
if (empty($_POST['oldPass'] || $_POST['newPass'])) {
    header('Location: painel.php');
    exit();
}

$old = mysqli_real_escape_string($conexao, $_POST['oldPass']);
$new = mysqli_real_escape_string($conexao, $_POST['newPass']);

$query = "SELECT * FROM app_login WHERE username = '{$_SESSION['usuario']}' and password = md5('{$old}')";
$result = mysqli_query($conexao, $query);
$rows = mysqli_num_rows($result);

if ($rows == 1) {
    $update_query = "UPDATE `app_login` SET `password` = MD5('{$new}') WHERE `app_login`.`username` = '{$_SESSION['usuario']}'";
    $update_result = mysqli_query($conexao, $update_query);   
    echo $update_query;   
    header('Location: painel.php');
    $_SESSION['trocada'] = true;
    exit();    
}else{
    $_SESSION['nao_trocada'] = true;
    header('Location: painel.php');
    exit();
}