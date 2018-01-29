<?php
include("cabecalho.php");
include("conexao.php");
include("cliente-banco.php");


//verifica se é materia-prima ou industrializado
//vê se não está vazio e manda pra função no cliente-banco.php
if($_POST["tipo_prod"] == "industrializado"){
		header("Location: produtos-industrializados.php");
} else {
	header("Location: produtos-naturais.php");
}

include("rodape.php");