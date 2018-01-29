<?php
include("cabecalho.php");
include("conexao.php");
include("cliente-banco.php");
include("conta-banco.php");
$id_cadastrado = $_POST['id_cadastrado'];
$cliente = buscaCliente($conexao, $id_cadastrado);
$contas = buscaContas($conexao, $id_cadastrado);
?>
<h1> Contas de <?php echo $cliente['nome']; ?> </h1>
<table class="table table-bordered table-hover">
	<tr class="active">
		<td>Mesa</td>
		<td>Data</td>
		<td>Valor</td>
		<td>Aberta</td>
	</tr>
<?php
foreach($contas as $conta):
	if($conta['aberta'] == '1')
		$conta['esta_aberta'] = 'Sim';
	else
		$conta['esta_aberta'] = 'Não';
?>
	<tr>
		<td><?=$conta['mesa_tema']?></td>
		<td><?=$conta['data_conta']?></td>
		<td><?=$conta['valor']?></td>
		<td><?=$conta['esta_aberta']?></td>
	</tr>
<?php
endforeach ?>
</table>
<?php include("rodape.php"); ?>