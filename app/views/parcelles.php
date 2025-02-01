<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Parcelles</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.css">
    <script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body>
    <div class="container">
        <h1>Parcelles</h1>
        <form action="/parcelles/add" method="post">
            <div class="mb-3">
                <label for="numero" class="form-label">Numero</label>
                <input type="text" class="form-control" id="numero" name="numero">
            </div>
            <div class="mb-3">
                <label for="surface" class="form-label">Surface</label>
                <input type="number" class="form-control" id="surface" name="surface">
            </div>
            <div class="mb-3">
                <label for="varieteTheId" class="form-label">VarieteTheId</label>
                <input type="number" class="form-control" id="varieteTheId" name="varieteTheId">
            </div>
            <button type="submit" class="btn btn-primary">Ajouter</button>
        </form>
        <h2>Filtres avancés</h2>
        <form method="POST" action="/parcelles/filter">
            <div class="mb-3">
                <label for="filter_numero" class="form-label">Numero</label>
                <input type="text" class="form-control" id="filter_numero" name="numero">
            </div>
            <div class="mb-3">
                <label for="filter_surface" class="form-label">Surface</label>
                <input type="number" class="form-control" id="filter_surface" name="surface">
            </div>
            <div class="mb-3">
                <label for="filter_varieteTheId" class="form-label">VarieteTheId</label>
                <input type="number" class="form-control" id="filter_varieteTheId" name="varieteTheId">
            </div>
            <button type="submit" class="btn btn-secondary">Rechercher</button>
        </form>
        <h2>Tableau des Parcelles</h2>
        <table id="dataTable" class="display">
            <thead>
                <tr>
                    <th>Numero</th>
                    <th>Surface</th>
                    <th>Id</th>
                    <th>VarieteTheId</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($parcelles as $parcelle): ?>
                    <tr>
                        <td><?= $parcelle['numero'] ?></td>
                        <td><?= $parcelle['surface'] ?></td>
                        <td><?= $parcelle['id'] ?></td>
                        <td><?= $parcelle['varieteTheId'] ?></td>
                        <td>
                            <a href="/parcelles/edit/<?= $parcelle['id'] ?>" class="btn btn-warning">Modifier</a>
                            <a href="/parcelles/delete/<?= $parcelle['id'] ?>" class="btn btn-danger">Supprimer</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <script>
            $(document).ready(function() {
                $('#dataTable').DataTable();
            });
        </script>
    </div>
</body>
</html>
