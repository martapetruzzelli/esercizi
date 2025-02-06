<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    @vite(['../css/app.css', '../js/app.js'])
</head>
<body>

    <h1>Lista Auto</h1>

    @if(session('success'))
        <div class="alert alert-success">{{session('success')}}</div>
    @endif

    <a href="{{route('create')}}" class="btn btn-primary">Crea</a>

    <form action="{{route('home')}}">
        <label for="cerca">Cerca</label>
        <select name="marca" id="">
            @foreach($marche as $marca)
            <option value="{{$marca}}">{{$marca}}</option>
            @endforeach
        </select>
        <button class="btn btn-info">Cerca</button>
    </form>
        <a href="{{route('home')}}" class="btn btn-info">Elimina Filtri</a>
        <a href="{{route('home', ['marca'=> 'fiat'])}}" class="btn btn-info">Fiat</a>

    <table class="table">
        <thead>
            <tr>
                <th>#</th>
                <th>Marca</th>
                <th>Modello</th>
                <th>Prezzo</th>
                <th>Azioni</th>
            </tr>
        </thead>

        <tbody>
            @forelse ($autos as $auto)
            <tr>
                <td>{{$auto->id}}</td>
                <td>{{$auto->marca}}</td>
                <td>{{$auto->modello}}</td>
                <td>{{$auto->prezzo}}</td>
                <td>
                    <a href="{{route('detail', $auto->id)}}" class="btn btn-info">Info</a>
                    <a href="{{route('edit', $auto->id)}}" class="btn btn-warning">Modifica</a>
                    <form action="{{route('destroy', $auto->id)}}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger">Elimina</button>
                    </form>
                </td>
            </tr>
            @empty
            <tr>
                <td>Non ci sono auto</td>
            </tr>
            @endforelse
        </tbody>
    </table>


</body>
</html>
