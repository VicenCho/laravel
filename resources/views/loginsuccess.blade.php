<!DOCTYPE html>
<html>

<head>
    <title>Login Success</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>

<body>
    <nav class="navbar navbar-light navbar-expand-lg mb-5" style="background-color: #e3f2fd;">
        <div class="container">
            <a class="navbar-brand mr-auto" href="{{ route('loginsuccess') }}">PositronX</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav me-auto">
                    @guest
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">Login</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register-user') }}">Register</a>
                        </li>
                    @else
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('insertandoproducto') }}">Producto</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('buscandoproducto') }}">Buscar producto</a>
                        </li>
                    @endguest
                </ul>
                @auth
                    <ul class="navbar-nav">
                        <li class="nav-item d-flex align-items-center">
                            <span class="nav-link text-dark fw-bold">{{ Auth::user()->name }}</span>
                        </li>
                        <li class="nav-item d-flex align-items-center">
                            <span class="nav-link text-muted">{{ Auth::user()->email }}</span>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('logout') }}">singout</a>
                        </li>
                    </ul>
                @endauth
            </div>
        </div>
    </nav>
    @guest
        <div class="container justify-content-center">
            <h1>"No estas logeado"</h1>
        </div>
    @endguest

    @auth
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-4">
                    <div class="card text-center">
                        <div class="card-body">
                            <h5 class="card-title">Crear Producto</h5>
                            <p class="card-text">¡Crea un nuevo producto!</p>
                            <a href="{{ route('insertandoproducto') }}" class="btn btn-primary">Crear</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card text-center">
                        <div class="card-body">
                            <h5 class="card-title">Buscar Producto</h5>
                            <p class="card-text">¡Busca un producto!</p>
                            <a href="{{ route('buscandoproducto') }}" class="btn btn-success">Buscar</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endauth
    @yield('content')
</body>

</html>
