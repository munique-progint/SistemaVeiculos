<?php

$conexao = mysqli_connect(
    "mysql",
    "root",
    "1234",
    "sistema_veiculos"
);

if (!$conexao) {
    die("Erro ao conectar com o banco de dados.");
}

?>