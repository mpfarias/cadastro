<?php
$id = $_POST['id']; // Recebendo o valor id do formulário
$nome = $_POST['nome'];// Recebendo o valor nome do formulário
$email = $_POST['email'];// Recebendo o valor email do formulário
$conexao = mysqli_connect("localhost","root",""); // Mapeando o caminho do banco de dados
if (!$conexao) // Verificando se existe conexão com o caminho mapeado
{
die('Erro ao conectar: ' . mysqli_error()); // Caso o caminho esteja errado, o usuário ou a senha esteja errado, irá mostrar esta mensagem
}

mysqli_select_db($conexao, "edita"); // Selecionando o banco de dados

mysqli_query($conexao, "UPDATE edita SET nome='".$nome."', email = '".$email."' WHERE id='".$id."'");

mysqli_close($conexao);
?>