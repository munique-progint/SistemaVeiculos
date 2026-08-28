<?php

include("../includes/verifica_login.php");
include("../includes/conexao.php");

session_start();

$caminho = "../";
$sql = "SELECT veiculos.*, marcas.marca
        FROM veiculos
        INNER JOIN marcas
        ON veiculos.id_marca = marcas.id";
$resultado = mysqli_query($conexao, $sql);

?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Veículos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../css/estilo.css">

</head>

<body class="bg-light">
    <?php include("../includes/menu.php"); ?>
    <div class="container mt-4">

        <?php

        if (isset($_SESSION["msg"])) {
            echo "<div class='alert " . $_SESSION["class"] . "'>";
            echo $_SESSION["msg"];
            echo "</div>";

            unset($_SESSION["msg"]);
            unset($_SESSION["class"]);

        }

        ?>

        <div class="card shadow">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h3 class="mb-0">Veículos</h3>

                <a href="cadastrar.php" class="btn btn-primary">
                    Novo Veículo
                </a>
            </div>

            <div class="card-body">

                <table class="table table-striped table-hover">
                    <thead>
                        <tr>

                            <th>ID</th>
                            <th>Modelo</th>
                            <th>Marca</th>
                            <th>Potência</th>
                            <th>Ano</th>
                            <th>Tipo</th>
                            <th width="180">Ações</th>
                        </tr>

                    </thead>
                    <tbody>

                        <?php

                        while ($linha = mysqli_fetch_array($resultado)) {
                        ?>
                            <tr>
                                <td>
                                    <?php echo $linha["id"]; ?>
                                </td>

                                <td>
                                    <?php echo $linha["modelo"]; ?>
                                </td>

                                <td>
                                    <?php echo $linha["marca"]; ?>
                                </td>

                                <td>
                                    <?php echo $linha["potencia"]; ?>
                                </td>

                                <td>
                                    <?php echo $linha["ano_fabricacao"]; ?>
                                </td>

                                <td>
                                    <?php echo $linha["tipo"]; ?>
                                </td>

                                <td>

                                    <a href="editar.php?id=<?php echo $linha["id"]; ?>" class="btn btn-warning btn-sm">
                                        Editar
                                    </a>
                                    <a href="excluir.php?id=<?php echo $linha["id"]; ?>"
                                       class="btn btn-danger btn-sm"
                                       onclick="return confirm('Deseja realmente excluir este veículo?');">
                                        Excluir
                                    </a>

                                </td>
                            </tr>

                        <?php

                        }
                        ?>

                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>