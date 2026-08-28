<?php

session_start();

require_once("includes/conexao.php");

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
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/estilo.css">

</head>

<body class="bg-light">
    <div class="container">
        <div class="row justify-content-center align-items-center vh-100">
            <div class="col-md-6 col-lg-5">
                <div class="card shadow">
                    <div class="card-header bg-primary text-white text-center">
                        <h3 class="mb-1">Gerenciamento de Veículos</h3>
                        <small class="text-white">
                            Faça login para acessar o sistema
                        </small>

                    </div>

                    <div class="card-body">
                        <?php

                        if (isset($erro)) {

                        ?>
                            <div class="alert alert-danger">
                                <?php echo $erro; ?>
                            </div>
                        <?php
                        }

                        ?>

                        <form method="POST">
                            <div class="mb-3">

                                <label class="form-label">
                                    Usuário
                                </label>

                                <input
                                    type="text"
                                    name="usuario"
                                    class="form-control"
                                    required>

                            </div>
                            <div class="mb-4">

                                <label class="form-label">
                                    Senha
                                </label>

                                <input
                                    type="password"
                                    name="senha"
                                    class="form-control"
                                    required>

                            </div>
                            <div class="d-grid">

                                <button
                                    type="submit"
                                    class="btn btn-primary">
                                    Entrar

                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>