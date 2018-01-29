<?php
include("cabecalho.php");
include("conexao.php");
include("cliente-banco.php");

$id = $_POST['id'];
$result = buscaLote($conexao, $id);
?>

<table class="table table-bordered table-hover">
	<tr class="active">
		<td>Codigo do lote</td>
		<td>Data da entrada</td>
		<td>Preço do lote</td>
		<td>Local armazenado</td>
		<td>Validade</td>
		<td>Fornecedor</td>
	</tr>
	<tr>
		<td><?=$result['cod_lote']?></td>
		<td><?=$result['data_entrada']?></td>
		<td><?=$result['preco_lote']?></td>
		<td><?=$result['local_armazenado']?></td>
		<td><?=$result['validade_prod']?></td>
		<td><?=$result['fornecedor']?></td>
	</tr>
</table>
<?php include("rodape.php"); ?>