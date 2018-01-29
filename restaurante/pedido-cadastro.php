<?php
include("cabecalho.php");
include("conexao.php");
include("cardapio-banco.php");

if(isset($_POST["id_conta"]) && !empty($_POST["id_conta"]) &&
	isset($_POST["cod_cardapio"]) && !empty($_POST["cod_cardapio"])){
	$id_conta = $_POST['id_conta'];
	$cod_cardapio = $_POST["cod_cardapio"];
	$resultInsercao = inserePedido($conexao, $id_conta, $cod_cardapio);
	if($resultInsercao){
		header("Location: conta-aberta-lista.php");
	}else{
		$msg = mysqli_close($conexao);
		header("Location: conta-aberta-lista.php");
	}
} else {
	header("Location: conta-aberta-lista.php");
}