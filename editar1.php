<!DOCTYPE html PUBLIC “-//W3C//DTD XHTML 1.0 Transitional//EN” “http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd”>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Editar</title>
</head>

<body>
<?php
$id = $linha['id']; // Recebendo o valor vindo do link
$conexao = mysqli_connect("localhost","root",""); // Mapeando o caminho do banco de dados
if (!$conexao) // Verificando se existe conexão com o caminho mapeado
{
die('Erro ao conectar: ' . mysqli_error()); // Caso o caminho esteja errado, o usuário ou a senha esteja errado, irá mostrar esta mensagem
}

mysqli_select_db($conexao, "edita"); // Selecionando o banco de dados
$resultado = mysqli_query($conexao, "SELECT * FROM cadastro WHERE id = '".$id."'"); // Há variável $resultado faz uma consulta em nossa tabela selecionando somente o registro desejado
while($linha = mysqli_fetch_array($resultado)) //Já a instrução while faz um loop entre todos os registros e armazena seus valores na variável $linha
{ 
?>
<form method="post" action="editar2.php" >
<input type="hidden" name="id" value="<?php echo $linha['id']; ?>" /> <!– passando o valor da id em um campo oculto –>
Nome: <input type="text" name="nome" value="<?php echo $linha['nome']; ?>" /> <br /><!– mostrando dentro do form o valor do campo nome –>
E-mail: <input type="text" name="email" value="<?php echo $linha['email']; ?>" /> <br /><!– mostrando dentro do form o valor do campo email –>
<input type="submit" value="Editar" /> <input type="button" value="Deletar" onClick="window.location='deletar.php';">

</form>
<?php
}
?> 
</body>
</html>