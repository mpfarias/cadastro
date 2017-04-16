<?php
/* VERIFICO SE HOUVE UM POST */
if(count($_POST) > 0) {
    $erro  = array();
    $dados = array();
 
    /* PERCORRO TODOS OS CAMPOS E O CONTEÚDO DESSES CAMPOS */
    foreach($_POST as $nome => $valor) {
        /* VERIFICO SE NENHUM CAMPO ESTÁ VAZIO */
        if(!empty($valor)) {
            /*
            SE EXISTIR UM CAMPO EMAIL, VERIFICO SE O EMAIL É VÁLIDO
            ATRAVÉS DE UMA VERIFICAÇÃO POR EXPRESSÃO REGULAR
            */
            if($nome == 'email') {
                if(!preg_match("/^([[:alnum:]_.-]){3,}@([[:lower:][:digit:]_.-]{3,})(.[[:lower:]]{2,3})(.[[:lower:]]{2})?$/", $valor)) {
                    $erro[$nome]  = 'Esse <strong>'.ucwords($nome).'</strong> é inválido';
                }
                $dados[$nome] = strip_tags($valor);
            } else {
                $dados[$nome] = strip_tags($valor);
            }
        } else {
            /* APENAS PARA DAR UMA MENSAGEM DIFERENTE CASO O CAMPO SEJA UM ESTADO (TIPO SELECT) */
            if($nome == 'estado') {
                $erro[$nome] = 'Você deve selecionar um <strong>Estado</strong>';
            } else {
                $erro[$nome] = 'O campo <strong>'.ucwords($nome).'</strong> não pode ficar vazio';
            }
        }
    }
 
    /* SENÃO HOUVER NENHUM ERRO, REALIZADO A GRAVAÇÃO NO BANCO DE DADOS */
    if(count($erro) == 0) {
        $conn = new mysqli('localhost', 'root', '');
        if ($conn->connect_error) {
            die('Falha ao estabelecer uma conexão: '.$conn->connect_error);
        } else {
            /*
            VERIFICO SE EXISTE UM BANCO DE DADOS.
            CASO NÃO TENHA O BANCO DE DADOS, EU O CRIO.
            */
            if(!$conn->select_db('controle')) {
                $conn->query('CREATE DATABASE IF NOT EXISTS controle;');
                $conn->select_db('controle');
            }
 
            /*
            FAÇO O MESMO COM A TABELA
            OBS: É POSSÍVEL CRIAR DE FORMA AUTOMÁTICA E BASEADO NO FORMULÁRIO,
            MAS ISSO EU DEIXAREI PARA FAZER EM OUTRAS POSTAGEM COM JQUERY
            */
 
            $tabela = $conn->query('SHOW TABLES LIKE \'despesas\'');
            if($tabela->num_rows == 0) {
                $conn->query('CREATE table despesas(id INT(11) AUTO_INCREMENT NOT NULL, local VARCHAR(255) NOT NULL, data VARCHAR(255) NOT NULL, valor DECIMAL(60,2) NOT NULL, mes VARCHAR(10) NOT NULL, ano VARCHAR(255) NOT NULL, PRIMARY KEY (id));');
            }
 
            $campos  = implode(", ", array_keys($dados));
            $valores = implode("','", $dados);
            $valores = "'".$valores."'";            
 
            $conn->query('INSERT INTO despesas('.$campos.') VALUES('.$valores.')');
            /* SE TUDO ESTIVER OK, REDIRECIONO PARA UMA PÁGINA DE SUCESSO */
            header('location: Sucesso.php');
 
        }
    }
 
}
?>