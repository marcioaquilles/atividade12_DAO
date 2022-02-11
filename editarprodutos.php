<?php
require 'config.php';
require 'ProdutoDaoMysql.php';

if (isset($pdo)) {
    $produtoDAO = new ProdutoDaoMysql($pdo);
}

$produto = false;
$id = filter_input(INPUT_GET, 'id');

if ($id) {
    $produto = $produtoDAO->findByID($id);
}
if ($produto == false) {
    header("location:index.php");
    exit;
}
?>

<!doctype html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/style2.css">
    <title>Tela Editar Produtos</title>
</head>
<body>
<h1>Editar Produtos</h1>
<div class="container">
    <div class="content">
        <div id="login">
            <form method="post" action="editarprodutos_action.php">
                <input type="hidden" name="id" value="<?php echo $produto->getIdProduto();?>">
                <label>
                    Nome Produto: <br>
                    <input type="text" name="name" value="<?php echo $produto->getNomeProduto();;?>">
                </label><br><br>
                <label>
                    Quantidade: <br>
                    <input type="number" name="qtd" value="<?php echo $produto->getQuantidade();?>">
                </label><br><br>
                <label>
                    Valor R$: <br>
                    <input type="text" name="valor" value="<?php echo $produto->getValor();?>">
                </label><br><br>
                <label>
                    Descrição: <br>
                    <input type="text" name="desc" value="<?php echo $produto->getDescricao();?>">
                </label><br><br>
                <input class="btn" type="submit" value="Editar Produto">
            </form>
        </div>
    </div>
</div>

</body>
</html>