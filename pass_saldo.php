<?php
$conexao = mysqli_connect("localhost","root",""); // Mapeando o caminho do banco de dados
if (!$conexao) // Verificando se existe conexão com o caminho mapeado
{
die('Erro ao conectar: ' . mysqli_error($conexao)); // Caso o caminho esteja errado, o usuário ou a senha esteja errado, irá mostrar esta mensagem
}

mysqli_select_db($conexao, "controle"); // Selecionando o banco de dados
$resultado = mysqli_query($conexao, "SELECT * FROM conta"); // Há variável $resultado faz uma consulta em nossa tabela selecionando todos os registros de todos os campos

while($linha = mysqli_fetch_array($resultado)) //Já a instrução while faz um loop entre todos os registros e armazena seus valores na variável $linha
{
	$saldo=$linha['saldo'];
if ($saldo->num_rows == 0){
	echo "oi";
	}else{
		header ('location: lanc_atual.php');
}
}
?>