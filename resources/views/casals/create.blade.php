@extends('layout.app')

@section('title', ' - Afegir Casal')

@section('content')

<div class="row mb-5">
    <h1>Afegir Casal</h1>
    <hr>
</div>

<div class="row">
    <form action="{{route('casal.store')}}" method="POST" class="w-75 mb-5">
    @csrf
        <div class="form-group mb-2">
            <label for="nom">Nom</label>
            <input type="text" name="nom" id="nom" class="form-control" required>
        </div>

        <div class="d-flex gap-4 mb-2">
            <div class="form-group w-100">
                <label for="data_inici">Data Inici</label>
                <input type="date" name="data_inici" id="data_inici" class="form-control" required>
            </div>

            <div class="form-group w-100">
                <label for="data_final">Data Final</label>
                <input type="date" name="data_final" id="data_final" class="form-control" required>
            </div>
        </div>

        <div class="d-flex gap-5 mb-4">
            <div class="form-group">
                <label for="n_places">Num Places</label>
                <input type="number" name="n_places" id="n_places" class="form-control" required>
            </div>

            <div class="form-group w-100">
                <label for="ciutat">Ciutat</label>
                <select name="ciutat" id="ciutat" class="form-select" required>
                    @foreach($ciutats as $ciutat)
                        <option value="{{$ciutat->id}}">{{$ciutat->nom}}</option>
                    @endforeach
                </select>
            </div>
        </div>
        
        <div class="form-group">
            <button class="btn btn-primary" type="submit">Afegir Casal</button>
        </div>
        
    </form>
    
    
    <a href="{{route('casal.index')}}" class="mt-5 link-secondary">Tornar als Casals</a>
</div>

@endsection