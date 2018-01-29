<?php
include("conexao.php");
include("cliente-banco.php");

$id = $_POST['id'];
removePrato($conexao, $id);

header("Location: cardapio-lista.php?removido=true");
die();