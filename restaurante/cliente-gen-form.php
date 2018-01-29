<?php
include("cabecalho.php");
include("conexao.php");
include("conta-banco.php");
$mesas = listaMesas($conexao);
?>
	<h1> Cliente Genérico </h1>
	<form action="cliente-cadastro.php" method="post">
	<table class="table">
		<tr>
			<td>Descrição:</td>
			<td><input class="form-control" type="text" placeholder="Descrição" name="descricao" /></td>
		</tr>
		<tr>
			<td>Mesa</td>
			<td><select name="id_mesa" class="form-control">
			<?php foreach ($mesas as $mesa): ?>
				<option value="<?=$mesa['id_mesa']?>"><?=$mesa['tema']?></option>
			<?php endforeach ?>
			</select></td>
		</tr>
		<tr>
			<td>Data</td>
			<td><input class="form-control" type="date" name="data_conta"></td>
		</tr>
		<tr>
			<td></td>
			<input type="hidden" name="tipo_cliente" value="generico" />
			<td><input type="submit" class="btn btn-primary btn-lg" value="Cadastrar" />
			<a href="index.php" class="btn btn-danger btn-lg" role="button">Cancelar</a></td>
		</tr>
	</table>
	</form>
<?php include("rodape.php") ?>
