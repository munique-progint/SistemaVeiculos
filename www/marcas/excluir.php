<?php

include("../includes/verifica_login.php");
include("../includes/conexao.php");

$id = $_GET["id"];

$sql = "DELETE FROM marcas
        WHERE id='$id'";

mysqli_query($conexao, $sql);

header("Location: listar.php");
exit();

?>