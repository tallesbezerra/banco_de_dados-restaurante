<?php
function listaCardapio($conexao){
	$cardapio = array();
	$resultado = mysqli_query($conexao, "select * from cardapio");
	while($produto = mysqli_fetch_assoc($resultado)) {
		array_push($cardapio, $produto);
	}
	return $cardapio;
}

function inserePedido($conexao, $id_conta, $cod_cardapio){
	$query = "insert into pedido (id_conta, cod_cardapio) values ('$id_conta', '$cod_cardapio')";
	$resultadoDaInsercao = mysqli_query($conexao, $query);
	return $resultadoDaInsercao;
}

function buscaPedidos($conexao, $id_conta){
	$pedidos = array();
	$resultado = mysqli_query($conexao, "select p.* , car.nome_cardapio as pedido_nome, car.preco as pedido_preco from pedido as p join cardapio as car on car.cod_cardapio=p.cod_cardapio where p.id_conta = '$id_conta'");

	while($pedido = mysqli_fetch_assoc($resultado)) {
		array_push($pedidos, $pedido);
	}
	return $pedidos;
}

function listaPedidos($busca){
	$pedidos = array();

}