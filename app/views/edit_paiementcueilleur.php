<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier Paiementcueilleur</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.css">
    <script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body>
    <div class="container">
        <h1>Modifier Paiementcueilleur</h1>
        <form action="/paiementcueilleurs/update/<?= $paiementcueilleur['id'] ?>" method="post">
            <div class="mb-3">
                <label for="date" class="form-label">Date</label>
                <input type="date" class="form-control" id="date" name="date" value="<?= $paiementcueilleur['date'] ?>">
            </div>
            <div class="mb-3">
                <label for="poidsTotal" class="form-label">PoidsTotal</label>
                <input type="number" class="form-control" id="poidsTotal" name="poidsTotal" value="<?= $paiementcueilleur['poidsTotal'] ?>">
            </div>
            <div class="mb-3">
                <label for="bonus" class="form-label">Bonus</label>
                <input type="number" class="form-control" id="bonus" name="bonus" value="<?= $paiementcueilleur['bonus'] ?>">
            </div>
            <div class="mb-3">
                <label for="cueilleurId" class="form-label">CueilleurId</label>
                <input type="number" class="form-control" id="cueilleurId" name="cueilleurId" value="<?= $paiementcueilleur['cueilleurId'] ?>">
            </div>
            <div class="mb-3">
                <label for="malus" class="form-label">Malus</label>
                <input type="number" class="form-control" id="malus" name="malus" value="<?= $paiementcueilleur['malus'] ?>">
            </div>
            <div class="mb-3">
                <label for="montantPaiement" class="form-label">MontantPaiement</label>
                <input type="number" class="form-control" id="montantPaiement" name="montantPaiement" value="<?= $paiementcueilleur['montantPaiement'] ?>">
            </div>
            <button type="submit" class="btn btn-primary">Mettre à jour</button>
        </form>
    </div>
</body>
</html>
