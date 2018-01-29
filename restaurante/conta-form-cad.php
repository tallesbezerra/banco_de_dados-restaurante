<?php
include("cabecalho.php");
include("conexao.php");
include("cliente-banco.php");
include("conta-banco.php");
$clientes = listaClientes($conexao);
$mesas = listaMesas($conexao);
?>
<h1> Abrir Conta </h1>
<form action="conta-cadastro.php" method="post">
	<table class="table">
		<tr>
			<td>Cliente</td>
			<td><select name="id_cadastrado" class="form-control">
			<?php foreach ($clientes as $cliente): ?>
				<option value="<?=$cliente['id_cadastrado']?>"><?=$cliente['nome']?></option>
			<?php endforeach ?>
			</select></td>
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
			<td><input class= "form-control" type="date" name="data_conta"></td>
		</tr>
		<tr>
			<td></td>
			<input type="hidden" name="tipo" value="cadastrado" />
			<td><input type="submit" class="btn btn-primary btn-lg" value="Abrir Conta" />
			<a href="conta-escolhe-tipo.php" class="btn btn-danger btn-lg" role="button">Voltar</a></td>
		</tr>
	</table>
	</form>
<?php include("rodape.php") ?>