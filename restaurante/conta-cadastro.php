<?php
include("cabecalho.php");
include("conexao.php");
include("conta-banco.php");

if(isset($_POST["id_cadastrado"]) && !empty($_POST["id_cadastrado"]) &&
	isset($_POST["id_mesa"]) && !empty($_POST["id_mesa"]) &&
	isset($_POST["data_conta"]) && !empty($_POST["data_conta"])){
	$id_cadastrado = $_POST["id_cadastrado"];
	$id_mesa = $_POST["id_mesa"];
	$data_conta = $_POST["data_conta"];
	$resultInsercao = abreConta($conexao, $id_cadastrado, $id_mesa, $data_conta);
	if($resultInsercao){
		header("Location: conta-aberta-lista.php?cad_aberta=true");
	}else{
		$msg = mysqli_close($conexao);
		header("Location: conta-aberta-lista.php?cad_naberta=true");
	}
} else {
	header("Location: conta-aberta-lista.php?cad_naberta=true");
}