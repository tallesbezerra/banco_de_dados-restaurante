<?php
include("cabecalho.php");
include("conexao.php");
include("cliente-banco.php");

$id = $_POST['id'];
$result = detalhaProduto($conexao, $id);
$resultado = mysqli_query($conexao,"select tipo_prod from produto where cod_produto = $id");
$resultado = mysqli_fetch_assoc($resultado);
if($resultado['tipo_prod'] === "industrializado") {
?>

<table class="table table-bordered table-hover">
	<tr class="active">
		<td>Codigo do produto</td>
		<td>Tipo de bebida</td>
		<td>Temperatura de armazenamento</td>
		<td>Temperatura de consumo</td>
	</tr>
	<tr>
		<td><?=$result['cod_indus']?></td>
		<td><?=$result['tipo_beb']?></td>
		<td><?=$result['temp_armaz']?></td>
		<td><?=$result['temp_consumo']?></td>
</table>

<?php }
else {
?>
<table class="table table-bordered table-hover">
	<tr class="active">
		<td>Código do produto</td>
		<td>Unidade de medida</td>
	</tr>
	<tr>
		<td><?=$result['cod_matprim']?></td>
		<td><?=$result['medida']?></td>
</table>
<?php
}
include("rodape.php"); ?>