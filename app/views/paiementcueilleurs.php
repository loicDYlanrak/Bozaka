<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Paiementcueilleurs</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.css">
    <script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body>
    <div class="container">
        <h1>Paiementcueilleurs</h1>
        <form action="/paiementcueilleurs/add" method="post">
            <div class="mb-3">
                <label for="date" class="form-label">Date</label>
                <input type="date" class="form-control" id="date" name="date">
            </div>
            <div class="mb-3">
                <label for="poidsTotal" class="form-label">PoidsTotal</label>
                <input type="number" class="form-control" id="poidsTotal" name="poidsTotal">
            </div>
            <div class="mb-3">
                <label for="bonus" class="form-label">Bonus</label>
                <input type="number" class="form-control" id="bonus" name="bonus">
            </div>
            <div class="mb-3">
                <label for="cueilleurId" class="form-label">CueilleurId</label>
                <input type="number" class="form-control" id="cueilleurId" name="cueilleurId">
            </div>
            <div class="mb-3">
                <label for="malus" class="form-label">Malus</label>
                <input type="number" class="form-control" id="malus" name="malus">
            </div>
            <div class="mb-3">
                <label for="montantPaiement" class="form-label">MontantPaiement</label>
                <input type="number" class="form-control" id="montantPaiement" name="montantPaiement">
            </div>
            <button type="submit" class="btn btn-primary">Ajouter</button>
        </form>
        <h2>Filtres avancés</h2>
        <form method="POST" action="/paiementcueilleurs/filter">
            <div class="mb-3">
                <label for="filter_date" class="form-label">Date</label>
                <input type="date" class="form-control" id="filter_date" name="date">
            </div>
            <div class="mb-3">
                <label for="filter_poidsTotal" class="form-label">PoidsTotal</label>
                <input type="number" class="form-control" id="filter_poidsTotal" name="poidsTotal">
            </div>
            <div class="mb-3">
                <label for="filter_bonus" class="form-label">Bonus</label>
                <input type="number" class="form-control" id="filter_bonus" name="bonus">
            </div>
            <div class="mb-3">
                <label for="filter_cueilleurId" class="form-label">CueilleurId</label>
                <input type="number" class="form-control" id="filter_cueilleurId" name="cueilleurId">
            </div>
            <div class="mb-3">
                <label for="filter_malus" class="form-label">Malus</label>
                <input type="number" class="form-control" id="filter_malus" name="malus">
            </div>
            <div class="mb-3">
                <label for="filter_montantPaiement" class="form-label">MontantPaiement</label>
                <input type="number" class="form-control" id="filter_montantPaiement" name="montantPaiement">
            </div>
            <button type="submit" class="btn btn-secondary">Rechercher</button>
        </form>
        <h2>Tableau des Paiementcueilleurs</h2>
        <table id="dataTable" class="display">
            <thead>
                <tr>
                    <th>Date</th>
                    <th>PoidsTotal</th>
                    <th>Bonus</th>
                    <th>CueilleurId</th>
                    <th>Id</th>
                    <th>Malus</th>
                    <th>MontantPaiement</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($paiementcueilleurs as $paiementcueilleur): ?>
                    <tr>
                        <td><?= $paiementcueilleur['date'] ?></td>
                        <td><?= $paiementcueilleur['poidsTotal'] ?></td>
                        <td><?= $paiementcueilleur['bonus'] ?></td>
                        <td><?= $paiementcueilleur['cueilleurId'] ?></td>
                        <td><?= $paiementcueilleur['id'] ?></td>
                        <td><?= $paiementcueilleur['malus'] ?></td>
                        <td><?= $paiementcueilleur['montantPaiement'] ?></td>
                        <td>
                            <a href="/paiementcueilleurs/edit/<?= $paiementcueilleur['id'] ?>" class="btn btn-warning">Modifier</a>
                            <a href="/paiementcueilleurs/delete/<?= $paiementcueilleur['id'] ?>" class="btn btn-danger">Supprimer</a>
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
