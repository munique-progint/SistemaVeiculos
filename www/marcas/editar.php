<?php

include("../includes/verifica_login.php");
include("../includes/conexao.php");

$caminho = "../";

$id = $_GET["id"];

if (isset($_POST["marca"])) {

    $marca = $_POST["marca"];
    $erros = [];

if (empty($marca))
    $erros[] = "Preencha a marca";

    $sql = "UPDATE marcas
            SET marca='$marca'
            WHERE id='$id'";

    if (mysqli_query($conexao, $sql)) {

    header("Location: listar.php");
    exit();

} else {

    echo "Houve um erro ao editar a marca.";

}
}

$sql = "SELECT * FROM marcas
        WHERE id='$id'";

$resultado = mysqli_query($conexao, $sql);

$linha = mysqli_fetch_assoc($resultado);

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Editar Marca</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">

    <link rel="stylesheet" href="../css/estilo.css">

</head>

<body class="bg-light">

    <?php include("../includes/menu.php"); ?>

    <div class="container mt-4">

        <div class="card shadow">

            <div class="card-header">

                <h3 class="mb-0">Editar Marca</h3>

            </div>

            <div class="card-body">

                <form method="post">

                    <div class="mb-3">

                        <label class="form-label">Marca</label>

                        <input
                            type="text"
                            name="marca"
                            class="form-control"
                            value="<?php echo $linha["marca"]; ?>"
                            required
                            autofocus>

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