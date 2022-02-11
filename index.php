<?php
require 'config.php';
require 'ProdutoDaoMysql.php';

$produtoDAO = new ProdutoDaoMysql($pdo);
$lista = $produtoDAO->findAll();

?>
<!doctype html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/style.css">
    <title>Produtos</title>
</head>
<body>
<div id="data-hora"></div>
<script>
    // Função para formatar 1 em 01
    const zeroFill = n => {
        return ('0' + n).slice(-2);
    }

    // Cria intervalo
    const interval = setInterval(() => {
        // Pega o horário atual
        const now = new Date();

        // Formata a data conforme dd/mm/aaaa hh:ii:ss
        const dataHora = zeroFill(now.getUTCDate()) + '/' + zeroFill((now.getMonth() + 1)) + '/' + now.getFullYear() + ' ' + zeroFill(now.getHours()) + ':' + zeroFill(now.getMinutes()) + ':' + zeroFill(now.getSeconds());

        // Exibe na tela usando a div#data-hora
        document.getElementById('data-hora').innerHTML = dataHora;
    }, 1000);
</script>
<table>
    <tr>
        <th>Id</th>
        <th>Nome Produto</th>
        <th>Quantidade</th>
        <th>Valor</th>
        <th>Descrição</th>
        <th>Ações</th>
    </tr>
    <?php foreach ($lista as $produtos):?>
    <tr>
        <td><?php echo $produtos->getIdProduto();?></td>
        <td><?php echo $produtos->getNomeProduto();?></td>
        <td><?php echo $produtos->getQuantidade();?></td>
        <td><?php echo $produtos->getValor();?></td>
        <td><?php echo $produtos->getDescricao();?></td>
        <td>
            <a href="editarprodutos.php?id=<?php echo $produtos->getIdProduto()?>"><img class="img" src="https://img.icons8.com/ios/50/000000/edit-administrator.png"/></a>
            <a href="excluirprodutos.php?id=<?php echo $produtos->getIdProduto();?>" onclick="return confirm('Tem certeza que deseja excluir o campo?')"><img class="img" src="https://img.icons8.com/ios/50/000000/delete--v1.png"/></a>
        </td>
    </tr>
    <?php endforeach ?>
</table>
<br>
<a href="adicionar.php" class="btn">Adicionar Produtos</a>
<div class="copy">&copy; Copyright 2021-<?php echo date("Y");?> - All Rights Reserved </div>
</body>
</html>

