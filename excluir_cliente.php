<?php 
if( !empty($_GET['id']) && isset( $_GET['id'] ) )
{
    
    include 'conexao.php';
    $sql = "Delete from clientes where ID = $_GET[id]";
    $resultado = $conexao->query($sql);
    if($resultado)
    {
        header('location: clientes.php');
    }
    else
    {
        header('location: clientes.php?Erro=Erro ao excluir');
    }
}
else
{
    header('location: clientes.php');
}
?>