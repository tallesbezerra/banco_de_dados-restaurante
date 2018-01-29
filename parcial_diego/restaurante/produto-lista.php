<?php
include("cabecalho.php");
include("conexao.php");
include("cliente-banco.php");
//busca os produtos e adiciona em $produtos 
$produtos = listaProdutos($conexao);
?>
<h1>Lista de Produtos</h1>

<?php //Funções para alertar alterações na tabela produtos
if(array_key_exists("cli_cad", $_GET) && $_GET['cli_cad']=='true') { ?>
	<p class="alert-success">Produto cadastrado com sucesso.</p>
<?php }

if(array_key_exists("cli_ncad", $_GET) && $_GET['cli_ncad']=='true') { ?>
	<p class="alert-danger">Produto NÃO FOI cadastrado.</p>
<?php } 
?>

<table class="table table-bordered table-hover">
	<tr class="active">
		<td>id</td>
		<td>Nome</td>
		<td>Quantidade</td>
		<td>Tipo de produto</td>
		<td>Código do lote</td>
	</tr>
<?php
foreach($produtos as $produto):
?>
	<tr>
		<td><?=$produto['cod_produto']?></td>
		<td><?=$produto['nome_prod']?></td>
		<td><?=$produto['qtd_prod']?></td>
		<td><?=$produto['tipo_prod']?></td>
		<td><?=$produto['cod_lote']?></td>
		<td>
			<form action="lote.php" method="post">
			<input type="hidden" name="id" value="<?=$produto['cod_lote']?>"/>
			<button class="btn btn-primary btn-sm btn-block">Detalhes do lote</button></form>
		</td>
		<td>
			<form action="detalhe_produto.php" method="post">
			<input type="hidden" name="id" value="<?=$produto['cod_produto']?>"/>
			<button class="btn btn-primary btn-sm btn-block">Detalhes do produto</button></form>
		</td>
	</tr>
<?php
endforeach ?>
</table>
<?php include("rodape.php"); ?>