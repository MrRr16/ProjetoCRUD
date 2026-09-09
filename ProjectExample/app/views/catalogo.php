<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Página 1 - Catálogo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <div class="container my-5">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2>Página 1: Catálogo e Inventário (Create & Read)</h2>
            <a href="index.php?pagina=admin" class="btn btn-secondary">Ir para Administração (Página 2) &rarr;</a>
        </div>

        <div class="row">
            <div class="col-md-4">
                <div class="card shadow-sm">
                    <div class="card-header bg-primary text-white"><h5 class="mb-0">Adicionar Livro</h5></div>
                    <div class="card-body">
                        <form action="index.php?acao=cadastrar" method="POST">
                            <div class="mb-3"><label>Título</label><input type="text" name="titulo" class="form-control" required></div>
                            <div class="mb-3"><label>Autor</label><input type="text" name="autor" class="form-control" required></div>
                            <div class="mb-3"><label>Preço (R$)</label><input type="number" step="0.01" name="preco" class="form-control" required></div>
                            <div class="mb-3"><label>Estoque</label><input type="number" name="estoque" class="form-control" required></div>
                            <button type="submit" class="btn btn-primary w-100">Salvar Livro</button>
                        </form>
                    </div>
                </div>
            </div>

            <div class="col-md-8">
                <div class="card shadow-sm">
                    <div class="card-header bg-dark text-white"><h5 class="mb-0">Livros Disponíveis</h5></div>
                    <div class="card-body">
                        <table class="table table-striped align-middle">
                            <thead><tr><th>ID</th><th>Título</th><th>Autor</th><th>Preço</th><th>Estoque</th></tr></thead>
                            <tbody>
                                <?php foreach($livros as $livro): ?>
                                <tr>
                                    <td><?= $livro['id'] ?></td>
                                    <td><?= htmlspecialchars($livro['titulo']) ?></td>
                                    <td><?= htmlspecialchars($livro['autor']) ?></td>
                                    <td>R$ <?= number_format($livro['preco'], 2, ',', '.') ?></td>
                                    <td><span class="badge bg-info text-dark"><?= $livro['estoque'] ?></span></td>
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