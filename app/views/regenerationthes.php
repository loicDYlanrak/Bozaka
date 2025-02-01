<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Regenerationthes</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.css">
    <script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body>
    <div class="container">
        <h1>Regenerationthes</h1>
        <form action="/regenerationthes/add" method="post">
            <div class="mb-3">
                <label for="mois" class="form-label">Mois</label>
                <input type="number" class="form-control" id="mois" name="mois">
            </div>
            <button type="submit" class="btn btn-primary">Ajouter</button>
        </form>
        <h2>Filtres avancés</h2>
        <form method="POST" action="/regenerationthes/filter">
            <div class="mb-3">
                <label for="filter_mois" class="form-label">Mois</label>
                <input type="number" class="form-control" id="filter_mois" name="mois">
            </div>
            <button type="submit" class="btn btn-secondary">Rechercher</button>
        </form>
        <h2>Tableau des Regenerationthes</h2>
        <table id="dataTable" class="display">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Mois</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($regenerationthes as $regenerationthe): ?>
                    <tr>
                        <td><?= $regenerationthe['id'] ?></td>
                        <td><?= $regenerationthe['mois'] ?></td>
                        <td>
                            <a href="/regenerationthes/edit/<?= $regenerationthe['id'] ?>" class="btn btn-warning">Modifier</a>
                            <a href="/regenerationthes/delete/<?= $regenerationthe['id'] ?>" class="btn btn-danger">Supprimer</a>
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
