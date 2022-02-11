<?php
////Aula dia 26/10/2021 - Conexão Banco de Dados
//
//$conexao = new PDO("mysql:dbname=cest;host=localhost", "root", "");
////Passamos como argumentos ao PDO o banco usado o nome e o servidor seguido do usuário e senha.
//
//$sql = $conexao->query('select * from aluno');
//$dados = $sql->fetchAll(PDO::FETCH_ASSOC);
//
//echo "Total de conexões: " . $sql->rowCount();
//
//echo "<pre>";
//print_r($dados);

$db_name = 'atividade_banco';
$db_host = 'localhost';
$db_user = 'root';
$db_password = '';

$pdo = new PDO("mysql:dbname=".$db_name.";host=".$db_host,$db_user,$db_password);
//$sql = $pdo->query('select * from produtos');
//$dados = $sql->fetchAll(PDO::FETCH_ASSOC);
//echo "Total de conexões: " . $sql->rowCount() . "<br>";
//echo "<pre>";
//print_r($dados);
//echo "</pre>";