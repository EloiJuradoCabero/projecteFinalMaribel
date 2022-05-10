<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>Escape Room</title>
</head>

<header>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <div class="topLeft">
                <a class="navbar-brand" href="#">
                    <img src="icons/luck.svg" alt="" width="24" height="24" class="d-inline-block align-text-top">
                    Loteries Cirvianum
                </a>
            </div>
            <div class="topRight">
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                        data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false"
                        aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                    <div class="navbar-nav">
                        @if(isset(request()->user()->isAdmin))
                            <a class="nav-link active" aria-current="page" href="/home">Jocs</a>
                        @else
                            <a class="nav-link active" aria-current="page" href="/home">Inici</a>
                            <a class="nav-link active" aria-current="page" href="/modificarDades">Dades</a>
                        @endif

                        @if(isset(request()->user()->isAdmin))
                            <a class='nav-link' href='../users'>Users</a>

                        @endif
                        @if(isset(request()->user()->isAdmin))
                                <a class='nav-link' href='../empleats'>Empleats</a>
                                <a class='nav-link' href='../salas'>Salas</a>

                        @endif
                        <a class='nav-link' href='../reservas'>Reserves</a>
                        <a class='nav-link' href='../valoracions'>Valoracions</a>

                        <a class='nav-link' href='/logout'>LogOut</a>

                        <span class='navbar-text'></span>
                    </div>
                </div>
            </div>
        </div>
    </nav>
</header>
<body>
<div id="app">
    @yield('content')
</div>
<script src="/js/app.js"></script>


<!-- Optional JavaScript; choose one of the two! -->

<!-- Option 1: Bootstrap Bundle with Popper -->


<!-- Option 2: Separate Popper and Bootstrap JS -->
<!--
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
-->
</body>
</html>
