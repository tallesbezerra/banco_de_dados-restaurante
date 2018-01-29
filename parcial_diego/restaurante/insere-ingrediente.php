<?php
include("cabecalho.php");
include("conexao.php");
include("cliente-banco.php");

$nome = $_POST['nome'];
$qtd = $_POST['qtd'];
$tempo = $_POST['tempo'];
$n_ing = $_POST['n_ing'];
echo $nome;
insereIngrediente($conexao,$nome,$qtd,$tempo);

header("Location: ingredientes.php?n_ing=$n_ing&tempo=$tempo");
include("rodape.php");