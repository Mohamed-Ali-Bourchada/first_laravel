<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    
    <!-- Correcting the stylesheet link using asset() -->
    <!-- <link rel="stylesheet" href="{{ asset('../css/app.css') }}"> -->
     <style>
        /* Global Styles */
body {
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 0;
    background-color: #f4f4f4;
    color: #333;
}

a {
    text-decoration: none;
    color: #333;
}

ul {
    list-style: none;
    padding: 0;
}

/* Header */
header {
    background-color: #333;
    color: white;
    padding: 20px;
    display: flex;
    justify-content: space-between;
    align-items: center;
}

header .logo h1 {
    margin: 0;
}

nav ul {
    display: flex;
}

nav ul li {
    margin-left: 20px;
}

nav ul li a {
    color: white;
    font-weight: bold;
}

/* Hero Section */
.hero {
    background-color: #5cb85c;
    color: white;
    padding: 100px 20px;
    text-align: center;
}

.hero h2 {
    font-size: 2.5em;
}

.hero p {
    font-size: 1.2em;
}

.cta-button {
    background-color: #333;
    color: white;
    padding: 10px 20px;
    border-radius: 5px;
    margin-top: 20px;
    display: inline-block;
}

/* Content Section */
.content {
    padding: 40px 20px;
    text-align: center;
}

.content h3 {
    font-size: 2em;
}

.content p {
    max-width: 600px;
    margin: 0 auto;
}

/* Footer */
footer {
    background-color: #333;
    color: white;
    text-align: center;
    padding: 20px;
    margin-top:100px
}
     </style>
</head>
<body>

    <header>
        @yield('header')
    </header>
    <main>
        @yield('content')
    </main>

    <footer>
        @yield('footer')
    </footer>

</body>
</html>
