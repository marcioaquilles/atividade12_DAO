<?php

class Produto
{
    private $id_produto;
    private $nome_produto;
    private $quantidade;
    private $valor;
    private $descricao;

    /**
     * @return mixed
     */
    public function getIdProduto()
    {
        return $this->id_produto;
    }

    /**
     * @param mixed $id_produto
     */
    public function setIdProduto($id_produto): void
    {
        $this->id_produto = trim($id_produto);
    }

    /**
     * @return mixed
     */
    public function getNomeProduto()
    {
        return $this->nome_produto;
    }

    /**
     * @param mixed $nome_produto
     */
    public function setNomeProduto($nome_produto): void
    {
        $this->nome_produto = ucwords(trim($nome_produto));
    }

    /**
     * @return mixed
     */
    public function getQuantidade()
    {
        return $this->quantidade;
    }

    /**
     * @param mixed $quantidade
     */
    public function setQuantidade($quantidade): void
    {
        $this->quantidade = trim($quantidade);
    }

    /**
     * @return mixed
     */
    public function getValor()
    {
        return $this->valor;
    }

    /**
     * @param mixed $valor
     */
    public function setValor($valor): void
    {
        $this->valor = trim($valor);
    }

    /**
     * @return mixed
     */
    public function getDescricao()
    {
        return $this->descricao;
    }

    /**
     * @param mixed $descricao
     */
    public function setDescricao($descricao): void
    {
        $this->descricao = ucwords(trim($descricao));
    }
}