<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Varietethes</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.css">
    <script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body>
    <div class="container">
        <h1>Varietethes</h1>
        <form action="/varietethes/add" method="post">
            <div class="mb-3">
                <label for="img" class="form-label">Img</label>
                <input type="text" class="form-control" id="img" name="img">
            </div>
            <div class="mb-3">
                <label for="occupation" class="form-label">Occupation</label>
                <input type="number" class="form-control" id="occupation" name="occupation">
            </div>
            <div class="mb-3">
                <label for="prixVente" class="form-label">PrixVente</label>
                <input type="number" class="form-control" id="prixVente" name="prixVente">
            </div>
            <div class="mb-3">
                <label for="nom" class="form-label">Nom</label>
                <input type="text" class="form-control" id="nom" name="nom">
            </div>
            <div class="mb-3">
                <label for="rendement" class="form-label">Rendement</label>
                <input type="number" class="form-control" id="rendement" name="rendement">
            </div>
            <button type="submit" class="btn btn-primary">Ajouter</button>
        </form>
        <h2>Filtres avancés</h2>
        <form method="POST" action="/varietethes/filter">
            <div class="mb-3">
                <label for="filter_img" class="form-label">Img</label>
                <input type="text" class="form-control" id="filter_img" name="img">
            </div>
            <div class="mb-3">
                <label for="filter_occupation" class="form-label">Occupation</label>
                <input type="number" class="form-control" id="filter_occupation" name="occupation">
            </div>
            <div class="mb-3">
                <label for="filter_prixVente" class="form-label">PrixVente</label>
                <input type="number" class="form-control" id="filter_prixVente" name="prixVente">
            </div>
            <div class="mb-3">
                <label for="filter_nom" class="form-label">Nom</label>
                <input type="text" class="form-control" id="filter_nom" name="nom">
            </div>
            <div class="mb-3">
                <label for="filter_rendement" class="form-label">Rendement</label>
                <input type="number" class="form-control" id="filter_rendement" name="rendement">
            </div>
            <button type="submit" class="btn btn-secondary">Rechercher</button>
        </form>
        <h2>Tableau des Varietethes</h2>
        <table id="dataTable" class="display">
            <thead>
                <tr>
                    <th>Img</th>
                    <th>Occupation</th>
                    <th>PrixVente</th>
                    <th>Id</th>
                    <th>Nom</th>
                    <th>Rendement</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($varietethes as $varietethe): ?>
                    <tr>
                        <td><?= $varietethe['img'] ?></td>
                        <td><?= $varietethe['occupation'] ?></td>
                        <td><?= $varietethe['prixVente'] ?></td>
                        <td><?= $varietethe['id'] ?></td>
                        <td><?= $varietethe['nom'] ?></td>
                        <td><?= $varietethe['rendement'] ?></td>
                        <td>
                            <a href="/varietethes/edit/<?= $varietethe['id'] ?>" class="btn btn-warning">Modifier</a>
                            <a href="/varietethes/delete/<?= $varietethe['id'] ?>" class="btn btn-danger">Supprimer</a>
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
