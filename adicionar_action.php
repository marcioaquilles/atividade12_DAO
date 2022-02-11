<?php
require 'config.php';
require 'ProdutoDaoMysql.php';

if (isset($pdo)) {
    $produtoDAO = new ProdutoDaoMysql($pdo);
}

$name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_SPECIAL_CHARS);
$qtd = filter_input(INPUT_POST, 'qtd', FILTER_SANITIZE_NUMBER_INT);
$valor = filter_input(INPUT_POST, 'valor', FILTER_SANITIZE_SPECIAL_CHARS);
$desc = filter_input(INPUT_POST, 'desc', FILTER_SANITIZE_SPECIAL_CHARS);

if ($name && $qtd && $valor && $desc) {

    if ($produtoDAO->findByNome($name) == false) {
        $novoProduto = new Produto();
        $novoProduto->setNomeProduto($name);
        $novoProduto->setQuantidade($qtd);
        $novoProduto->setValor($valor);
        $novoProduto->setDescricao($desc);

        $produtoDAO->add($novoProduto);
        header("location: index.php");
        exit;
    } else {
        header("location: adicionar.php");
        exit();
    }

} else {
    header("location: adicionar.php");
    exit();
}

