<!DOCTYPE html PUBLIC “-//W3C//DTD XHTML 1.0 Transitional//EN” “http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd”>
<html xmlns=”http://www.w3.org/1999/xhtml”>
<head>
	<link rel="shortcut icon" href="cif.jpg" type="image/x-icon"/>
	<meta http-equiv=”Content-Type” content=”text/html; charset=utf-8″ />
<title>Editar Registros</title>
<script language="javascript">
function formatar(src, mask){
	var i = src.value.length;
	var saida= mask.substring(0,1);
	var texto = mask.substring(i)
	if (texto.substring(0,1) !=saida)
	{
		src.value += texto.substring(0,1);
	}
}
</script>
<style type="text/css">
body {
	font-family: verdana;
	background-color:#FAFAD2;
}
h1 {
	font-size: 10pt;
}
#cadastro, ul {
    float: left;
    display: block;
}
#cadastro {
    width: 100%;
    padding: 10px;
    box-sizing: border-box;
}
ul {
    list-style: none;
    padding: 0;
    width: 100%;
}
li {
    display: block;
    margin-bottom: 20px;
}
label {
    width: 100%;
    display: block;
    margin-bottom: 5px;
}
#lancamento input[type=text] {
    border: solid 1px #fbfbfbf;
    height: 24px;
    line-height: 24px;
    display: block;
}
#lancamento input[type=submit] {
    color: #FFF;
    width: 150px;
    height: 24px;
    line-height: 24px;
    background: #796;
    border: 0 none;
}
input[type=button] {
    color: #FFF;
    width: 150px;
    height: 24px;
    line-height: 24px;
    background: #796;
    border: 0 none;
}
</style
</head>
<body>
<?php
setlocale(LC_ALL, 'pt_BR', 'pt_BR.utf-8', 'pt_BR.utf-8', 'portuguese');
date_default_timezone_set('America/Sao_Paulo');
$id = $_GET['id']; // Recebendo o valor vindo do link
$conexao = mysqli_connect("localhost","root",""); // Mapeando o caminho do banco de dados
if (!$conexao) // Verificando se existe conexão com o caminho mapeado
{
die('Erro ao conectar: ' . mysqli_error($conexao)); // Caso o caminho esteja errado, o usuário ou a senha esteja errado, irá mostrar esta mensagem
}

mysqli_select_db($conexao, "controle"); // Selecionando o banco de dados
$resultado = mysqli_query($conexao, "SELECT * FROM despesas WHERE id = '".$id."'"); // Há variável $resultado faz uma consulta em nossa tabela selecionando somente o registro desejado
while($linha = mysqli_fetch_array($resultado)) //Já a instrução while faz um loop entre todos os registros e armazena seus valores na variável $linha
{ 
?>
<BR>
			<center>
			<table border=0 width=80%>
				<tr>
					<td height=30 width=10%>
					</td>
					<td align=center>Controle Financeiro - Família Farias - Edição de Registros</td><td width=10%></td>
					</tr>
					<tr>
					<td></td>
<td width=50% align=center><br>
<form id="lancamento" method="post" action="Reg_Editar.php" >
<input type="hidden" name="id" value="<?php echo $linha['id']; ?>" /> <!– passando o valor da id em um campo oculto –>
Descrição: <input type="text" name="local" value="<?php echo $linha['local']; ?>" /> <br /><!– mostrando dentro do form o valor do campo nome –>
Valor, em reais: <input type="text" name="valor" value="<?php echo $linha['valor']; ?>" /> <br /><!– mostrando dentro do form o valor do campo email –>
Data da compra: <input type="text" name="data" value="<?php echo $linha['data']; ?>" /><br />
<input type="button" value="Voltar" onClick="window.location='vizualiza_tabela.php';">
<input type="submit" value="Editar" />

</form>
<?php
}
?> 
						</td>
					<td></td>
				</tr>
</tr>
</body>
</html>
