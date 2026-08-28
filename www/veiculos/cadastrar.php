<?php

include("../includes/verifica_login.php");
include("../includes/conexao.php");

$caminho = "../";

$sql = "SELECT * FROM marcas";

$resultado = mysqli_query($conexao, $sql);

if (isset($_POST["modelo"])) {

    $modelo = $_POST["modelo"];
    $id_marca = $_POST["id_marca"];
    $potencia = $_POST["potencia"];
    $ano_fabricacao = $_POST["ano_fabricacao"];
    $tipo = $_POST["tipo"];

    $sql = "INSERT INTO veiculos
            (modelo, id_marca, potencia, ano_fabricacao, tipo)
            VALUES
            ('$modelo', '$id_marca', '$potencia', '$ano_fabricacao', '$tipo')";


    if (mysqli_query($conexao, $sql)) {

        header("Location: listar.php");
        exit();

    } else {
        echo "Houve um erro ao cadastrar o veículo.";
    }

}

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastrar Veículo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../css/estilo.css">

</head>

<body class="bg-light">

    <?php include("../includes/menu.php"); ?>
    <div class="container mt-4">
        <div class="card shadow">
            <div class="card-header">

                <h3 class="mb-0">Cadastrar Veículo</h3>

            </div>

            <div class="card-body">
                <form method="post">
                    <div class="mb-3">

                        <label class="form-label">Modelo</label>

                        <input
                            type="text"
                            name="modelo"
                            class="form-control"
                            required
                            autofocus>

                    </div>
                    <div class="mb-3">

                        <label class="form-label">Marca</label>
                        <select name="id_marca" class="form-select" required>

                            <?php while ($linha = mysqli_fetch_array($resultado)) { ?>
                                <option value="<?php echo $linha["id"]; ?>">
                                    <?php echo $linha["marca"]; ?>
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
                            required>

                    </div>

                    <div class="mb-3">

                        <label class="form-label">Ano de Fabricação</label>
                        <input
                            type="number"
                            name="ano_fabricacao"
                            class="form-control"
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
                                required>

                            <label class="form-check-label">
                                Carro
                            </label>
                        </div>


                        <div class="form-check form-check-inline">

                            <input
                                class="form-check-input"
                                type="radio"
                                name="tipo"
                                value="Moto">

                            <label class="form-check-label">
                                Moto
                            </label>
                        </div>
                        <div class="form-check form-check-inline">

                            <input
                                class="form-check-input"
                                type="radio"
                                name="tipo"
                                value="Caminhão">

                            <label class="form-check-label">
                                Caminhão
                            </label>
                        </div>
                    </div>

                    <button type="submit" class="btn btn-primary">
                        Cadastrar
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