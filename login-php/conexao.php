<?php
define('HOST', '127.0.0.1');
define('USUARIO', 'root');
define('SENHA', '');
define('DB', 'login');

$conexao = mysqli_connect(HOST, USUARIO, SENHA, DB) or die ('Não foi possível conectar');

$columns = array(
    array( '0' => 'idcolaborador'),
    array( '1' => 'nome'),
    array( '2' => 'email'),
    array( '3' => 'cargo'),
    array( '4' => 'telefone'),
);
$result_user = "SELECT idcolaborador, nome, email, cargo, telefone FROM colaborador";
$resultado_user = mysqli_query($conexao, $result_user);
$qnt_linhas = mysqli_num_rows($resultado_user);

$result_usuarios = "SELECT idcolaborador, nome, email, cargo, telefone FROM colaborador WHERE 1=1";
if( !empty($resquestData['search']['value']) ){
    $result_usuarios.=" AND (idcolaborador LIKE '".addslashes( $resquestData['search']['value'])."%' ";
    $result_usuarios.=" OR nome LIKE '".addslashes($resquestData['search']['value'])."%' ";
    $result_usuarios.=" OR email LIKE '".addslashes($resquestData['search']['value'])."%' ";
    $result_usuarios.=" OR cargo LIKE '".addslashes($resquestData['search']['value'])."%' ";
    $result_usuarios.=" OR telefone LIKE '".addslashes($resquestData['search']['value'])."%' ) ";
}
$resultado_usuarios = mysqli_query($conexao, $result_usuarios);
$totalFiltered = mysqli_num_rows($resultado_usuarios);


$dados = array();
$i = 0;
while ($row_usuarios = mysqli_fetch_array($resultado_usuarios)){
    $dado = array ();
    $dado [] = $row_usuarios["idcolaborador"];
    $dado [] = $row_usuarios["nome"];
    $dado [] = $row_usuarios["email"];
    $dado [] = $row_usuarios["cargo"];
    $dado [] = $row_usuarios["telefone"];
    $i++; 
    $dados[$i] = $dado;
}
$json_data = array(
    "draw" => isset ($resquestData['draw'] ),
    "recordsTotal"=> isset($qnt_linhas),
    "recordsFiltrered"=> isset($totalFiltered),
    "data" => $dados
);
//echo json_encode($json_data);
