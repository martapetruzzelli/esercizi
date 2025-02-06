@extends('layouts.layout')

@section('title', 'Pizze')

@section('content')

<h1>Lista Pizze</h1>

    @foreach($pizzas as $pizza)
        <div>
            <h3>Pizza {{$pizza['flavor']}}</h3>
            <p>Description: {{$pizza['description']}}</p>
            <p>Price: {{$pizza['price']}}€</p>
        </div>
    @endforeach

@endsection
