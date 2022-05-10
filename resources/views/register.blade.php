<?php session_start(); ?>
    <!DOCTYPE html>
<html lang="es">
<head>
    <title>Microsistems</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="/css/login.css">
    <script ></script>
</head>
<body class="my-login-page">
<section class="h-100">
    <div class="container h-100">
        <div class="row justify-content-md-center h-100">
            <div class="card-wrapper">
                <div class="brand">
                    <img src="/img/logo.jpeg" alt="logo">
                </div>
                <div class="card fat">

                    <div class="card-body">
                        @if(session()->get('err_credentials') !== null)
                            @php session()->forget('err_credentials') @endphp
                            <div class="alert alert-danger" role="alert">
                                Credencials incorrectes!
                            </div>
                        @endif
                        @if(session()->get('not_logged') !== null)
                            @php session()->forget('not_logged') @endphp
                            <div class="alert alert-danger" role="alert">
                                No estas loggejat!!
                            </div>
                        @endif
                        <h4 class="card-title">Register</h4>
                        <form method="POST" action="/store" class="my-login-validation" novalidate="">
                            @csrf
                            <div class="form-group">
                                <label for="name">Nom</label>
                                <input id="name" type="name" class="form-control" name="name" value="" required autofocus>
                            </div>
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input id="email" type="email" class="form-control" name="email" value="" required autofocus>
                                <div class="invalid-feedback">
                                    Email is invalid
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="password">Constrasenya
                                </label>
                                <input id="password" type="password" class="form-control" name="password" required data-eye>
                                <div class="invalid-feedback">
                                    Password is required
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="telefon">Telefon</label>
                                <input id="telefon" type="telefon" minlength="9" maxlength="9"class="form-control" name="telefon" value="" required autofocus>
                            </div>

                            <div class="form-group">
                                <label for="dni">Dni</label>
                                <input id="dni" type="dni" minlength="9" maxlength="9" class="form-control" name="dni" value="" required autofocus>
                            </div>

                            <div class="form-group">
                                <div class="custom-checkbox custom-control">
                                    <input type="checkbox" name="remember" id="remember" class="custom-control-input">
                                    <label for="remember" class="custom-control-label">Recorda</label>
                                </div>
                            </div>

                            <div class="form-group m-0">
                                <button type="submit" class="btn btn-primary btn-block">
                                    Register
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<script src="/js/login.js"></script>
</body>
</html>
