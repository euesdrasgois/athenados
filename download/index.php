<?php
include '../admin/conexao.php';
$_query = "SELECT * FROM app_info";
$_result = mysqli_query($conexao, $_query);
$rows = mysqli_num_rows($_result);
$query = "SELECT counter FROM app_info WHERE id = {$rows}";
$result = mysqli_query($conexao, $query);
$_counter = mysqli_fetch_row($result);
$counter = $_counter[0];
$counter = intval($counter);
$new_counter = $counter + 1;
$new_query = "UPDATE `app_info` SET `counter` = '{$new_counter}' WHERE `app_info`.`id` = {$rows};";
$new_result = mysqli_query($conexao, $new_query);
header('Location: Athenados.apk')
?>