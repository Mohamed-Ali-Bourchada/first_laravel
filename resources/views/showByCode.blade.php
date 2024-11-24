<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Epreuves for Matiere: {{ $codemat }}</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"> <!-- Bootstrap CSS -->
</head>
<body>

<div class="container mt-5">
    <h1 class="text-center">Epreuves for Matiere Code: {{ $codemat }}</h1>

    @if($epreuves->isEmpty())
        <div class="alert alert-warning mt-4">No epreuves found for this matiere.</div>
    @else
        <table class="table table-striped mt-4">
            <thead>
                <tr>
                    <th>Num Epreuve</th>
                    <th>Date</th>
                    <th>Lieu</th>
                </tr>
            </thead>
            <tbody>
                @foreach($epreuves as $epreuve)
                    <tr>
                        <td>{{ $epreuve->numero }}</td>
                        <td>{{ $epreuve->date }}</td>
                        <td>{{ $epreuve->lieu }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif

    <div class="text-center mt-4">
        <a href="{{ route('matiere.index') }}" class="btn btn-primary">Back to Matieres</a>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
