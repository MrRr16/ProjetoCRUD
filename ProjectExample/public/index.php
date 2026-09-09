<?php

require_once __DIR__ . '/../config/conexao.php';
require_once __DIR__ . '/../app/Controllers/LivroController.php';

$controller = new LivroController();
$acao = $_GET['acao'] ?? null;
$pagina = $_GET['pagina'] ?? 'catalogo';
$id = $_GET['id'] ?? null;

switch ($acao) {
    case 'cadastrar':
        $controller->cadastrar($pdo);
        break;
    case 'atualizar':
        $controller->atualizar($pdo, $id);
        break;
    case 'excluir':
        $controller->excluir($pdo, $id);
        break;
    default:
        if ($pagina === 'admin') {
            $controller->admin($pdo, $id);
        } else {
            $controller->catalogo($pdo);
        }
        break;
}