<?php

require_once("includes/verifica_login.php");

$caminho = "";
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema de Gerenciamento de Veículos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/estilo.css">
</head>

<body class="bg-light">

        <?php include("includes/menu.php"); ?>
        <div class="container mt-5">
            <div class="card shadow">
                <div class="card-header">
                    <h3 class="mb-0">Menu Principal</h3>
                </div>

                <div class="card-body">
                    <p class="lead">
                        Bem-vindo,
                        <strong><?php echo $_SESSION["usuario"]; ?></strong>!
                    </p>

                    <div class="d-grid gap-3">
                        <a href="marcas/listar.php" class="btn btn-primary btn-lg">
                            Gerenciar Marcas
                        </a>
                        <a href="veiculos/listar.php" class="btn btn-success btn-lg">
                            Gerenciar Veículos
                        </a>

                    </div>
                </div>
            </div>
        </div>
    </body>
</html>