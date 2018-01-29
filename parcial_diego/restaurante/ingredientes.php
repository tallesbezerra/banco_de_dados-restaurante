<?php
include("cabecalho.php");
include("conexao.php");

$tempo = $_GET['tempo'];
$limite = $_GET['n_ing'];//Quantidade de ingredientes do prato
//echo $limite;
//echo $tempo;
//Se $limite atingir 0 significa que já cadastrou todos os ingredientes, se não continua decrementando
if ($limite == 0){ 
	header("Location: cardapio-lista.php");
} else {
	$limite--;
?>
	<h1> Ingredientes do prato </h1>
	<form action="insere-ingrediente.php" method="post">
	<table class="table">
		<input type="hidden" name="n_ing" value="<?=$limite?>"/>
		<input type="hidden" name="tempo" value="<?=$tempo?>"/>
			<td>Ingrediente:</td>
			<td><input class="form-control" type="text" name="nome" /></td>
		</tr>
		<tr>
			<td>Quantidade:</td>
			<td><input class="form-control" type="number" name="qtd" /></td>
		</tr>
		<tr>
			<td></td>
			<td><input type="submit" class="btn btn-primary btn-lg" value="Cadastrar" />
			<a href="index.php" class="btn btn-danger btn-lg" role="button">Cancelar</a></td>
		</tr>
	</table>
	</form>
<?php 
}
include("rodape.php") ?>
