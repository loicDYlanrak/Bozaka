<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Categoriedepenses</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.css">
    <script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body>
    <div class="container">
        <h1>Categoriedepenses</h1>
        <form action="/categoriedepenses/add" method="post">
            <div class="mb-3">
                <label for="nom" class="form-label">Nom</label>
                <input type="text" class="form-control" id="nom" name="nom">
            </div>
            <button type="submit" class="btn btn-primary">Ajouter</button>
        </form>
        <h2>Filtres avancés</h2>
        <form method="POST" action="/categoriedepenses/filter">
            <div class="mb-3">
                <label for="filter_nom" class="form-label">Nom</label>
                <input type="text" class="form-control" id="filter_nom" name="nom">
            </div>
            <button type="submit" class="btn btn-secondary">Rechercher</button>
        </form>
        <h2>Tableau des Categoriedepenses</h2>
        <table id="dataTable" class="display">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Nom</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($categoriedepenses as $categoriedepense): ?>
                    <tr>
                        <td><?= $categoriedepense['id'] ?></td>
                        <td><?= $categoriedepense['nom'] ?></td>
                        <td>
                            <a href="/categoriedepenses/edit/<?= $categoriedepense['id'] ?>" class="btn btn-warning">Modifier</a>
                            <a href="/categoriedepenses/delete/<?= $categoriedepense['id'] ?>" class="btn btn-danger">Supprimer</a>
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
