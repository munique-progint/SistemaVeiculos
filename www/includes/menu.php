<nav class="navbar navbar-expand-lg navbar-dark bg-primary">

    <div class="container">

        <a class="navbar-brand" href="<?= $caminho ?>index.php">
            Gerenciamento de Veículos
        </a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#menu">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="menu">

            <ul class="navbar-nav ms-auto">

                <li class="nav-item">
                    <a class="nav-link" href="<?= $caminho ?>index.php">
                        Início
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="<?= $caminho ?>marcas/listar.php">
                        Marcas
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="<?= $caminho ?>veiculos/listar.php">
                        Veículos
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="<?= $caminho ?>logout.php">
                        Sair
                    </a>
                </li>

            </ul>

        </div>

    </div>

</nav>