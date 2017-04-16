<?php
include "cadastro.php";
setlocale(LC_ALL, 'pt_BR', 'pt_BR.utf-8', 'pt_BR.utf-8', 'portuguese');
date_default_timezone_set('America/Sao_Paulo');
?>
<html>
<head>
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
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<link rel="shortcut icon" href="cif.jpg" type="image/x-icon"/>
		<title>Lançamentos Atuais</title>
		</head>

<body>
<BR>
			<center>
			<table border=0 width=80%>
				<tr>
					<td height=30 width=10%>
					</td>
					<td align=center>Controle Financeiro - Família Farias</td><td width=10%></td>
					</tr>
					<tr>
					<td></td>
<td width=50% align=center>
<form id="lancamento" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
<ul>
    <li>
        <label for="local">1 - Origem da despesa: </label>
        <input autofocus type="text" id="local" name="local" lang="pt" maxlength="200" value="<?php echo isset($dados['local']) ? $dados['local'] : ''; ?>"  />
        <?php if(isset($erro['local'])) { ?>
        <label class="erro" for="local"><?php echo $erro['local']; ?></label>
    <?php } ?>
        </li>
    <li>
        <label for="data">2 - Data da compra/despesa: </label>
        <input type="text" id="data" name="data" lang="pt" maxlength="10" OnKeyPress="formatar(this, '##/##/####')" value="<?php echo isset($dados['data']) ? $dados['data'] : ''; ?>" />
        <?php if(isset($erro['data'])) { ?>
        <label class="erro" for="data"><?php echo $erro['data']; ?></label>
        <?php } ?>
    </li>
    <li>
        <label for="valor">3 - Valor da compra/despesa, em Reais:</label>
        <input type="text" id="valor" name="valor" lang="pt" maxlength="100" value="<?php echo isset($dados['valor']) ? $dados['valor'] : ''; ?>" />
        <?php if(isset($erro['valor'])) { ?>
        <label class="erro" for="valor"><?php echo $erro['valor']; ?></label>
        <?php } ?>
    </li>
	<li>
        <label for="mes">Mês da compra: <?php echo strftime('%B', strtotime('today')); ?></label>
	</li>
	<li>
		<input type="hidden" id="mes" name="mes" lang="pt" maxlength="200" value="<?php echo strftime('%B', strtotime('today')); ?>"  />
        <?php if(isset($erro['mes'])) { ?>
        <label class="erro" for="mes"><?php echo $erro['mes']; ?></label>
    <?php } ?>
    </li>
	<li>
		<input type="hidden" id="ano" name="ano" lang="pt" maxlength="200" value="<?php echo strftime('%Y', strtotime('today')); ?>"  />
        <?php if(isset($erro['ano'])) { ?>
        <label class="erro" for="ano"><?php echo $erro['ano']; ?></label>
    <?php } ?>
        </li>
    <li>
        <input type="submit" id="enviar" value="Gravar" /><br><br>
		<input type="button" value="Voltar" onClick="window.location='index.php';">
    </li>
</ul>
</form>
						</td>
					<td></td>
				</tr>
</tr>
</body>
</html>