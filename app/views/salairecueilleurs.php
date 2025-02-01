<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Salairecueilleurs</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.css">
    <script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body>
    <div class="container">
        <h1>Salairecueilleurs</h1>
        <form action="/salairecueilleurs/add" method="post">
            <div class="mb-3">
                <label for="montantParKg" class="form-label">MontantParKg</label>
                <input type="number" class="form-control" id="montantParKg" name="montantParKg">
            </div>
            <button type="submit" class="btn btn-primary">Ajouter</button>
        </form>
        <h2>Filtres avancés</h2>
        <form method="POST" action="/salairecueilleurs/filter">
            <div class="mb-3">
                <label for="filter_montantParKg" class="form-label">MontantParKg</label>
                <input type="number" class="form-control" id="filter_montantParKg" name="montantParKg">
            </div>
            <button type="submit" class="btn btn-secondary">Rechercher</button>
        </form>
        <h2>Tableau des Salairecueilleurs</h2>
        <table id="dataTable" class="display">
            <thead>
                <tr>
                    <th>MontantParKg</th>
                    <th>Id</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($salairecueilleurs as $salairecueilleur): ?>
                    <tr>
                        <td><?= $salairecueilleur['montantParKg'] ?></td>
                        <td><?= $salairecueilleur['id'] ?></td>
                        <td>
                            <a href="/salairecueilleurs/edit/<?= $salairecueilleur['id'] ?>" class="btn btn-warning">Modifier</a>
                            <a href="/salairecueilleurs/delete/<?= $salairecueilleur['id'] ?>" class="btn btn-danger">Supprimer</a>
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
