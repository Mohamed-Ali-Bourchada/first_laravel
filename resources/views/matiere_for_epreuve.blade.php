
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Matiere for Epreuve</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"> <!-- Bootstrap CSS -->
</head>
<body>

<div class="container mt-5">
    <h1 class="text-center">Matiere for Epreuve</h1>

    <div class="mt-4">
        @if($libelle)
            <div class="alert alert-success">
                <strong>{{ $message }}</strong>
                <p>Libelle: {{ $libelle }}</p>
            </div>
        @else
            <div class="alert alert-danger">
                <strong>{{ $message }}</strong>
                <p>Epreuve Number: {{ $epreuve_number }}</p>
            </div>
        @endif
    </div>

    <div class="text-center mt-4">
        <a href="{{ route('matiere.index') }}" class="btn btn-primary">Back to Matieres</a>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
