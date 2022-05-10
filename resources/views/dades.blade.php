@extends('layouts.nav')
@section('content')
    <div class="mx-auto p-4" style="width: 30%">
        <form action="/modifyUser/{{\request()->user()->id}}" method="post">
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">Nom</label>
                <input type="name" name="name" value="{{request()->user()->name}}" class="form-control" id="nom" required>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Contrasenya</label>
                <input type="password" name="password" minlength="8" maxlength="15" class="form-control" id="password" required>
            </div>
            <div class="mb-3">
                <label for="telefon" class="form-label">Telefon</label>
                <input type="telefon" name="telefon" value="{{request()->user()->telefon}}" class="form-control" id="telefon" required>
            </div>
            <button type="submit" class="btn btn-warning">Modificar</button>
        </form>
    </div>
@endsection
