<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Matiere</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>

<div class="container mt-3">
    <h1 class="text-center mb-4">Edit Matiere</h1>

    <form action="{{ route('matiere.update', $matiere->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="code" class="form-label">Code</label>
            <input type="text" name="code" id="code" class="form-control @error('code') is-invalid @enderror" 
                   value="{{ old('code', $matiere->code) }}" required>
            @error('code')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="libelle" class="form-label">Libelle</label>
            <input type="text" name="libelle" id="libelle" class="form-control @error('libelle') is-invalid @enderror" 
                   value="{{ old('libelle', $matiere->libelle) }}" required>
            @error('libelle')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="coef" class="form-label">Coefficient</label>
            <input type="number" name="coef" id="coef" class="form-control @error('coef') is-invalid @enderror" 
                   value="{{ old('coef', $matiere->coef) }}" required>
            @error('coef')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-success">Update Matiere</button>
        <a href="{{ route('matiere.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
</div>


</body>
</html>
