@extends('index')
@section('content')
    <main class="login-form">
        <div class="cotainer">
            <div class="row justify-content-center">
                <div class="col-md-4">
                    <div class="card">
                        <h3 class="card-header text-center">Insertar producto</h3>
                        <div class="card-body">
                            @if (isset($mensaje))
                                <div class="alert alert-success">
                                    {{ $mensaje }}
                                </div>
                            @endif
                            <form method="POST" action="{{ route('insert.producto') }}">

                                @csrf
                                <div class="form-group mb-3">
                                    <input type="text" placeholder="Nombre" id="name" class="form-control"
                                        name="name" required autofocus>
                                    @if ($errors->has('name'))
                                        <span class="text-danger">{{ $errors->first('name') }}
                                        </span>
                                    @endif
                                </div>

                                <div class="form-group mb-3">
                                    <input type="number" placeholder="Cantidad de producto" id="CantPro"
                                        class="form-control" name="CantPro" required autofocus>
                                    @if ($errors->has('CantPro'))
                                        <span class="text-danger">{{ $errors->first('CantPro') }}
                                        </span>
                                    @endif
                                </div>

                                <div class="form-group mb-3">
                                    <input type="text" placeholder="Categoria de producto" id="CatePro"
                                        class="form-control" name="CatePro" required autofocus>
                                    @if ($errors->has('CatePro'))
                                        <span class="text-danger">{{ $errors->first('CatePro') }}
                                        </span>
                                    @endif
                                </div>

                                <div class="form-group mb-3">
                                    <input type="number" placeholder="Precio del producto" id="PrecPro"
                                        class="form-control" name="PrecPro" required autofocus>
                                    @if ($errors->has('PrecPro'))
                                        <span class="text-danger">{{ $errors->first('PrecPro') }}
                                        </span>
                                    @endif
                                </div>
                                <div class="d-grid mx-auto">
                                    <button type="submit" class="btn btn-dark btn-block">Enviar</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
