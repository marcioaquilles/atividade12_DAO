<?php
require 'config.php';
include 'ProdutoDaoMysql.php';

if (isset($pdo)) {
    $produtoDAO = new ProdutoDaoMysql($pdo);
}

$id = filter_input(INPUT_GET, 'id');

if ($id) {
    $produto = $produtoDAO->delete($id);
}

header("location:index.php");
exit;