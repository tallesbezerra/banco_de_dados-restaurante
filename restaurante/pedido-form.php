<?php
include("cabecalho.php");
include("conexao.php");
include("cardapio-banco.php");
$id_conta = $_POST['id_conta'];
$cardapio = listaCardapio($conexao);
?>
<h1> Cardápio </h1>
<table class="table table-bordered table-hover">
	<tr class="active">
		<td>Produto</td>
		<td>Preço</td>
		<td>Pedir</td>
	</tr>
	<?php
	foreach($cardapio as $produto): ?>
	<tr>
		<td><?=$produto['nome_cardapio']?></td>
		<td>R$ <?=$produto['preco']?></td>
		<td>
			<form action="pedido-cadastro.php" method="post">
			<input type="hidden" name="id_conta" value="<?=$id_conta?>"/>
			<input type="hidden" name="cod_cardapio" value="<?=$produto['cod_cardapio']?>"/>
			<button class="btn btn-primary btn-sm btn-block">Pedir</button></form>
		</td>
	</tr>
	<?php
	endforeach ?>
</table>

<?php include("rodape.php") ?>