<?php
include("cabecalho.php");
include("conexao.php");
include("cliente-banco.php");


//verifica se é genérico ou nao e
//vê se não está vazio e manda pra função no cliente-banco.php
if($_POST["generico"]){
	if(isset($_POST["descricao"]) && !empty($_POST["descricao"])){
		$descricao = $_POST["descricao"];
		$resultInsercao = insereGenerico($conexao, $descricao);
		if($resultInsercao){
			header("Location: cliente-lista.php?cli_cad=true");
		}else{
			$msg = mysqli_close($conexao);
			header("Location: cliente-lista.php?cli_ncad=true");
		}
	} else {
		header("Location: cliente-lista.php?cli_ncad=true");
	}
} else {
	if(isset($_POST["nome"]) && isset($_POST["telefone"]) &&
		!empty($_POST["nome"]) && !empty($_POST["telefone"])) {
		$nome = $_POST["nome"];
		$telefone = $_POST["telefone"];
		$resultInsercao = insereCliente($conexao, $nome, $telefone);
			if($resultInsercao){
				header("Location: cliente-lista.php?cli_cad=true");
			}else{
				$msg = mysqli_close($conexao);
				header("Location: cliente-lista.php?cli_ncad=true");
			}
	} else {
		header("Location: cliente-lista.php?cli_ncad=true");
	}
}

include("rodape.php");