<?php

include("../includes/verifica_login.php");
include("../includes/conexao.php");

if (isset($_POST["marca"])) {

    $marca = $_POST["marca"];

    $sql = "INSERT INTO marcas (marca)
            VALUES ('$marca')";

    mysqli_query($conexao, $sql);

    header("Location: listar.php");
    exit();
}

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <title>Cadastrar Marca</title>
</head>

<body>

    <h2>Cadastrar Marca</h2>

    <form method="post">

        <label>Marca</label><br>

        <input type="text" name="marca" required>

        <br><br>

        <button type="submit">
            Cadastrar
        </button>

    </form>

    <br>

    <a href="listar.php">Voltar</a>

</body>

</html>