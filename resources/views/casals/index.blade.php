@extends('layout.app')

@section('title', ' - Casals')

@section('content')

<div class="row mb-5">
    <h1 class="text-center">Casals d'Estiu</h1>
    <a href="{{route('casal.create')}}" class="btn btn-primary w-25 mx-auto">Afegir</a>
</div>

<div class="row">
    <table class="table table-dark">
        <thead>
            <tr>
                <th scope="col">Nom</th>
                <th scope="col">Data de inici</th>
                <th scope="col">Data final</th>
                <th scope="col">Plaçes</th>
                <th scope="col">Ciutat</th>
                <th scope="col">Accions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($casals as $casal)
            <tr>
                <th scope="row">{{$casal->nom}}</th>
                <td>{{$casal->data_inici}}</td>
                <td>{{$casal->data_final}}</td>
                <td>{{$casal->n_places}}</td>
                <td>{{$casal->nomCiutat}}</td>
                <td>
                    <div class="d-flex gap-3">

                        <a href="{{route('casal.edit', ['id' => $casal->id])}}" 
                        class="btn btn-warning" type="submit">Editar</a>

                        <form action="{{route('casal.destroy', ['id' => $casal->id])}}"
                        method="POST">
                        @csrf
                            <button class="btn btn-danger" type="submit">Eliminar</button>
                        </form>
                    </div>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

@endsection