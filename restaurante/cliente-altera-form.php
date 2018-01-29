<?php
include("cabecalho.php");
include("conexao.php");
include("cliente-banco.php");

$id = $_POST['id_cadastrado'];
$cliente = buscaCliente($conexao, $id);
?>

<h1>Alterando cliente</h1>
<form action="cliente-altera.php" method="post">
	<table class="table">
		<tr>
			<td>Nome</td>
			<td><input class="form-control" type="text" name="nome" value="<?=$cliente['nome']?>"></td>
		</tr>
		<tr>
			<td>Telefone</td>
			<td><input class="form-control" type="text" name="telefone" value="<?=$cliente['telefone']?>"></td>
		</tr>
		<tr>
			<td></td>
			<td><button class="btn btn-primary btn-lg" type="submit">Alterar</button>
				<a href="cliente-lista.php" class="btn btn-danger btn-lg" role="button">Cancelar</a></td>
		</tr>
	</table>
	<input type="hidden" name="id_cadastrado" value="<?=$cliente['id_cadastrado']?>" />
</form>

<?php include("rodape.php"); ?>