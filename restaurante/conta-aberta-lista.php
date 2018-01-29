<?php
include("cabecalho.php");
include("conexao.php");
include("conta-banco.php");
$contas = contasAbertas($conexao);
?>
<h1> Contas Abertas </h1>
<?php

if(array_key_exists("fechado", $_GET) && $_GET['fechado']=='true') { ?>
	<p class="alert-success">Conta fechada com sucesso.</p>
<?php } 
if(array_key_exists("nfechado", $_GET) && $_GET['nfechado']=='true') { ?>
	<p class="alert-danger">A conta NÃO foi fechada.</p>
<?php } 
?>
<table class="table table-bordered table-hover">
	<tr class="active">
		<td>Mesa</td>
		<td>Cliente</td>
		<td>Valor</td>
		<td>Ver pedidos</td>
		<td>Fazer pedido</td>
		<td>Fechar conta</td>
	</tr>
<?php
foreach($contas as $conta):
	if($conta['tipo_cliente'] == 'generico')
		$conta['nome_cliente'] = 'Cliente Genérico';
	else
		$conta['nome_cliente'] = 'Cliente Cadastrado';
?>
	<tr>
		<td><?=$conta['mesa_tema']?></td>
		<td><?=$conta['nome_cliente']?></td>
		<td><?=$conta['valor']?></td>
		<td>
			<form action="pedido-lista.php" method="post">
			<input type="hidden" name="id_conta" value="<?=$conta['id_conta']?>"/>
			<button class="btn btn-primary btn-sm btn-block">Ver pedidos</button></form>
		</td>
		<td>
			<form action="pedido-form.php" method="post">
			<input type="hidden" name="id_conta" value="<?=$conta['id_conta']?>"/>
			<button class="btn btn-warning btn-sm btn-block">Fazer pedido</button></form>
		</td>
		<td>
			<form action="conta-fecha.php" method="post">
			<input type="hidden" name="id_conta" value="<?=$conta['id_conta']?>"/>
			<input type="hidden" name="id_mesa" value="<?=$conta['id_mesa']?>"/>
			<button class="btn btn-danger btn-sm btn-block">Fechar conta</button></form>
		</td>
	</tr>
<?php
endforeach ?>
</table>

<?php
include("rodape.php");
?>