<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cueillettes</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.css">
    <script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body>
    <div class="container">
        <h1>Cueillettes</h1>
        <form action="/cueillettes/add" method="post">
            <div class="mb-3">
                <label for="date" class="form-label">Date</label>
                <input type="date" class="form-control" id="date" name="date">
            </div>
            <div class="mb-3">
                <label for="parcelleId" class="form-label">ParcelleId</label>
                <input type="number" class="form-control" id="parcelleId" name="parcelleId">
            </div>
            <div class="mb-3">
                <label for="poids" class="form-label">Poids</label>
                <input type="number" class="form-control" id="poids" name="poids">
            </div>
            <div class="mb-3">
                <label for="cueilleurId" class="form-label">CueilleurId</label>
                <input type="number" class="form-control" id="cueilleurId" name="cueilleurId">
            </div>
            <button type="submit" class="btn btn-primary">Ajouter</button>
        </form>
        <h2>Filtres avancés</h2>
        <form method="POST" action="/cueillettes/filter">
            <div class="mb-3">
                <label for="filter_date" class="form-label">Date</label>
                <input type="date" class="form-control" id="filter_date" name="date">
            </div>
            <div class="mb-3">
                <label for="filter_parcelleId" class="form-label">ParcelleId</label>
                <input type="number" class="form-control" id="filter_parcelleId" name="parcelleId">
            </div>
            <div class="mb-3">
                <label for="filter_poids" class="form-label">Poids</label>
                <input type="number" class="form-control" id="filter_poids" name="poids">
            </div>
            <div class="mb-3">
                <label for="filter_cueilleurId" class="form-label">CueilleurId</label>
                <input type="number" class="form-control" id="filter_cueilleurId" name="cueilleurId">
            </div>
            <button type="submit" class="btn btn-secondary">Rechercher</button>
        </form>
        <h2>Tableau des Cueillettes</h2>
        <table id="dataTable" class="display">
            <thead>
                <tr>
                    <th>Date</th>
                    <th>ParcelleId</th>
                    <th>Poids</th>
                    <th>CueilleurId</th>
                    <th>Id</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($cueillettes as $cueillette): ?>
                    <tr>
                        <td><?= $cueillette['date'] ?></td>
                        <td><?= $cueillette['parcelleId'] ?></td>
                        <td><?= $cueillette['poids'] ?></td>
                        <td><?= $cueillette['cueilleurId'] ?></td>
                        <td><?= $cueillette['id'] ?></td>
                        <td>
                            <a href="/cueillettes/edit/<?= $cueillette['id'] ?>" class="btn btn-warning">Modifier</a>
                            <a href="/cueillettes/delete/<?= $cueillette['id'] ?>" class="btn btn-danger">Supprimer</a>
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
