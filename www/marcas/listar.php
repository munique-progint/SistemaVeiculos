<?php

require("../includes/verifica_login.php");
require("../includes/conexao.php");


$sql = "SELECT * FROM marcas";

$resultado = mysqli_query($conexao, $sql);
if (!$resultado) {
    die(mysqli_error($conexao));
}

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <title>Marcas</title>
</head>

<body>

    <h2>Marcas</h2>

    <p><a href="cadastrar.php">Nova Marca</a></p>

    <table border="1">

        <tr>
            <th>ID</th>
            <th>Marca</th>
            <th>Ações</th>
        </tr>

        <?php

        while ($linha = mysqli_fetch_assoc($resultado)) {

        ?>

            <tr>

                <td><?php echo $linha["id"]; ?></td>

                <td><?php echo $linha["marca"]; ?></td>

                <td>
                   <a href="editar.php?id=<?php echo $linha["id"]; ?>">Editar</a>
|
<a href="excluir.php?id=<?php echo $linha["id"]; ?>">Excluir</a>
                </td>

            </tr>

        <?php

        }

        ?>

    </table>

</body>

</html>