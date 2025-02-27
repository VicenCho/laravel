@extends('index')
@section('content')
<main class="login-form">
    <div class="container">
        <div class="row vh-100 align-items-center">
            <!-- Columna del mensaje de bienvenida -->
            <div class="col-md-6 text-center text-white">
                <h1 class="display-3 font-weight-bold">Bienvenido</h1>
            </div>

            <!-- Columna del formulario de login -->
            <div class="col-md-6">
                <div class="card">
                    <h3 class="card-header text-center">Login</h3>
                    <div class="card-body">
                        <form method="POST" action="{{ route('custom.login') }}">
                            @csrf
                            <div class="form-group mb-3">
                                <input type="text" placeholder="Email" id="email" class="form-control" name="email" required autofocus>
                                @if ($errors->has('email'))
                                    <span class="text-danger">{{ $errors->first('email') }}</span>
                                @endif
                            </div>
                            <div class="form-group mb-3">
                                <input type="password" placeholder="Password" id="password" class="form-control" name="password" required>
                                @if ($errors->has('password'))
                                    <span class="text-danger">{{ $errors->first('password') }}</span>
                                @endif
                            </div>
                            <div class="form-group d-flex justify-content-between align-items-center">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="remember"> Remember Me
                                    </label>
                                </div>
                                <a href="{{ route('register-user') }}">¿No tienes cuenta? ¡Registrate!</a>
                            </div>
                            <div class="d-grid mx-auto">
                                <button type="submit" class="btn btn-dark btn-block">Sign in</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection
