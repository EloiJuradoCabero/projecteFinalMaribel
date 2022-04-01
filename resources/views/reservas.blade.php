@extends('layouts.nav')
@section('content')
<div class="container">
    <div class="mt-3 d-flex flex-row justify-content-between">
        <h3 class="">Les Meves Reservas</h3>
        <a href='../controllers/nouSorteigController.php' class='btn btn-success'>Nou Sorteig</a>
    </div>

    <div class="row mt-3">
        <table class="table table-striped table-hover col-11 mx-auto my-5">
            <thead>
            <tr>
                <th>Nom</th>
                <th>Dia</th>
                <th>Hora</th>
                <th>Païs</th>
                <th>Esta Confirmada?</th>
            </tr>
            </thead>
            <tbody>
            @foreach(session()->get('reservas') as $reserva)

                <tr>
                    <td>{{ $reserva->id_joc}}</td>
                    <td>{{ $reserva->day }}</td>
                    <td>{{ $reserva->hour}}</td>
                    <td>{{ $reserva->pais }}</td>
                    <td>{{ $reserva->isConfirmed }}</td>

                </tr>
            @endforeach

            </tbody>
        </table>
    </div>

    </div>



@endsection
