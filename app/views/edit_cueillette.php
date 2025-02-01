<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier Cueillette</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.css">
    <script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body>
    <div class="container">
        <h1>Modifier Cueillette</h1>
        <form action="/cueillettes/update/<?= $cueillette['id'] ?>" method="post">
            <div class="mb-3">
                <label for="date" class="form-label">Date</label>
                <input type="date" class="form-control" id="date" name="date" value="<?= $cueillette['date'] ?>">
            </div>
            <div class="mb-3">
                <label for="parcelleId" class="form-label">ParcelleId</label>
                <input type="number" class="form-control" id="parcelleId" name="parcelleId" value="<?= $cueillette['parcelleId'] ?>">
            </div>
            <div class="mb-3">
                <label for="poids" class="form-label">Poids</label>
                <input type="number" class="form-control" id="poids" name="poids" value="<?= $cueillette['poids'] ?>">
            </div>
            <div class="mb-3">
                <label for="cueilleurId" class="form-label">CueilleurId</label>
                <input type="number" class="form-control" id="cueilleurId" name="cueilleurId" value="<?= $cueillette['cueilleurId'] ?>">
            </div>
            <button type="submit" class="btn btn-primary">Mettre à jour</button>
        </form>
    </div>
</body>
</html>
