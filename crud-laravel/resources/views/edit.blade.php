<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit {{$auto->marca}}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    @vite(['../css/app.css', '../js/app.js'])
</head>
<body>
    <h1>Modifica l'auto {{$auto->marca}}</h1>

    <form action="{{route('update', $auto->id)}}" method="POST">
        @csrf
        @method('PUT')
        <label for="marca">Marca</label>
        <input type="text" value="{{$auto->marca}}" name="marca" class="form-control">
        @error('marca')
        <div class="alert alert-warning">{{$message}}</div>
        @enderror

        <label for="modello">Modello</label>
        <input type="text" value="{{$auto->modello}}" name="modello" class="form-control">
        @error('modello')
        <div class="alert alert-warning">{{$message}}</div>
        @enderror

        <label for="prezzo">Prezzo</label>
        <input type="number" value="{{$auto->prezzo}}" name="prezzo" class="form-control">
        @error('prezzo')
        <div class="alert alert-warning">{{$message}}</div>
        @enderror

        <button class="btn btn-primary">Salva</button>
    </form>
    <a href="{{route('home')}}" class="btn btn-primary">Torna alla Home</a>
</html>
