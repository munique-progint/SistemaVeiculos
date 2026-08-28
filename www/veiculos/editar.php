<?php

include("../includes/verifica_login.php");
include("../includes/conexao.php");
$caminho = "../";
$id = $_GET["id"];

if (isset($_POST["modelo"])) {
    $modelo = $_POST["modelo"];
    $id_marca = $_POST["id_marca"];
    $potencia = $_POST["potencia"];
    $ano_fabricacao = $_POST["ano_fabricacao"];
    $tipo = $_POST["tipo"];

    $sql = "UPDATE veiculos
            SET modelo='$modelo',
                id_marca='$id_marca',
                potencia='$potencia',
                ano_fabricacao='$ano_fabricacao',
                tipo='$tipo'
            WHERE id='$id'";

    if (mysqli_query($conexao, $sql)) {

        header("Location: listar.php");
        exit();

    } else {
        echo "Houve um erro ao editar o veículo.";
    }

}

$sql = "SELECT * FROM veiculos WHERE id='$id'";
$resultado = mysqli_query($conexao, $sql);
$veiculo = mysqli_fetch_array($resultado);

$sql = "SELECT * FROM marcas";
$resultado_marcas = mysqli_query($conexao, $sql);
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Veículo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../css/estilo.css">

</head>

<body class="bg-light">
    <?php include("../includes/menu.php"); ?>

    <div class="container mt-4">
        <div class="card shadow">
            <div class="card-header">
                <h3 class="mb-0">Editar Veículo</h3>
            </div>

            <div class="card-body">
                <form method="post">

                    <div class="mb-3">

                        <label class="form-label">Modelo</label>
                        <input
                            type="text"
                            name="modelo"
                            class="form-control"
                            value="<?php echo $veiculo["modelo"]; ?>"
                            required>

                    </div>

                    <div class="mb-3">

                        <label class="form-label">Marca</label>
                        <select name="id_marca" class="form-select" required>

                            <?php while ($marca = mysqli_fetch_array($resultado_marcas)) { ?>

                                <option
                                    value="<?php echo $marca["id"]; ?>"
                                    <?php if ($marca["id"] == $veiculo["id_marca"]) echo "selected"; ?>>
                                    <?php echo $marca["marca"]; ?>
                                </option>


                            <?php } ?>
                        </select>

                    </div>
                    <div class="mb-3">

                        <label class="form-label">Potência</label>
                        <input
                            type="text"
                            name="potencia"
                            class="form-control"
                            value="<?php echo $veiculo["potencia"]; ?>"
                            required>
                    </div>

                    <div class="mb-3">

                        <label class="form-label">Ano de Fabricação</label>
                        <input
                            type="number"
                            name="ano_fabricacao"
                            class="form-control"
                            value="<?php echo $veiculo["ano_fabricacao"]; ?>"
                            required>

                    </div>
                    <div class="mb-4">

                        <label class="form-label d-block">Tipo</label>

                        <div class="form-check form-check-inline">

                            <input
                                class="form-check-input"
                                type="radio"
                                name="tipo"
                                value="Carro"
                                <?php if ($veiculo["tipo"] == "Carro") echo "checked"; ?>>

                            <label class="form-check-label">
                                Carro
                            </label>
                        </div>


                        <div class="form-check form-check-inline">
                            <input
                                class="form-check-input"
                                type="radio"
                                name="tipo"
                                value="Moto"
                                <?php if ($veiculo["tipo"] == "Moto") echo "checked"; ?>>
                            <label class="form-check-label">
                                Moto
                            </label>

                        </div>
                        <div class="form-check form-check-inline">

                            <input
                                class="form-check-input"
                                type="radio"
                                name="tipo"
                                value="Caminhão"
                                <?php if ($veiculo["tipo"] == "Caminhão") echo "checked"; ?>>

                            <label class="form-check-label">
                                Caminhão
                            </label>
                        </div>
                    </div>

                    <button type="submit" class="btn btn-primary">
                        Salvar
                    </button>

                    <a href="listar.php" class="btn btn-secondary">
                        Voltar
                    </a>

                </form>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>