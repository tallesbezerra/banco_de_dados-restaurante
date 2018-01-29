<?php
function insereCliente($conexao, $tipo, $nome, $telefone) {
	//Insere um id na tabela cliente e com last_insert_id() retorna o id de cliente e utiliza na cliente cadastrado
	$query1 = "insert into cliente (id_cliente, tipo_cliente) values ('NULL', '$tipo')";
	mysqli_query($conexao, $query1);
	$query2 = "insert into cliente_cadastrado (id_cadastrado, nome, telefone) values (last_insert_id(), '{$nome}', '{$telefone}')";
	$resultadoDaInsercao = mysqli_query($conexao, $query2);
	return $resultadoDaInsercao;
}

function insereGenerico($conexao, $tipo, $descricao, $id_mesa, $data_conta) {
	//mesma coisa com o genérico
	mysqli_query($conexao, "insert into cliente (id_cliente, tipo_cliente) values ('NULL', '$tipo')");
	mysqli_query($conexao, "insert into cliente_generico (id_generico, descricao) values (last_insert_id(), '{$descricao}')");
	$query = "insert into conta (id_cliente, id_mesa, data_conta, valor, aberta) values (last_insert_id(), '$id_mesa', $data_conta, '0', '1')";
	$resultadoDaInsercao = mysqli_query($conexao, $query);
	return $resultadoDaInsercao;
}

function listaClientes($conexao) {
	//retorna os nomes na tabela cliente_cadastrado
	$clientes = array();
	$resultado = mysqli_query($conexao, "select * from cliente_cadastrado");
	while($cliente = mysqli_fetch_assoc($resultado)) {
		array_push($clientes, $cliente);
	}
	return $clientes;
}

function buscaCliente($conexao, $id){
	//busca o cliente pelo id na tabela cliente_cadastrado
	$query = "select * from cliente_cadastrado where id_cadastrado = '{$id}'";
	$resultado = mysqli_query($conexao, $query);
	return mysqli_fetch_assoc($resultado);
}

function alteraCliente($conexao, $id, $nome, $telefone) {
	//altera o cliente pelo id na tabela cliente_cadastrado
	$query = "update cliente_cadastrado set nome = '{$nome}', telefone = '{$telefone}' where id_cadastrado = '{$id}'";
	return mysqli_query($conexao, $query);
}

function removeCliente($conexao, $id){
	//deleta o cliente pelo id na tabela cliente_cadastrado e cliente
	mysqli_query($conexao, "delete from cliente_cadastrado where id_cadastrado = '{$id}'");
	$query = "delete from cliente where id_cliente = '{$id}'";
	return mysqli_query($conexao, $query);
}