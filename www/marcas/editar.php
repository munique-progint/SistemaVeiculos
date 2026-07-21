<?php

include("../includes/verifica_login.php");
include("../includes/conexao.php");

$id = $_GET["id"];

if (isset($_POST["marca"])) {

    $marca = $_POST["marca"];

    $sql = "UPDATE marcas
            SET marca='$marca'
            WHERE id='$id'";

    mysqli_query($conexao, $sql);

    header("Location: listar.php");
    exit();
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

<title>Editar Marca</title>

</head>

<body>

<h2>Editar Marca</h2>

<form method="post">

<label>Marca</label>

<br>

<input
type="text"
name="marca"
value="<?php echo $linha["marca"]; ?>"
required>

<br><br>

<button type="submit">

Salvar

</button>

</form>

<br>

<a href="listar.php">

Voltar

</a>

</body>

</html>