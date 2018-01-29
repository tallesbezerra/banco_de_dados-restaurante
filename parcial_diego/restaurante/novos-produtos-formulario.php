<?php
include("cabecalho.php");
include("conexao.php");
include("cliente-banco.php");
?>
	<h1> Cadastro de produtos </h1>
	<form action="classifica-produtos.php" method="post">
	<table class="table">
		<tr>
			<td>Tipo de Produto:</td>
			<td>
				<select name="tipo_prod" class="form-control">
						<option value="materia-prima">materia-prima</option>
						<option value="industrializado">industrializado</option>
				</select>
			</td>
		</tr>
		<tr>
			<td></td>
			<td><input type="submit" class="btn btn-primary btn-lg" value="Cadastrar" />
			<a href="index.php" class="btn btn-danger btn-lg" role="button">Cancelar</a></td>
		</tr>
	</table>
	</form>
<?php include("rodape.php") ?>