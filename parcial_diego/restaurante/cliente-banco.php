<?php
function insereCliente($conexao, $nome, $telefone) {
	//Insere um id na tabela cliente e com last_insert_id() retorna o id de cliente e utiliza na cliente cadastrado
	$query1 = "insert into cliente (id_cliente) values (0)";
	mysqli_query($conexao, $query1);
	$query2 = "insert into cliente_cadastrado (id_cadastrado, nome, telefone) values (last_insert_id(), '{$nome}', '{$telefone}')";
	$resultadoDaInsercao = mysqli_query($conexao, $query2);
	return $resultadoDaInsercao;
}

function insereGenerico($conexao, $descricao) {
	//mesma coisa com o genérico
	$query1 = "insert into cliente (id_cliente) values (0)";
	mysqli_query($conexao, $query1);
	$query2 = "insert into cliente_generico (id_generico, descricao) values (last_insert_id(), '{$descricao}')";
	$resultadoDaInsercao = mysqli_query($conexao, $query2);
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

function novoLote($conexao,$data_ent,$local_armaz,$preco_lote,$validade,$fornecedor) {
	//insere novo lote de produtos
	//$espc é o atributo específico de natural ou industrializado, ele pode ser medida ou forma de armazenamento
	$query = "insert into lote(data_entrada,local_armazenado,preco_lote,validade_prod,fornecedor)
				values('{$data_ent}','{$local_armaz}','{$preco_lote}','{$validade}','{$fornecedor}')";
	return mysqli_query($conexao,$query);
}

function novoProdutos($conexao,$nome_prod,$qtd_prod,$tipo_prod) {
	//insere novo produto
	$query = "insert into produto(nome_prod,qtd_prod,tipo_prod,cod_lote) values('{$nome_prod}',$qtd_prod,'{$tipo_prod}',last_insert_id())";
	
	return mysqli_query($conexao,$query);
}

function novaMateriaPrima($conexao,$medida) {
	//insere nova materia-prima
	$query = "insert into materia_prima(cod_matprim,medida) values(last_insert_id(),'{$medida}')";
	return mysqli_query($conexao,$query);
}

function novoProdIndrust($conexao,$tipo_beb,$armazenamento,$temp_consumo) {
	//insere novo produto industrializado
	$query = "insert into industrializado(cod_indus,tipo_beb,temp_armaz,temp_consumo) values(last_insert_id(),'{$tipo_beb}',$armazenamento,$temp_consumo)";
	return mysqli_query($conexao,$query);
}

function listaProdutos($conexao) {
	$produtos = array();
	$query = "select * from produto";
	$resultado = mysqli_query($conexao,$query);
	while($produto = mysqli_fetch_assoc($resultado)) {
		array_push($produtos, $produto);
	}
	return $produtos;
}

function buscaLote($conexao, $id){
	//busca o lote pelo cod_lote na tabela lote
	$query = "select * from lote where cod_lote = '{$id}'";
	$resultado = mysqli_query($conexao, $query);
	return mysqli_fetch_assoc($resultado);
}

function detalhaProduto($conexao, $id){
	//busca o produto pelo id na tabela de seu tipo
	$query = "select * from industrializado where cod_indus = '{$id}'";
	$resultado = mysqli_query($conexao, $query);
	if($resultado->num_rows == 0 ) {
		$query = "select * from materia_prima where cod_matprim = '{$id}'";
		$resultado = mysqli_query($conexao, $query);
	}
	return mysqli_fetch_assoc($resultado);
}

function inserePrato($conexao, $preco, $nome) {
	//Insere um novo prato na tabela cardapio
	$query1 = "insert into cardapio (preco,nome_cardapio) values ($preco,'{$nome}')";
	return mysqli_query($conexao, $query1);
}

function listaPrato($conexao) {
	//consulta todos os pratos na tabela cardapio
	$pratos = array();
	$query = "select * from cardapio";
	$resultado = mysqli_query($conexao,$query);
	while($prato = mysqli_fetch_assoc($resultado)) {
		array_push($pratos, $prato);
	}
	return $pratos;
}

function removePrato($conexao, $id){
	//deleta o prato da tabela cardapio e deleta seus ingredientes da tabela ingredientes
	$query1 = "delete from cardapio where cod_cardapio = $id";
	mysqli_query($conexao, $query1);
	$query2 = "delete from ingredientes where cod_cardapio = $id";
	return mysqli_query($conexao, $query2);
}

function insereIngrediente($conexao,$nome,$qtd,$tempo) {
	$query1 = "select cod_produto from produto where nome_prod = '{$nome}'";
	$resultado = mysqli_query($conexao,$query1);
	$produto = mysqli_fetch_assoc($resultado);
	$cod_produto = $produto['cod_produto'];
	//seleciona o ultimo prato cadastrado
	$query2 = "select MAX(cod_cardapio) as cod_cardapio from cardapio";
	$result = mysqli_query($conexao,$query2);
	$cardapio = mysqli_fetch_assoc($result);
	$cod_cardapio = $cardapio['cod_cardapio'];
	//insere igrediente
	$query3 = "insert into ingrediente(cod_cardapio,nome_ing,qtd_ing,tempo_preparo,cod_produto) values($cod_cardapio,'{$nome}',$qtd, '{$tempo}', $cod_produto)";
	return mysqli_query($conexao,$query3);
}

function listaIngredientes($conexao,$id) {
	//consulta todos os ingredientes do prato
	$ingredientes = array();
	$query = "select * from ingrediente where cod_cardapio = $id";
	$resultado = mysqli_query($conexao,$query);
	while($ingrediente = mysqli_fetch_assoc($resultado)) {
		array_push($ingredientes, $ingrediente);
	}
	return $ingredientes;
}