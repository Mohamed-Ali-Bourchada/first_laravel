<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Matiere Not Found</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}"> <!-- Include your CSS file if needed -->
</head>
<body>
    <div class="container">
        <h1>Matiere Not Found</h1>
        <p>The requested matiere could not be found. Please check the code and try again.</p>
        <a href="{{ route('matiere.index') }}">Back to Matieres</a>
    </div>
</body>
</html>
