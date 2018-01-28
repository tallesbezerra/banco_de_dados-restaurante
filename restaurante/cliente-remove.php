<?php
include("conexao.php");
include("cliente-banco.php");

$id = $_POST['id'];
removeCliente($conexao, $id);

header("Location: cliente-lista.php?removido=true");
die();