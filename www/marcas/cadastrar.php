<?php

include("../includes/verifica_login.php");
include("../includes/conexao.php");

$caminho = "../";

  if (isset($_POST["marca"])) {

    $marca = $_POST["marca"];

    $erros = [];

    if (empty($marca))
        $erros[] = "Preencha a marca";

    if (count($erros) == 0) {

        $sql = "INSERT INTO marcas (marca)
                VALUES ('$marca')";

        if (mysqli_query($conexao, $sql)) {

            header("Location: listar.php");
            exit();

        } else {

            echo "Houve um erro ao cadastrar a marca.";

        }

    } else {

        foreach ($erros as $erro) {

            echo "$erro<br>";

        }

    }

}
    ?>

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Cadastrar Marca</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">

    <link rel="stylesheet" href="../css/estilo.css">

</head>

<body class="bg-light">

    <?php include("../includes/menu.php"); ?>

    <div class="container mt-4">

        <div class="card shadow">

            <div class="card-header">

                <h3 class="mb-0">Cadastrar Marca</h3>

            </div>

            <div class="card-body">

                <form method="post">

                    <div class="mb-3">

                        <label class="form-label">Marca</label>

                        <input
                            type="text"
                            name="marca"
                            class="form-control"
                            required
                            autofocus>

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