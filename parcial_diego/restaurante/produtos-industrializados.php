<?php
include("cabecalho.php");
include("conexao.php");
?>
	<h1> Cadastro de produtos </h1>
	<form action="cadastra-produtos.php" method="post">
	<table class="table">
		<tr>
			<td>Produto:</td>
			<td><input class="form-control" type="text" name="nome_prod" /></td>
		</tr>
		<tr>
			<td>Quantidade comprada:</td>
			<td><input class="form-control" type="number" name="qtd_prod" /></td>
		</tr>
		<tr>
			<td>Tipo de Produto:</td>
			<td>
				<select name="tipo_prod" class="form-control">
						<option value="industrializado">industrializado</option>
				</select>
			</td>
		</tr>
		<tr>
			<td>Tipo de bebida:</td>
			<td>
				<select name="tipo_beb" class="form-control">
						<option value="quente">quente</option>
						<option value="fria">fria</option>
				</select>
			</td>
		</tr>
		<tr>
			<td>Temperatura de armazenamento:</td>
			<td><input class="form-control" type="number" name="espc" /></td>
		</tr>
		<tr>
			<td>Temperatura de consumo:</td>
			<td><input class="form-control" type="number" name="temp_consumo" /></td>
		</tr>
		<tr>
			<td>Data da compra:</td>
			<td><input class="form-control" type="date" name="data_ent" /></td>
		</tr>
		<tr>
			<td>Local de armazenamento:</td>
			<td><input class="form-control" type="text" name="local_armaz" /></td>
		</tr>
		<tr>
			<td>Preço da compra:</td>
			<td><input class="form-control" type="number" name="preco_lote" /></td>
		</tr>
		<tr>
			<td>Data de validade:</td>
			<td><input class="form-control" type="date" name="validade" /></td>
		</tr>
		<tr>
			<td>Fornecedor:</td>
			<td><input class="form-control" type="text" name="fornecedor" /></td>
		</tr>
		<tr>
			<td></td>
			<td><input type="submit" class="btn btn-primary btn-lg" value="Cadastrar" />
			<a href="index.php" class="btn btn-danger btn-lg" role="button">Cancelar</a></td>
		</tr>
	</table>
	</form>
<?php include("rodape.php") ?>