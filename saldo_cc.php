<?php
include "cadastrocc.php";
setlocale(LC_ALL, 'pt_BR', 'pt_BR.utf-8', 'pt_BR.utf-8', 'portuguese');
date_default_timezone_set('America/Sao_Paulo');
?>
<html>
<head>
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
        <label for="saldo">Valor do saldo em conta corrente: </label>
        <input autofocus type="text" id="saldo" name="saldo" lang="pt" maxlength="200" value="<?php echo isset($dados['saldo']) ? $dados['saldo'] : ''; ?>"  />
        <?php if(isset($erro['saldo'])) { ?>
        <label class="erro" for="saldo"><?php echo $erro['saldo']; ?></label>
    <?php } ?>
        </li>
    <li>
	<?php echo strftime('%d de %B de %Y', strtotime('today')); ?>
	</li>
	<li>
        <input type="hidden" id="data_nome" name="data_nome" lang="pt" maxlength="10" OnKeyPress="formatar(this, '##/##/####')" value="<?php echo strftime('%d de %B de %Y', strtotime('today')); ?>" />
        <?php if(isset($erro['data_nome'])) { ?>
        <label class="erro" for="data_nome"><?php echo $erro['data_nome']; ?></label>
        <?php } ?>
    </li>
	<li>
        <input type="hidden" id="mes" name="mes" lang="pt" maxlength="10" OnKeyPress="formatar(this, '##/##/####')" value="<?php echo strftime('%B', strtotime('today')); ?>" />
        <?php if(isset($erro['mes'])) { ?>
        <label class="erro" for="mes"><?php echo $erro['mes']; ?></label>
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