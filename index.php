<?php
setlocale(LC_ALL, 'pt_BR', 'pt_BR.utf-8', 'pt_BR.utf-8', 'portuguese');
date_default_timezone_set('America/Sao_Paulo');
$mes=strftime('%m', strtotime('today'));	
$conexao = mysqli_connect("localhost","root",""); // Mapeando o caminho do banco de dados
if (!$conexao) // Verificando se existe conexão com o caminho mapeado
{
die('Erro ao conectar: ' . mysqli_error($conexao)); // Caso o caminho esteja errado, o usuário ou a senha esteja errado, irá mostrar esta mensagem
}

mysqli_select_db($conexao, "controle"); // Selecionando o banco de dados
$resultado = mysqli_query($conexao, "SELECT * FROM despesas WHERE mes='".$mes."'"); // Há variável $resultado faz uma consulta em nossa tabela selecionando todos os registros de todos os campos

while($linha = mysqli_fetch_array($resultado)) //Já a instrução while faz um loop entre todos os registros e armazena seus valores na variável $linha
{
	$mes=$linha['mes'];
}
?>
<html><head>
		<title>Controle Financeiro - Família Farias</title>
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
					<tr>
					<td></td>
					<td width=50%><br><h1>
						>><a href=lanc_fixas.php>Inserir DESPESA(S) fixas(s)</a><<<br>
						>><a href=lanc_atual.php>Inserir LANÇAMENTO(S) atual(is)</a><<<br>
						>><a href=saldo_cc.php>Inserir SALDO EM CONTA CORRENTE</a><<<br>
						>><a href=pesquisa_lanc.php>Pesquisar lançamentos anteriores</a><<<br>
>><a href="vizualiza_tabela.php?id=<?php echo $mes; ?>;">Vizualizar tabela do mês de <?php echo strftime('%B', strtotime('today')); ?></a><<
	</h1>

						</td>
					<td></td>
				</tr>
				<tr>
					<td height=30></td>
					<td align=center>----------------------------------------------------------</td>
					<td></td>
					</tr>
					<tr>
					<td></td>
					<td align=center><img src=ASS_0237_8848.jpg width=240 height=350></td>
					<td></td>
				</tr>
			</table>
						
		</body>
</html>