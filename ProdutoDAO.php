<?php

interface ProdutoDAO
{
    public function add(Produto $prod);
    public function findAll();
    public function findByID($id);
    public function findByNome($nome);
    public function update(Produto $prod);
    public function delete($id);
}