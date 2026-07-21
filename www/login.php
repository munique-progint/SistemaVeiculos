<?php

session_start();

include("includes/conexao.php");

if (isset($_POST["usuario"]) && isset($_POST["senha"])) {

    $usuario = $_POST["usuario"];
    $senha = $_POST["senha"];

    $sql = "SELECT * FROM usuarios
            WHERE usuario='$usuario'
            AND senha='$senha'";

    $resultado = mysqli_query($conexao, $sql);

    if (mysqli_num_rows($resultado) > 0) {

        $_SESSION["usuario"] = $usuario;

        header("Location: index.php");
        exit();

    } else {

        $erro = "Usuário ou senha inválidos.";

    }

}

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>

    <meta charset="UTF-8">
    <title>Login</title>

</head>

<body>

<h2>Login</h2>

<?php

if (isset($erro)) {
    echo "<p>$erro</p>";
}

?>

<form method="POST">

    <label>Usuário</label><br>
    <input type="text" name="usuario"><br><br>

    <label>Senha</label><br>
    <input type="password" name="senha"><br><br>

    <button type="submit">
        Entrar
    </button>

</form>

</body>
</html>