<?php
session_start();
include('conexao.php');
if (empty($_POST['usuario'] || $_POST['senha'])) {
    header('Location: index.php');
    exit();
}

$username = mysqli_real_escape_string($conexao, $_POST['usuario']);
$password = mysqli_real_escape_string($conexao, $_POST['senha']);

$query = "SELECT * FROM app_login WHERE username = '{$username}' and password = md5('{$password}')";
$result = mysqli_query($conexao, $query);
$rows = mysqli_num_rows($result);

if($rows == 1){
    $querynome = "SELECT nome FROM app_login WHERE username = '{$username}'";
    $resultnome = mysqli_query($conexao, $querynome);
    $nomeArray = mysqli_fetch_row($resultnome);
    $nome = $nomeArray[0];
    $_SESSION['usuario'] = $username;
    $_SESSION['nome'] = $nome;
    header('Location: painel.php');
    exit();
}else{
    $_SESSION['nao_autenticado'] = true;
    header('Location: index.php');
    exit();
}