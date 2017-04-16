<?php

$conexao = mysqli_connect("localhost","root",""); // Mapeando o caminho do banco de dados
if (!$conexao) // Verificando se existe conexão com o caminho mapeado
{
die('Erro ao conectar: ' . mysql_error()); // Caso o caminho esteja errado, o usuário ou a senha esteja errado, irá mostrar esta mensagem
}

mysqli_select_db($conexao, "controle"); // Selecionando o banco de dados

$id = $_GET['id']; // Recebendo o valor enviado pelo link

mysqli_query($conexao, "DELETE FROM despesas WHERE id='".$id."'"); // A instrução delete irá apagar todos os dados da id recebida

mysqli_close($conexao); // Fechando a conexão com o banco de dados

header ("location: SucessoDeletar.php");
?>