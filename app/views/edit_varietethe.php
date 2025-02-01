<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier Varietethe</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.css">
    <script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body>
    <div class="container">
        <h1>Modifier Varietethe</h1>
        <form action="/varietethes/update/<?= $varietethe['id'] ?>" method="post">
            <div class="mb-3">
                <label for="img" class="form-label">Img</label>
                <input type="text" class="form-control" id="img" name="img" value="<?= $varietethe['img'] ?>">
            </div>
            <div class="mb-3">
                <label for="occupation" class="form-label">Occupation</label>
                <input type="number" class="form-control" id="occupation" name="occupation" value="<?= $varietethe['occupation'] ?>">
            </div>
            <div class="mb-3">
                <label for="prixVente" class="form-label">PrixVente</label>
                <input type="number" class="form-control" id="prixVente" name="prixVente" value="<?= $varietethe['prixVente'] ?>">
            </div>
            <div class="mb-3">
                <label for="nom" class="form-label">Nom</label>
                <input type="text" class="form-control" id="nom" name="nom" value="<?= $varietethe['nom'] ?>">
            </div>
            <div class="mb-3">
                <label for="rendement" class="form-label">Rendement</label>
                <input type="number" class="form-control" id="rendement" name="rendement" value="<?= $varietethe['rendement'] ?>">
            </div>
            <button type="submit" class="btn btn-primary">Mettre à jour</button>
        </form>
    </div>
</body>
</html>
