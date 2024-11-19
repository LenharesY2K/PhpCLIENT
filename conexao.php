<?php
$servidor = "localhost";
$usuario = "root";
$senha = "";
$banco = "noodle";

$conexao = new mysqli($servidor, $usuario, $senha, $banco);

if($conexao -> connect_error){
    die("falha na conexao: ". $conexao ->connect_error);
}
?>