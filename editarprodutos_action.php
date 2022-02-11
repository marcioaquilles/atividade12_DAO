<?php
require 'config.php';
include 'ProdutoDaoMysql.php';

if (isset($pdo)) {
    $produtoDAO = new ProdutoDaoMysql($pdo);
}

$id = filter_input(INPUT_POST, 'id');
$name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_SPECIAL_CHARS);
$qtd = filter_input(INPUT_POST, 'qtd', FILTER_SANITIZE_NUMBER_INT);
$valor = filter_input(INPUT_POST, 'valor',FILTER_SANITIZE_SPECIAL_CHARS);
$desc = filter_input(INPUT_POST, 'desc', FILTER_SANITIZE_SPECIAL_CHARS);

if ($id && $name && $qtd && $valor && $desc) {

    $produto = $produtoDAO->findByID($id);
    $produto->setIdProduto($id);
    $produto->setNomeProduto($name);
    $produto->setQuantidade($qtd);
    $produto->setValor($valor);
    $produto->setDescricao($desc);
    $produtoDAO->update($produto);
    header("location: index.php");
    exit();
} else {
    header("location: editarprodutos.php?id=".$id);
    exit();
}



