<?php
include("cabecalho.php");
include("conexao.php");
include("cliente-banco.php");

$tipo = $_POST["tipo_cliente"];
//verifica se é genérico ou nao e
//vê se não está vazio e manda pra função no cliente-banco.php
if($tipo == "generico"){
	if(isset($_POST["descricao"]) && !empty($_POST["descricao"]) &&
		isset($_POST["id_mesa"]) && !empty($_POST["id_mesa"]) &&
		isset($_POST["data_conta"]) && !empty($_POST["data_conta"])){
		$descricao = $_POST["descricao"];
		$id_mesa = $_POST["id_mesa"];
		$data_conta = $_POST["data_conta"];
		$resultInsercao = insereGenerico($conexao, $tipo, $descricao, $id_mesa, $data_conta);
		if($resultInsercao){
			header("Location: index.php");
		}else{
			$msg = mysqli_close($conexao);
			header("Location: conta-escolhe-tipo.php");
		}
	} else {
		header("Location: cliente-gen-form.php");
	}
} else {
	if(isset($_POST["nome"]) && isset($_POST["telefone"]) &&
		!empty($_POST["nome"]) && !empty($_POST["telefone"])) {
		$nome = $_POST["nome"];
		$telefone = $_POST["telefone"];
		$resultInsercao = insereCliente($conexao, $tipo, $nome, $telefone);
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