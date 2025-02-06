<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Details{{$auto->marca}}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    @vite(['../css/app.css', '../js/app.js'])
</head>
<body>
    <h1>Dettagli Automobile</h1>
    <h2>Modello: {{$auto->modello}}</h2>
    <h3>Prezzo: {{$auto->prezzo}}</h3>
    <a href="{{route('home')}}" class="btn btn-primary">Torna alla Home</a>
</body>
</html>
