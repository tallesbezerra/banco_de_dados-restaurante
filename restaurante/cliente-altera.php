<?php
include("cabecalho.php");
include("conexao.php");
include("cliente-banco.php");


///Ve se nao ta vazio
if(isset($_POST["id"]) && isset($_POST["nome"]) && isset($_POST["telefone"]) &&
	!empty($_POST["id"]) && !empty($_POST["nome"]) && !empty($_POST["telefone"])) {
	$id = $_POST['id'];
	$nome = $_POST['nome'];
	$telefone = $_POST['telefone'];
	$resultAlteracao = alteraCliente($conexao, $id, $nome, $telefone);
	if($resultAlteracao){
		header("Location: cliente-lista.php?cli-alt=true");
	} else {
		$msg = mysqli_close($conexao);
		header("Location: cliente-lista.php?cli-nalt=true");
	}
} else {
	header("Location: cliente-lista.php?cli-nalt=true");
}

include("rodape.php");