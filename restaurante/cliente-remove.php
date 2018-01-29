<?php
include("conexao.php");
include("cliente-banco.php");

$id = $_POST['id_cadastrado'];
removeCliente($conexao, $id);

header("Location: cliente-lista.php?removido=true");
die();