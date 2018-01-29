<?php
include("cabecalho.php");
include("conexao.php");
?>
	<h1> Cadastro de cliente </h1>
	<form action="cliente-cadastro.php" method="post">
	<table class="table">
		<tr>
			<td>Nome:</td>
			<td><input class="form-control" type="text" placeholder="Nome" name="nome" /></td>
		</tr>
		<tr>
			<td>Telefone:</td>
			<td><input class="form-control" type="text" placeholder="XXXXX-XXXX" name="telefone" /></td>
		</tr>
		<tr>
			<td></td>
			<input type="hidden" name="tipo_cliente" value="cadastrado" />
			<td><input type="submit" class="btn btn-primary btn-lg" value="Cadastrar" />
			<a href="index.php" class="btn btn-danger btn-lg" role="button">Cancelar</a></td>
		</tr>
	</table>
	</form>
<?php include("rodape.php") ?>
