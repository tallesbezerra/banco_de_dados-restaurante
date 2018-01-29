<?php
include("cabecalho.php");
include("conexao.php");
include("cardapio-banco.php");
$id_conta = $_POST['id_conta'];
$pedidos = buscaPedidos($conexao, $id_conta);
?>
<h1> Pedidos </h1>
<table class="table table-bordered table-hover">
	<tr class="active">
		<td>Pedido</td>
		<td>Preço</td>
		<td>Quantidade</td>
		<td>Valor Total</td>
	</tr>
<?php
foreach($pedidos as $pedido):
?>
	<tr>
		<td><?=$pedido['pedido_nome']?></td>
		<td>R$ <?=$pedido['pedido_preco']?></td>
		<td><?=$pedido['pedido_qtd']?></td>
		<td><?=$pedido['pedido_total']?></td>
	</tr>
<?php
endforeach ?>
</table>
<?php include("rodape.php"); ?>