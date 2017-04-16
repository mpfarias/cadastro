<?php
$id = $_POST['id']; // Recebendo o valor id do formulário
$local = $_POST['local'];// Recebendo o valor nome do formulário
$valor = $_POST['valor'];// Recebendo o valor email do formulário
$data = $_POST['data'];// Recebendo o valor data do fomrulário
$conexao = mysqli_connect("localhost","root",""); // Mapeando o caminho do banco de dados
if (!$conexao) // Verificando se existe conexão com o caminho mapeado
{
die('Erro ao conectar: ' . mysqli_error()); // Caso o caminho esteja errado, o usuário ou a senha esteja errado, irá mostrar esta mensagem
}

mysqli_select_db($conexao, "controle"); // Selecionando o banco de dados

mysqli_query($conexao, "UPDATE despesas SET local='".$local."', valor = '".$valor."', data = '".$data."' WHERE id='".$id."'");

mysqli_close($conexao);

header ("location: Sucesso_Editar.php");
?>