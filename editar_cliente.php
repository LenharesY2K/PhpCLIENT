<?php include "cabecalho.php"; include "conexao.php";  ?>

<?php 
if( isset($_POST["PRIMEIRO_NOME"]) && !empty($_POST["PRIMEIRO_NOME"]) &&
    isset($_POST["SOBRENOME"]) && !empty($_POST["SOBRENOME"]) &&
    isset($_POST["DATA_NASCIMENTO"]) && !empty($_POST["DATA_NASCIMENTO"]) &&
    isset($_POST["ENDERECO"]) && !empty($_POST["ENDERECO"]) &&
    isset($_POST["EMAIL"]) && !empty($_POST["EMAIL"]) &&
    isset($_POST["SENHA"]) && !empty($_POST["SENHA"]) &&
    isset($_POST["SALARIO_MENSAL"]) && !empty($_POST["SALARIO_MENSAL"]) &&
    isset($_POST["ATIVO"]) && !empty($_POST["ATIVO"])      
) {
    $PRIMEIRO_NOME = $_POST['PRIMEIRO_NOME'];
    $SOBRENOME = $_POST['SOBRENOME'];
    $DATA_NASCIMENTO = $_POST['DATA_NASCIMENTO'];
    $ENDERECO = $_POST['ENDERECO'];
    $EMAIL = $_POST['EMAIL'];
    $SENHA = $_POST['SENHA'];
    $SALARIO_MENSAL = str_replace(',', '.', $_POST['SALARIO_MENSAL']);
    $ATIVO = $_POST['ATIVO'];
    $ID = $_GET['id']; 

  
    $sql = "UPDATE clientes SET 
                PRIMEIRO_NOME = '$PRIMEIRO_NOME', 
                SOBRENOME = '$SOBRENOME', 
                DATA_NASCIMENTO = '$DATA_NASCIMENTO', 
                ENDERECO = '$ENDERECO', 
                EMAIL = '$EMAIL', 
                SENHA = '$SENHA', 
                SALARIO_MENSAL = '$SALARIO_MENSAL', 
                ATIVO = '$ATIVO' 
            WHERE ID = $ID";

    $resultado = $conexao->query($sql);
    if($resultado) {
        header("location: clientes.php");
    } else {
        echo "<div class='alert alert-danger'>Erro ao salvar os dados</div>";
    }
}


if(isset($_GET['id'])) {
    $ID = $_GET['id'];
    $sql = "SELECT * FROM clientes WHERE ID = $ID";
    $resultado = $conexao->query($sql);
    if ($row = $resultado->fetch_assoc()) {
        $PRIMEIRO_NOME = $row['PRIMEIRO_NOME'];
        $SOBRENOME = $row['SOBRENOME'];
        $DATA_NASCIMENTO = $row['DATA_NASCIMENTO'];
        $ENDERECO = $row['ENDERECO'];
        $EMAIL = $row['EMAIL'];
        $SENHA = $row['SENHA'];
        $SALARIO_MENSAL = $row['SALARIO_MENSAL'];
        $ATIVO = $row['ATIVO'];
    }
}
?>

<style>
form {
            max-width: 300px;
            margin: auto;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        input, button {
            width: 100%;
            margin: 5px 0;
            padding: 8px;
            font-size: 14px;
        }
</style>
<BR><BR>
<center><h1 class= "text-white" >Editar Cadastro de Usuario<h1></center>
<BR>

<form action="editar_cliente.php?id=<?php echo $_GET['id']; ?>" method="post" enctype="multipart/form-data">
    <center><label class="text-white" >Primeiro Nome</label></center>
    <input class="form-control" value="<?php echo $PRIMEIRO_NOME ?? ''; ?>" name="PRIMEIRO_NOME" />
    <br>
    <center><label class="text-white" >Sobrenome</label></center>
    <input class="form-control" value="<?php echo $SOBRENOME ?? ''; ?>" name="SOBRENOME" />
    <br>
    <center><label class="text-white" >Data de Nascimento</label></center>
    <input class="form-control" value="<?php echo $DATA_NASCIMENTO ?? ''; ?>" name="DATA_NASCIMENTO" />
    <br>
    <center><label class="text-white" >Endereço</label></center>
    <input class="form-control" value="<?php echo $ENDERECO ?? ''; ?>" name="ENDERECO" />
    <br>
    <center><label class="text-white" >Email</label></center>
    <input class="form-control" value="<?php echo $EMAIL ?? ''; ?>" name="EMAIL" />
    <br>
    <center><label class="text-white" >Senha</label></center>
    <input class="form-control" value="<?php echo $SENHA ?? ''; ?>" name="SENHA" />
    <br>
    <center><label class="text-white" >Salario Mensal</label></center>
    <input class="form-control" value="<?php echo $SALARIO_MENSAL ?? ''; ?>" name="SALARIO_MENSAL" />
    <br>
    <center><label class="text-white" >Ativo</label></center>
    <input class="form-control" value="<?php echo $ATIVO ?? ''; ?>" name="ATIVO" />
    <br>

    <button type="submit" class="btn btn-secondary">Enviar dados</button>
</form>

<?php include "rodape.php"; ?>
