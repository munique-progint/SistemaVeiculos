<?php

include("../includes/verifica_login.php");
include("../includes/conexao.php");

$id = $_GET["id"];
$sql = "DELETE FROM marcas
        WHERE id='$id'";

if (mysqli_query($conexao, $sql)) {

    if (mysqli_affected_rows($conexao) == 1) {
        $_SESSION["msg"] = "Marca excluída com sucesso.";
        $_SESSION["class"] = "alert-success";

    } else {
        $_SESSION["msg"] = "Houve um erro ao excluir a marca.";
        $_SESSION["class"] = "alert-danger";
    }

} else {
    $_SESSION["msg"] = "Houve um erro ao excluir a marca.";
    $_SESSION["class"] = "alert-danger";
}

header("Location: listar.php");
exit();
?>