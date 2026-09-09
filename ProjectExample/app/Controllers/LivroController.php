<?php

require_once __DIR__ . '/../Models/LivroModel.php';

class LivroController {

public function catalogo($pdo) {
        $model = new LivroModel($pdo);
        $livros = $model->buscarTodos();
        require_once __DIR__ . '/../views/catalogo.php';
    }

    public function admin($pdo, $id = null) {
        $model = new LivroModel($pdo);
        $livros = $model->buscarTodos();
        $livroEditar = $id ? $model->buscarPorId($id) : null;
        require_once __DIR__ . '/../views/admin.php';
    }
    
    public function cadastrar($pdo) {
        $model = new LivroModel($pdo);
        $model->criar($_POST);
        header("Location: index.php");
        exit;
    }

    public function atualizar($pdo, $id) {
        $model = new LivroModel($pdo);
        $model->atualizar($id, $_POST);
        header("Location: index.php");
        exit;
    }

    public function excluir($pdo, $id) {
        $model = new LivroModel($pdo);
        $model->excluir($id);
        header("Location: index.php");
        exit;
    }
}