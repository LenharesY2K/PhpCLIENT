<?php include "cabecalho.php"; ?>
<?php include "conexao.php"; ?>
<BR><BR>
<center><h1 class="text-white">Cadastrar Usuarios</h1></center>
<br>
<?php 
if (isset($_POST["PRIMEIRO_NOME"]) && isset($_POST['SOBRENOME'])&& isset($_POST['DATA_NASCIMENTO'])&& isset($_POST['ENDERECO'])&& isset($_POST['EMAIL'])&& isset($_POST['SENHA'])&& isset($_POST['SALARIO_MENSAL'])&& isset($_POST['ATIVO'])) {
    $PRIMEIRO_NOME = $_POST['SOBRENOME'];
    $SOBRENOME = str_replace(',', '.', $_POST['SOBRENOME']);//deixe o str para salario
    $DATA_NASCIMENTO = $_POST['DATA_NASCIMENTO'];
    $ENDERECO = $_POST['ENDERECO'];
    $EMAIL = $_POST['EMAIL'];
    $SENHA = $_POST['SENHA'];
    $SALARIO_MENSAL = str_replace(',', '.', $_POST['SALARIO_MENSAL']);
    $ATIVO = $_POST['ATIVO'];


    // Insere o produto no banco de dados
    $query = "INSERT INTO clientes (PRIMEIRO_NOME, SOBRENOME, DATA_NASCIMENTO, ENDERECO, EMAIL, SENHA, SALARIO_MENSAL, ATIVO) VALUES ('$PRIMEIRO_NOME', '$SOBRENOME', '$DATA_NASCIMENTO', '$ENDERECO', '$EMAIL', '$SENHA', '$SALARIO_MENSAL', '$ATIVO')";
    $resultado = mysqli_query($conexao, $query);

    if ($resultado) {
        echo "<div class='alert alert-success'>Salvo com sucesso</div>";
        header('Location: clientes.php');
        exit;
    } else {
        echo "<div class='alert alert-danger'>Erro ao salvar o produto: " . mysqli_error($conexao) . "</div>";
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

<br><BR>
<form action="novo_cliente.php" method="post" enctype="multipart/form-data" >
<center><label class="text-white" >Primeiro Nome</label></center>
    <input class="form-control" name="PRIMEIRO_NOME" />
    <br>
    <center><label class="text-white" >Sobrenome</label></center>
    <input class="form-control" name="SOBRENOME" />
    <br>
    <center><label class="text-white" >Data de Nascimento</label></center>
    <input class="form-control" name="DATA_NASCIMENTO" />
    <br>
    <center><label class="text-white" >Endereço</label></center>
    <input class="form-control" name="ENDERECO" />
    <br>
    <center><label class="text-white" >Email</label></center>
    <input class="form-control" name="EMAIL" />
    <br>
    <center><label class="text-white" >Senha</label></center>
    <input class="form-control" name="SENHA" />
    <br>
    <center><label class="text-white" >Salario Mensal</label></center>
    <input class="form-control" name="SALARIO_MENSAL" />
    <br>
    <center><label class="text-white" >Ativo</label></center>
    <input class="form-control" name="ATIVO" />
    <br>
    <button type="submit" class="btn btn-secondary">
        Enviar dados
    </button>
</form>
<br>
<BR>
<BR>

<?php include "rodape.php"; ?>