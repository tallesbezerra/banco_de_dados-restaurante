<?php
include("cabecalho.php");
include("conexao.php");
include("conta-banco.php");
$contas = contasAbertas($conexao);
?>
<h1> Restaurante </h1>
<h1> Contas Abertas </h1>
<table class="table table-bordered table-hover">
	<tr class="active">
		<td>Mesa</td>
		<td>Cliente</td>
		<td>Valor</td>
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
	</tr>
<?php
endforeach ?>
</table>

<?php
include("rodape.php");
?>
