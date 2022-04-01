@extends('layouts.nav')
@section('content')

<div class="container">

    <div class="mt-3 d-flex flex-row justify-content-between">
        <h3 class="">Usuaris</h3>
        <a href='../controllers/nouSorteigController.php' class='btn btn-success'>Nou Sorteig</a>
    </div>

    <div class="row mt-3">
        <table class="table table-striped table-hover col-11 mx-auto my-5">
            <thead>
            <tr>
                <th>Id</th>
                <th>Name</th>
                <th>Email</th>
                <th>Password</th>
                <th>IsAdmin</th>
            </tr>
            </thead>
            <tbody>
            @foreach(session()->get('users') as $user)
                <tr>
                    <td>{{ $user['id'] }}</td>
                    <td>{{ $user['name'] }}</td>
                    <td>{{ $user['email'] }}</td>
                    <td>{{ $user['password'] }}</td>
                    <td>{{ $user['isAdmin'] }}</td>

                </tr>
            @endforeach

            </tbody>
        </table>
    </div>

</div>
@endsection
