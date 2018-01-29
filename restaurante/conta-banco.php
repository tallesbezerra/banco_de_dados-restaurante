<?php
function abreConta($conexao, $id_cadastrado, $id_mesa, $data_conta){
	mysqli_query($conexao, "update mesa set disponivel = '0' where id_mesa = '$id_mesa'");
	$query = "insert into conta (id_cliente, id_mesa, data_conta, valor, aberta) values ('$id_cadastrado', '$id_mesa', $data_conta, '0', '1')";
	$resultadoDaInsercao = mysqli_query($conexao, $query);
	return $resultadoDaInsercao;
}

function buscaContas($conexao, $id_cadastrado){
	$contasCli = array();
	$resultado = mysqli_query($conexao, "select ct.*, ct.aberta as esta_aberta, m.tema as mesa_tema from conta as ct
		join mesa as m on m.id_mesa=ct.id_mesa
		where ct.id_cliente = '$id_cadastrado' order by data_conta");
	while ($conta = mysqli_fetch_assoc($resultado)) {
		array_push($contasCli, $conta);
	}
	return $contasCli;
}

function contasAbertas($conexao){
	$contasAbertas = array();
	$resultado = mysqli_query($conexao, "select ct.*, m.tema as mesa_tema, cli.tipo_cliente as tipo_cliente from conta as ct
		join mesa as m on m.id_mesa=ct.id_mesa
		join cliente as cli on ct.id_cliente=cli.id_cliente
		where ct.aberta='1' order by data_conta");
	while ($conta = mysqli_fetch_assoc($resultado)) {
		array_push($contasAbertas, $conta);
	}
	return $contasAbertas;
}



function fechaConta($conexao, $id_conta, $id_mesa){
	$resultado = mysqli_query($conexao, "update conta set aberta = '0' where id_conta = '$id_conta'");
	if($resultado)
		$resultado2 = mysqli_query($conexao, "update mesa set disponivel = '1' where id_mesa = '$id_mesa'");
	return $resultado2;
}

///Funções com tabela mesa
function statusMesas($conexao){
	$mesas = array();
	$resultado = mysqli_query($conexao, "select *, disponivel as status from mesa order by id_mesa");
	while ($mesa = mysqli_fetch_assoc($resultado)) {
		array_push($mesas, $mesa);
	}
	return $mesas;
}

function listaMesas($conexao){
	return mysqli_query($conexao, "select * from mesa where disponivel='1'");
}