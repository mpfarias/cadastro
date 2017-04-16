<?php
setlocale(LC_ALL, 'pt_BR', 'pt_BR.utf-8', 'pt_BR.utf-8', 'portuguese');
date_default_timezone_set('America/Sao_Paulo');

$conexao = mysqli_connect("localhost","root",""); // Mapeando o caminho do banco de dados
if (!$conexao) // Verificando se existe conexão com o caminho mapeado
{
die('Erro ao conectar: ' . mysqli_error($conexao)); // Caso o caminho esteja errado, o usuário ou a senha esteja errado, irá mostrar esta mensagem
}

mysqli_select_db($conexao, "controle"); // Selecionando o banco de dados
$resultado = mysqli_query($conexao, "SELECT * FROM despesas"); // Há variável $resultado faz uma consulta em nossa tabela selecionando todos os registros de todos os campos

while($linha = mysqli_fetch_array($resultado)) //Já a instrução while faz um loop entre todos os registros e armazena seus valores na variável $linha
{	
	$mes=$linha['mes'];
	$mes_num=strftime('%m', strtotime('today'));
	$ano_num=strftime('%Y', strtotime('today'));
	$ano=strftime('%Y', strtotime('today'));
}
?>
<html><head>
		<title>Controle Financeiro</title>
		<meta http-equiv='Content-Type' content='text/html; charset=UTF-8'>
		<link rel='shortcut icon' href='cif.jpg' type='image/x-icon'/>
	</head>
<style>
body {
	font-family: verdana;
	background-color:#FAFAD2;
}
h1 {
	font-size: 10pt;
	
}
h2 {
	font-size: 10pt;
	font-color: #aaa;
}
a:link{
	color:#000000;
	text-decoration:none;
}
a:hover{
	color:#545454;
	text-decoration:none;
}
a:visited{
	color:#000000;
	text-decoration:none;
}
input[type=button] {
    color: #FFF;
    width: 150px;
    height: 24px;
    line-height: 24px;
    background: #796;
    border: 0 none;
}
</style>

		<body>
<BR>
			<center>
			<table border=0 width=80%>
				<tr>
					<td height=30>
					</td>
					<td align=center>Controle Financeiro - Família Farias</td><td></td>
					</tr>
			</table><br>
						<table border=0 width=60%>
				<tr>
					<td height=30 width=50%><h1>Mês de referência: <?php echo strftime('%B', strtotime('today')); ?><br>
					Ano de referência: <?php echo strftime('%Y', strtotime('today')); ?><br>
<?php
$resultado = mysqli_query($conexao, "SELECT * FROM conta WHERE mes='".$mes."'"); // Há variável $resultado faz uma consulta em nossa tabela selecionando todos os registros de todos os campos

while($linha = mysqli_fetch_array($resultado)) //Já a instrução while faz um loop entre todos os registros e armazena seus valores na variável $linha
{
$saldo=$linha['saldo'];
$real_saldo=number_format($saldo,2,',','.');
}
?>
					Saldo inicial em Conta Corrente: <font color=#7FFF00>R$ <?php 
					echo $real_saldo; ?></font><br>
					</td>
					<td width=20%></td>
					<td width=20%></td>
					</tr>
					</table><center>
					<table width=60% border=0>
					<tr>
					<td width=30%><h1>Descrição:</h1>
						<td width=30%><h1>Valor:</td>
						<td width=20%><h1>Data:</td>
						<td></td>
<?php
mysqli_select_db($conexao, "controle"); // Selecionando o banco de dados
$res_fixas = mysqli_query($conexao, "SELECT * FROM fixas");
while($linha = mysqli_fetch_array($res_fixas))
{
	$idf=$linha['id'];
	$localf=$linha['local'];
	$valorf=$linha['valor'];
	$dataf=$linha['data'];
	$realf=number_format($valorf,2,',','.');
	echo "<table width=60% border=0>
	<tr>
	<td width=30%><u><a href=Edita.php?id=$idf>".$linha['local']."</u></a><font color='red'> (Despesa Fixa)</font></td>
	<td width=30% align=left><font color='red'><u>-R$ ".$realf."</font></td>
	<td align=left width=20%>".$linha['data']."/".$mes_num."/".$ano_num."</td>
	<td><a href=deletar.php?id=$idf>Apagar registro</a></td>
	</tr>
	</table>";
}
	?>
	</td>
<?php

$resultado = mysqli_query($conexao, "SELECT * FROM despesas WHERE mes='".$mes."' ORDER BY data ASC"); // Há variável $resultado faz uma consulta em nossa tabela selecionando todos os registros de todos os campos

while($linha = mysqli_fetch_array($resultado)) //Já a instrução while faz um loop entre todos os registros e armazena seus valores na variável $linha
{
	$id=$linha['id'];
	$local=$linha['local'];
	$valor=$linha['valor'];
	$data=$linha['data'];
	$real=number_format($valor,2,',','.');

echo "<table width=60% border=0>
	<tr>
	<td width=30%><u><a href=Edita.php?id=$id>".$linha['local']."</a></td>
	<td width=30% align=left><font color='red'><u>-R$ ".$real."</font></td>
	<td align=left width=20%>".$linha['data']."</td>
	<td><a href=deletar.php?id=$id>Apagar registro</a></td>
		</tr>
		</table>";
}
				?>
	</td>
				</tr>
				<tr>
				<td colspan=3><br><br>Total das despesas = <font color=#990000>- R$ <?php
$sql = "SELECT SUM(valor) FROM despesas UNION SELECT SUM(valor) FROM fixas WHERE mes='".$mes."'";
$resultado = mysqli_query($conexao, $sql);
$total= mysqli_fetch_row($resultado);
$real_total=$total[0];
$real_total_edit=number_format($real_total,2,',','.');

     echo $real_total_edit;
	 echo "</font><br>";
	 echo "<br>";
	 echo "<h2>Saldo atual em Conta Corrente:<font color=#006600> R$";
	 echo $saldo-$real_total;
	 echo "</font>";
?></td>
				</tr>
			</table><br><br>
					<input type="button" value="Voltar" onClick="window.location='index.php';">
		</body>
</html>
