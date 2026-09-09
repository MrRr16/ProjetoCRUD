<?php

class LivroModel {
    private $db;

    public function __construct($conexao) {
        $this->db = $conexao;
    }

    public function buscarTodos() {
        $sql = "SELECT * FROM livros";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function buscarPorId($id) {
        $sql = "SELECT * FROM livros WHERE id = :id";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([':id' => $id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function criar($dados) {
        $sql = "INSERT INTO livros (titulo, autor, preco, estoque) VALUES (:titulo, :autor, :preco, :estoque)";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([
            ':titulo'  => $dados['titulo'],
            ':autor'   => $dados['autor'],
            ':preco'   => $dados['preco'],
            ':estoque' => $dados['estoque']
        ]);
        return $this->db->lastInsertId();
    }

    public function atualizar($id, $dados) {
        $sql = "UPDATE livros SET titulo = :titulo, autor = :autor, preco = :preco, estoque = :estoque WHERE id = :id";
        $stmt = $this->db->prepare($sql);
        return $stmt->execute([
            ':id'      => $id,
            ':titulo'  => $dados['titulo'],
            ':autor'   => $dados['autor'],
            ':preco'   => $dados['preco'],
            ':estoque' => $dados['estoque']
        ]);
    }

    public function excluir($id) {
        $sql = "DELETE FROM livros WHERE id = :id";
        $stmt = $this->db->prepare($sql);
        return $stmt->execute([':id' => $id]);
    }
}