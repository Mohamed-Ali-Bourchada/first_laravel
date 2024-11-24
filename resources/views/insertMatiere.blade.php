<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insert Matiere</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

    
</head>
<body>
    <div class="container mt-5">
    <div class="d-flex align-items-center mb-4">
        <!-- Back Arrow -->
       <a href="{{ url('matiere') }}" class="btn btn-outline-primary d-flex align-items-center">
    <i class="fas fa-arrow-left mr-2"></i> Back
</a>

        <h1 class="text-center mx-auto">Matieres</h1>
    </div>

    @if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
    @endif

    <!-- Form for inserting a new matiere -->
    <div class="card shadow">
        <div class="card-header bg-primary text-white">
            <h5 class="mb-0">Ajouter une Matiere</h5>
        </div>
        <div class="card-body">
            <form action="{{ route('matiere.store') }}" method="post">
                @csrf
                <div class="form-row">
                    <div class="form-group col-md-4">
                        <label for="code">Code</label>
                        <input type="text" class="form-control @error('code') is-invalid @enderror" id="code" name="code" value="{{ old('code') }}" required>
                        @error('code')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group col-md-4">
                        <label for="libelle">Libelle</label>
                        <input type="text" class="form-control @error('libelle') is-invalid @enderror" id="libelle" name="libelle" value="{{ old('libelle') }}" required>
                        @error('libelle')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group col-md-4">
                        <label for="coef">Coefficient</label>
                        <input type="number" class="form-control @error('coef') is-invalid @enderror" id="coef" name="coef" value="{{ old('coef') }}" required min="1" step="0.1">
                        @error('coef')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <button type="submit" class="btn btn-primary btn-block">Ajouter Matiere</button>
            </form>
        </div>
    </div>
</div>


</body>
</html>
