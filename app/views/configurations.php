<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Configurations</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.css">
    <script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body>
    <div class="container">
        <h1>Configurations</h1>
        <form action="/configurations/add" method="post">
            <div class="mb-3">
                <label for="poidsMinimalJournalier" class="form-label">PoidsMinimalJournalier</label>
                <input type="number" class="form-control" id="poidsMinimalJournalier" name="poidsMinimalJournalier">
            </div>
            <div class="mb-3">
                <label for="bonus" class="form-label">Bonus</label>
                <input type="number" class="form-control" id="bonus" name="bonus">
            </div>
            <div class="mb-3">
                <label for="malus" class="form-label">Malus</label>
                <input type="number" class="form-control" id="malus" name="malus">
            </div>
            <button type="submit" class="btn btn-primary">Ajouter</button>
        </form>
        <h2>Filtres avancés</h2>
        <form method="POST" action="/configurations/filter">
            <div class="mb-3">
                <label for="filter_poidsMinimalJournalier" class="form-label">PoidsMinimalJournalier</label>
                <input type="number" class="form-control" id="filter_poidsMinimalJournalier" name="poidsMinimalJournalier">
            </div>
            <div class="mb-3">
                <label for="filter_bonus" class="form-label">Bonus</label>
                <input type="number" class="form-control" id="filter_bonus" name="bonus">
            </div>
            <div class="mb-3">
                <label for="filter_malus" class="form-label">Malus</label>
                <input type="number" class="form-control" id="filter_malus" name="malus">
            </div>
            <button type="submit" class="btn btn-secondary">Rechercher</button>
        </form>
        <h2>Tableau des Configurations</h2>
        <table id="dataTable" class="display">
            <thead>
                <tr>
                    <th>PoidsMinimalJournalier</th>
                    <th>Bonus</th>
                    <th>Id</th>
                    <th>Malus</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($configurations as $configuration): ?>
                    <tr>
                        <td><?= $configuration['poidsMinimalJournalier'] ?></td>
                        <td><?= $configuration['bonus'] ?></td>
                        <td><?= $configuration['id'] ?></td>
                        <td><?= $configuration['malus'] ?></td>
                        <td>
                            <a href="/configurations/edit/<?= $configuration['id'] ?>" class="btn btn-warning">Modifier</a>
                            <a href="/configurations/delete/<?= $configuration['id'] ?>" class="btn btn-danger">Supprimer</a>
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
