
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Matiere Details</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

</head>
<body>
    <div class="container mt-3">
    <h1 class="text-center mb-4">Matiere Details</h1>

    <table class="table">
        <tr>
            <th>ID</th>
            <td>{{ $matiere->id }}</td>
        </tr>
        <tr>
            <th>Code</th>
            <td>{{ $matiere->code }}</td>
        </tr>
        <tr>
            <th>Libelle</th>
            <td>{{ $matiere->libelle }}</td>
        </tr>
        <tr>
            <th>Coefficient</th>
            <td>{{ $matiere->coef }}</td>
        </tr>
          <tr>
            <th>Created_at</th>
            <td>{{ $matiere->created_at }}</td>
        </tr>
          <tr>
            <th>Updated_at</th>
            <td>{{ $matiere->updated_at }}</td>
        </tr>
    </table>

    <div class="text-center mt-3">
        <a href="{{ route('matiere.index') }}" class="btn btn-secondary">Back to List</a>
    </div>
</div>

</body>
</html>