<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier Parcelle</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.css">
    <script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body>
    <div class="container">
        <h1>Modifier Parcelle</h1>
        <form action="/parcelles/update/<?= $parcelle['id'] ?>" method="post">
            <div class="mb-3">
                <label for="numero" class="form-label">Numero</label>
                <input type="text" class="form-control" id="numero" name="numero" value="<?= $parcelle['numero'] ?>">
            </div>
            <div class="mb-3">
                <label for="surface" class="form-label">Surface</label>
                <input type="number" class="form-control" id="surface" name="surface" value="<?= $parcelle['surface'] ?>">
            </div>
            <div class="mb-3">
                <label for="varieteTheId" class="form-label">VarieteTheId</label>
                <input type="number" class="form-control" id="varieteTheId" name="varieteTheId" value="<?= $parcelle['varieteTheId'] ?>">
            </div>
            <button type="submit" class="btn btn-primary">Mettre à jour</button>
        </form>
    </div>
</body>
</html>
