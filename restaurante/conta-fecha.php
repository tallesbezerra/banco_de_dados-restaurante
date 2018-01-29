<?php
include("cabecalho.php");
include("conexao.php");
include("conta-banco.php");

if(isset($_POST["id_conta"]) && !empty($_POST["id_conta"]) &&
	isset($_POST["id_mesa"]) && !empty($_POST["id_mesa"])){
	$id_conta = $_POST["id_conta"];
	$id_mesa = $_POST["id_mesa"];
	$resultInsercao = fechaConta($conexao, $id_conta, $id_mesa);
	if($resultInsercao){
		header("Location: conta-aberta-lista.php?fechado=true");
	}else{
		$msg = mysqli_close($conexao);
		header("Location: conta-aberta-lista.php?nfechado=true");
	}
} else {
	header("Location: conta-aberta-lista.php?nfechado=true");
}