
<?php include "cabecalho.php"; ?>
<div class="card">
    <div class="card-header">
        Lista de Clientes
    </div>    
    <div class="card-body">
        <form action="clientes.php" method="get">
            <div class="row">
                    <div class="col-md-2">
                        <a class="btn btn-secondary" href="novo_cliente.php">
                            Cadastrar Clientes
                        </a>
                    </div>
                    <div class="col-md-8">
                        <input class="form-control" value="<?php if(isset($_GET['consulta'])){ echo $_GET['consulta']; } ?>" name="consulta" type="text" />
                    </div>
                    <div class="col-md-2">
                        <button type="submit" class="btn btn-secondary">
                            Pesquisar
                        </button>
                    </div>
            </div><!--Fechamento do row -->
        </form>
    </div><!--Fechamento do card-body -->
</div><!--Fechamento do card -->

<?php
        include "conexao.php";
        $sql = "SELECT ID, PRIMEIRO_NOME, SOBRENOME, DATA_NASCIMENTO, ENDERECO, EMAIL, SENHA, SALARIO_MENSAL, ATIVO FROM clientes order by ID desc";
        $resultado = mysqli_query($conexao,$sql);
        if(isset($_GET['consulta']) && !empty($_GET['consulta']) )
        {
            $consulta = $_GET['consulta'];
            $sql = "SELECT ID, PRIMEIRO_NOME, SOBRENOME, DATA_NASCIMENTO, ENDERECO, EMAIL, SENHA, SALARIO_MENSAL, ATIVO  FROM clientes
                    WHERE PRIMEIRO_NOME like '%$consulta%'
                     order by ID desc";
            $resultado = mysqli_query($conexao,$sql);
        }
        else
        {
            $sql = "SELECT ID, PRIMEIRO_NOME, SOBRENOME, DATA_NASCIMENTO, ENDERECO, EMAIL, SENHA, SALARIO_MENSAL, ATIVO FROM clientes order by ID desc";
            $resultado = mysqli_query($conexao,$sql);
        }
        
?>
<table class="table table-striped table-hover table-bordered">
        <thead>
            <tr>
                <th class="col-1">ID</th>
                <th class="col-1">Primeiro Nome</th>
                <th class="col-1">Sobrenome</th>
                <th class="col-1">Data de Nascimento</th>
                <th class="col-1">Endereco</th>
                <th class="col-1">Email</th>
                <th class="col-1">Senha</th>
                <th class="col-1">Salario Mensal</th>
                <th class="col-1">Ativo</th>
                <th class="col-1"></th>
            </tr>
        </thead>
        <tbody>
            <?php
           
            if ($resultado->num_rows > 0) {
                
                while($row = $resultado->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . $row["ID"] . "</td>";
                    echo "<td>" . $row["PRIMEIRO_NOME"] . "</td>";
                    echo "<td>" . $row["SOBRENOME"] . "</td>";
                    echo "<td>" . $row["DATA_NASCIMENTO"] . "</td>";
                    echo "<td>" . $row["ENDERECO"] . "</td>";
                    echo "<td>" . $row["EMAIL"] . "</td>";
                    echo "<td>" . $row["SENHA"] . "</td>";
                    echo "<td>" . $row["SALARIO_MENSAL"] . "</td>";
                    echo "<td>" . $row["ATIVO"] . "</td>";

                    echo "<td><a href='editar_cliente.php?id=$row[ID]' class='btn btn-warning' >Editar</a>";
                    echo "<br>";
                    echo "<a class='btn btn-danger' href='excluir_cliente.php?id=$row[ID]' >Excluir</a></td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='3'>Nenhum registro encontrado</td></tr>";
            }
            $conexao->close();
            ?>
        </tbody>
    </table>