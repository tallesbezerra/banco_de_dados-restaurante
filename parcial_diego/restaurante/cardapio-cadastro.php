<?php
include("cabecalho.php");
include("conexao.php");
include("cliente-banco.php");

$preco = $_POST['preco'];
$nome = $_POST['nome'];
$n_ing = $_POST['n_ing'];
$qtd = $_POST['qtd'];
$tempo = $_POST['tempo'];
//sava o prato
inserePrato($conexao,$preco,$nome);

header("Location: ingredientes.php?n_ing=$n_ing&tempo=$tempo");
include("rodape.php");