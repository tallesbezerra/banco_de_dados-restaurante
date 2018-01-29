<?php
include("cabecalho.php");
include("conexao.php");
?>
	<h1> Novo Prato </h1>
	<form action="cardapio-cadastro.php" method="post">
	<table class="table">
		<tr>
			<td>Nome:</td>
			<td><input class="form-control" type="text" name="nome" /></td>
		</tr>
		<tr>
			<td>Preço:</td>
			<td><input class="form-control" type="number" name="preco" /></td>
		</tr>
		<tr>
			<td>Quantidade de ingredientes:</td>
			<td><input class="form-control" type="number" name="n_ing" /></td>
		</tr>
		<tr>
			<td>Tempo de preparo:</td>
			<td><input class="form-control" type="text" placeholder="HH:mm:ss" name="tempo" /></td>
		</tr>
		<tr>
			<td></td>
			<td><input type="submit" class="btn btn-primary btn-lg" value="Cadastrar" />
			<a href="index.php" class="btn btn-danger btn-lg" role="button">Cancelar</a></td>
		</tr>
	</table>
	</form>
<?php include("rodape.php") ?>
