<?php
include("cabecalho.php");
include("conexao.php");
include("cliente-banco.php");

$data_ent=$_POST["data_ent"];
$local_armaz=$_POST["local_armaz"];
$preco_lote=$_POST["preco_lote"];
$validade=$_POST["validade"];
$fornecedor=$_POST["fornecedor"];
$nome_prod=$_POST["nome_prod"];
$qtd_prod=$_POST["qtd_prod"];
$tipo_prod=$_POST["tipo_prod"];
$cod_lote=$_POST["cod_lote"];
$espc=$_POST["espc"];  //esse atributo pode ser medida de materia prima ou temperatura de armazenamento de bebida
$tipo_beb=$_POST['tipo_beb'];
$temp_consumo=$_POST['temp_consumo'];

//sava o lote
novoLote($conexao,$data_ent,$local_armaz,$preco_lote,$validade,$fornecedor);

//salva os produtos
novoProdutos($conexao,$nome_prod,$qtd_prod,$tipo_prod);

//faz a disjunção de produtos
if($tipo_prod === "materia-prima"){
		novaMateriaPrima($conexao,$espc);
} else {
		novoProdIndrust($conexao,$tipo_beb,$espc,$temp_consumo);
}
header("Location: produto-lista.php?cli_cad=true");
include("rodape.php");