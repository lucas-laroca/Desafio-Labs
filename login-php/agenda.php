<?php
session_start();
include('verifica_login.php');
include_once('conexao.php');
$result_usuario = "SELECT * FROM usuario";
$result_usuario = mysqli_query($conexao, $result_usuario);
while($row_usuario = mysqli_fetch_assoc($result_usuario))
?>