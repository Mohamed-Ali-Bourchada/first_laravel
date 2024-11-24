<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Epreuve</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

</head>
<body>

<div class="container mt-3">
    <h1 class="text-center mb-4">Edit Epreuve</h1>

    <!-- Form for Editing Epreuve -->
    <form action="{{ route('epreuve.update', $epreuve->id) }}" method="POST">
        @csrf
        @method('PUT')
        
        <div class="mb-3">
            <label for="numero" class="form-label">Numero</label>
            <input type="text" class="form-control @error('numero') is-invalid @enderror" id="numero" name="numero" value="{{ old('numero', $epreuve->numero) }}" required>
            @error('numero')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="date" class="form-label">Date</label>
            <input type="date" class="form-control @error('date') is-invalid @enderror" id="date" name="date" value="{{ old('date', $epreuve->date) }}" required>
            @error('date')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="lieu" class="form-label">Lieu</label>
            <input type="text" class="form-control @error('lieu') is-invalid @enderror" id="lieu" name="lieu" value="{{ old('lieu', $epreuve->lieu) }}" required>
            @error('lieu')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="matiere_id" class="form-label">Matiere</label>
            <select class="form-control @error('matiere_id') is-invalid @enderror" id="matiere_id" name="matiere_id" required>
                <option value="">Select Matiere</option>
                @foreach($matieres as $matiere)
                    <option value="{{ $matiere->id }}" {{ old('matiere_id', $epreuve->matiere_id) == $matiere->id ? 'selected' : '' }}>
                        {{ $matiere->libelle }} ({{ $matiere->code }})
                    </option>
                @endforeach
            </select>
            @error('matiere_id')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-success">Update Epreuve</button>
        <a href="{{ route('epreuve.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
</div>

</body>
</html>