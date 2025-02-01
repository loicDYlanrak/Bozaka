<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Depenses</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.css">
    <script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body>
    <div class="container">
        <h1>Depenses</h1>
        <form action="/depenses/add" method="post">
            <div class="mb-3">
                <label for="date" class="form-label">Date</label>
                <input type="date" class="form-control" id="date" name="date">
            </div>
            <div class="mb-3">
                <label for="categorieDepenseId" class="form-label">CategorieDepenseId</label>
                <input type="number" class="form-control" id="categorieDepenseId" name="categorieDepenseId">
            </div>
            <div class="mb-3">
                <label for="montant" class="form-label">Montant</label>
                <input type="number" class="form-control" id="montant" name="montant">
            </div>
            <button type="submit" class="btn btn-primary">Ajouter</button>
        </form>
        <h2>Filtres avancés</h2>
        <form method="POST" action="/depenses/filter">
            <div class="mb-3">
                <label for="filter_date" class="form-label">Date</label>
                <input type="date" class="form-control" id="filter_date" name="date">
            </div>
            <div class="mb-3">
                <label for="filter_categorieDepenseId" class="form-label">CategorieDepenseId</label>
                <input type="number" class="form-control" id="filter_categorieDepenseId" name="categorieDepenseId">
            </div>
            <div class="mb-3">
                <label for="filter_montant" class="form-label">Montant</label>
                <input type="number" class="form-control" id="filter_montant" name="montant">
            </div>
            <button type="submit" class="btn btn-secondary">Rechercher</button>
        </form>
        <h2>Tableau des Depenses</h2>
        <table id="dataTable" class="display">
            <thead>
                <tr>
                    <th>Date</th>
                    <th>CategorieDepenseId</th>
                    <th>Montant</th>
                    <th>Id</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($depenses as $depense): ?>
                    <tr>
                        <td><?= $depense['date'] ?></td>
                        <td><?= $depense['categorieDepenseId'] ?></td>
                        <td><?= $depense['montant'] ?></td>
                        <td><?= $depense['id'] ?></td>
                        <td>
                            <a href="/depenses/edit/<?= $depense['id'] ?>" class="btn btn-warning">Modifier</a>
                            <a href="/depenses/delete/<?= $depense['id'] ?>" class="btn btn-danger">Supprimer</a>
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
