<?php
include("cabecalho.php");
include("conexao.php");
include("cliente-banco.php");
//busca os clientes e adiciona em $clientes 
$clientes = listaClientes($conexao);
?>
<h1>Lista de Clientes</h1>

<?php //Funções para alertar alterações na tabela cliente_cadastrado
if(array_key_exists("cli_cad", $_GET) && $_GET['cli_cad']=='true') { ?>
	<p class="alert-success">Cliente cadastrado com sucesso.</p>
<?php }

if(array_key_exists("cli_ncad", $_GET) && $_GET['cli_ncad']=='true') { ?>
	<p class="alert-danger">Cliente NÃO FOI cadastrado.</p>
<?php }

if(array_key_exists("cli_alt", $_GET) && $_GET['cli_alt']=='true') { ?>
	<p class="alert-success">Cliente alterado com sucesso.</p>
<?php }

if(array_key_exists("cli_nalt", $_GET) && $_GET['cli_nalt']=='true') { ?>
	<p class="alert-danger">Cliente NÃO FOI alterado.</p>
<?php }

if(array_key_exists("removido", $_GET) && $_GET['removido']=='true') { ?>
	<p class="alert-success">Cliente removido com sucesso.</p>
<?php }

if(array_key_exists("marcado", $_GET) && $_GET['marcado']=='true') { ?>
	<p class="alert-success">Horário marcado com sucesso.</p>
<?php } 
//////?>

<table class="table table-bordered table-hover">
	<tr class="active">
		<td>Nome</td>
		<td>Telefone</td>
		<td>Contas</td>
		<td>Alterar</td>
		<td>Remover</td>
	</tr>
<?php
foreach($clientes as $cliente):
?>
	<tr>
		<td><?=$cliente['nome']?></td>
		<td><?=$cliente['telefone']?></td>
		<td>
			<form action="cliente-conta.php" method="post">
			<input type="hidden" name="id" value="<?=$cliente['id_cadastrado']?>"/>
			<button class="btn btn-primary btn-sm btn-block">Ver contas</button></form>
		</td>
		<td>
			<form action="cliente-altera-form.php" method="post">
			<input type="hidden" name="id" value="<?=$cliente['id_cadastrado']?>"/>
			<button class="btn btn-warning btn-sm btn-block">Alterar</button></form>
		</td>
		<td>
			<form action="cliente-remove.php" method="post">
			<input type="hidden" name="id" value="<?=$cliente['id_cadastrado']?>"/>
			<button class="btn btn-danger btn-sm btn-block">Remover</button></form>
		</td>
	</tr>
<?php
endforeach ?>
</table>
<?php include("rodape.php"); ?>