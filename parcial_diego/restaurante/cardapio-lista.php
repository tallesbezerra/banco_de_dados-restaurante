<?php
include("cabecalho.php");
include("conexao.php");
include("cliente-banco.php");
//busca os clientes e adiciona em $clientes 
$pratos = listaPrato($conexao);
?>
<h1>Cardápio</h1>

<?php
if(array_key_exists("cli_cad", $_GET) && $_GET['cli_cad']=='true') { ?>
	<p class="alert-success">Prato cadastrado com sucesso.</p>
<?php }

if(array_key_exists("cli_ncad", $_GET) && $_GET['cli_ncad']=='true') { ?>
	<p class="alert-danger">Prato NÃO FOI cadastrado.</p>
<?php } 
?>

<table class="table table-bordered table-hover">
	<tr class="active">
		<td>cod cardapio</td>
		<td>Preço</td>
		<td>Nome</td>
	</tr>
<?php
foreach($pratos as $prato):
?>
	<tr>
		<td><?=$prato['cod_cardapio']?></td>
		<td><?=$prato['preco']?></td>
		<td><?=$prato['nome_cardapio']?></td>
		<td>
			<form action="remove-prato.php" method="post">
			<input type="hidden" name="id" value="<?=$prato['cod_cardapio']?>"/>
			<button class="btn btn-primary btn-sm btn-block">remover prato</button></form>
		</td>
		<td>
			<form action="lista-ingredientes.php" method="post">
			<input type="hidden" name="id" value="<?=$prato['cod_cardapio']?>"/>
			<button class="btn btn-primary btn-sm btn-block">ingredientes do prato</button></form>
		</td>
	</tr>
<?php
endforeach ?>
</table>
<?php include("rodape.php"); ?>