<?php
include("cabecalho.php");
include("conexao.php");
include("cliente-banco.php");

$id = $_POST['id'];
$ingredientes = listaIngredientes($conexao,$id);
?>
<h1>Lista de Ingredientes</h1>


<table class="table table-bordered table-hover">
	<tr class="active">
		<td>Ingrediente</td>
		<td>Quantidade</td>
	</tr>
<?php
foreach($ingredientes as $ingrediente):
?>
	<tr>
		<td><?=$ingrediente['nome_ing']?></td>
		<td><?=$ingrediente['qtd_ing']?></td>
	</tr>
<?php
endforeach ?>
</table>
<?php include("rodape.php"); ?>