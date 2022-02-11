<?php
include_once 'Produto.php';
include 'ProdutoDAO.php';

class ProdutoDaoMysql implements ProdutoDAO
{
    private PDO $pdo;

    /**
     * @param $pdo
     */
    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    public function add(Produto $prod) {
        $sql = $this->pdo->prepare("INSERT INTO produtos (nome_produto, quantidade, valor, descricao) 
               VALUES (:name, :qtd, :valor, :desc)");
        $sql->bindValue(':name', $prod->getNomeProduto());
        $sql->bindValue(':qtd', $prod->getQuantidade());
        $sql->bindValue(':valor', $prod->getValor());
        $sql->bindValue(':desc', $prod->getDescricao());
        $sql->execute();

        $prod->setIdProduto($this->pdo->lastInsertId());
        return $prod;
    }

    public function findAll(): array
    {
        $array = [];
        $sql = $this->pdo->query('select * from produtos');
        if ($sql->rowCount() > 0) {
            $data = $sql->fetchAll();

            foreach ($data as $item) {
                $prod = new Produto();
                $prod->setIdProduto($item['id_produto']);
                $prod->setNomeProduto($item['nome_produto']);
                $prod->setQuantidade($item['quantidade']);
                $prod->setValor($item['valor']);
                $prod->setDescricao($item['descricao']);

                $array [] = $prod;
            }
        }
        return $array;
    }

    public function findByID($id) {
        $sql = $this->pdo->prepare("SELECT * FROM produtos WHERE id_produto = :id");
        $sql->bindValue(':id', $id);
        $sql->execute();

        if ($sql->rowCount() > 0) {
            $data = $sql->fetch();
            $prod = new Produto();
            $prod->setIdProduto($data['id_produto']);
            $prod->setNomeProduto($data['nome_produto']);
            $prod->setQuantidade($data['quantidade']);
            $prod->setValor($data['valor']);
            $prod->setDescricao($data['descricao']);
            return $prod;
        } else {
            return false;
        }
    }

    public function findByNome($name) {
        $sql = $this->pdo->prepare("SELECT * FROM produtos WHERE nome_produto = :name");
        $sql->bindValue(':name', $name);
        $sql->execute();

        if ($sql->rowCount() > 0) {
            $data = $sql->fetch();
            $prod = new Produto();
            $prod->setIdProduto($data['id_produto']);
            $prod->setNomeProduto($data['nome_produto']);
            $prod->setQuantidade($data['quantidade']);
            $prod->setValor($data['valor']);
            $prod->setDescricao($data['descricao']);
            return $prod;
        } else {
            return false;
        }
    }

    public function update(Produto $prod) {

        $sql = $this->pdo->prepare("UPDATE produtos SET id_produto = :id, nome_produto = :name, quantidade = :qtd, 
        valor = :valor, descricao = :desc WHERE id_produto = :id");
        $sql->bindValue(':id', $prod->getIdProduto());
        $sql->bindValue(':name', $prod->getNomeProduto());
        $sql->bindValue(':qtd', $prod->getQuantidade());
        $sql->bindValue(':valor', $prod->getValor());
        $sql->bindValue(':desc', $prod->getDescricao());
        $sql->execute();
        return true;
    }

    public function delete($id) {
        $sql = $this->pdo->prepare("DELETE FROM produtos WHERE id_produto = :id");
        $sql->bindValue(':id', $id);
        $sql->execute();
    }
}