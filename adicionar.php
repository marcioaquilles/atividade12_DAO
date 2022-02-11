<!doctype html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/style2.css">
    <title>Tela Adicionar Produtos</title>
</head>
<body>
<h1>Adicionar Produtos</h1>
<div class="container">
    <div class="content">
        <div id="login">
            <form method="post" action="adicionar_action.php">
                <label>
                    Nome Produto: <br>
                    <input type="text" name="name">
                </label><br><br>
                <label>
                    Quantidade: <br>
                    <input type="text" name="qtd">
                </label><br><br>
                <label>
                    Valor R$: <br>
                    <input type="text" name="valor">
                </label><br><br>
                <label>
                    Descrição: <br>
                    <input type="text" name="desc">
                </label><br><br>
                <input class="btn" type="submit" value="Adicionar">
            </form>
        </div>
    </div>
</div>

</body>
</html>