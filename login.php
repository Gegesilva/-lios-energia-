<?php
session_start();

include('conexão.php');
if(empty($_POST['usuario']) || empty($_POST['senha'])){
    header('Location: index.html');
    exit();
}


$usuario= mysqli_real_escape_string($conexao, $_POST['usuario']);

$senha = mysqli_real_escape_string($conexao, $_POST['senha']);



$query = "select * from usuario WHERE usuario = '{$usuario}' AND senha = ('{$senha}');";

$result = mysqli_query($conexao, $query);

$row = mysqli_num_rows($result);

echo $row;

if($row==1){
   $_SESSION['usuario'] = $usuario;
   header('Location: painel.php');
   exit();
}
else {
    header('Location: index.html');
    exit();
}
