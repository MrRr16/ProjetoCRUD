<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Página 2 - Administração</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <div class="container my-5">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2>Página 2: Painel de Administração (Update & Delete)</h2>
            <a href="index.php?pagina=catalogo" class="btn btn-secondary">&larr; Voltar ao Catálogo (Página 1)</a>
        </div>

        <div class="row">
            <div class="col-md-4">
                <div class="card shadow-sm">
                    <div class="card-header bg-warning text-dark"><h5 class="mb-0">Editar Livro</h5></div>
                    <div class="card-body">
                        <?php if (isset($livroEditar) && $livroEditar): ?>
                            <form action="index.php?acao=atualizar&id=<?= $livroEditar['id'] ?>" method="POST">
                                <div class="mb-3"><label>Título</label><input type="text" name="titulo" class="form-control" value="<?= htmlspecialchars($livroEditar['titulo']) ?>" required></div>
                                <div class="mb-3"><label>Autor</label><input type="text" name="autor" class="form-control" value="<?= htmlspecialchars($livroEditar['autor']) ?>" required></div>
                                <div class="mb-3"><label>Preço (R$)</label><input type="number" step="0.01" name="preco" class="form-control" value="<?= $livroEditar['preco'] ?>" required></div>
                                <div class="mb-3"><label>Estoque</label><input type="number" name="estoque" class="form-control" value="<?= $livroEditar['estoque'] ?>" required></div>
                                <button type="submit" class="btn btn-warning w-100">Salvar Alterações</button>
                                <a href="index.php?pagina=admin" class="btn btn-link w-100 mt-2">Cancelar</a>
                            </form>
                        <?php else: ?>
                            <p class="text-muted">Selecione um livro da lista para editar os seus dados.</p>
                        <?php endif; ?>
                    </div>
                </div>
            </div>

            <div class="col-md-8">
                <div class="card shadow-sm">
                    <div class="card-header bg-dark text-white"><h5 class="mb-0">Gerenciamento de Registros</h5></div>
                    <div class="card-body">
                        <table class="table table-striped align-middle">
                            <thead><tr><th>ID</th><th>Título</th><th>Preço</th><th>Ações</th></tr></thead>
                            <tbody>
                                <?php foreach($livros as $livro): ?>
                                <tr>
                                    <td><?= $livro['id'] ?></td>
                                    <td><?= htmlspecialchars($livro['titulo']) ?></td>
                                    <td>R$ <?= number_format($livro['preco'], 2, ',', '.') ?></td>
                                    <td>
                                        <a href="index.php?pagina=admin&id=<?= $livro['id'] ?>" class="btn btn-sm btn-outline-warning">Editar</a>
                                        <a href="index.php?acao=excluir&id=<?= $livro['id'] ?>" class="btn btn-sm btn-outline-danger" onclick="return confirm('Tem certeza que deseja deletar este livro?')">Deletar</a>
                                    </td>
                                </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>