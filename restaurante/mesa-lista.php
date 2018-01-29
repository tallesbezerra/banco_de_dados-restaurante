<?php
include("cabecalho.php");
include("conexao.php");
include("conta-banco.php");
$mesas = statusMesas($conexao);
?>
<h1> Mesas </h1>
<table class="table table-bordered table-hover">
	<tr class="active">
		<td>Mesa</td>
		<td>Status</td>
	</tr>
<?php
foreach($mesas as $mesa):
	if($mesa['disponivel'] == '1')
		$mesa['status'] = 'Disponível';
	else
		$mesa['status'] = 'Indisponível';
?>
	<tr>
		<td><?=$mesa['mesa_tema']?></td>
		<td><?=$mesa['status']?></td>
	</tr>
<?php
endforeach ?>
</table>
<?php include("rodape.php"); ?>