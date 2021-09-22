<?php
session_start();
include('conexao.php');

$nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_STRING);
$email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
$cargo = filter_input(INPUT_POST, 'cargo', FILTER_SANITIZE_STRING);
$telefone = filter_input(INPUT_POST, 'telefone', FILTER_SANITIZE_STRING);

$result_usuario = "INSERT INTO colaborador (nome, email, cargo, telefone) VALUES ('$nome', '$email', '$cargo', '$telefone')";
mysqli_query($conexao, $result_usuario);

if(mysqli_insert_id($conexao)){
    $_SESSION['msg'] = "<p style='color:green;'>Colaborador registrado com sucesso</p>";
    header("Location: painel.php");
}else{
    $_SESSION['msg'] = "<p style='color:red;'>Colaborador NÃO registrado </p>";
    header("Location: painel.php");
}
