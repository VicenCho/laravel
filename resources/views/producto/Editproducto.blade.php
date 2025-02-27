@extends('loginsuccess')
@section('content')
<main class="signup-form">
    <div class="cotainer">
        <div class="row justify-content-center">
            <div class="col-md-4">
                <div class="card">
                    <h3 class="card-header text-center">Editar Producto</h3>
                    <div class="card-body">
                        <form action="{{route('producto.update',$producto->ID_PRODUCTO)}}" method="POST">
                            @csrf
                            <div class="form-group mb-3">
                                <input type="text" placeholder="ID" id="ID_PRODUCTO" class="form-control" name="ID_PRODUCTO"
                                value="{{$producto->ID_PRODUCTO}}"
                                    required autofocus readonly>
                            </div>
                            <div class="form-group mb-3">
                                <input type="text" placeholder="Nombre" id="VCH_NOMBRE_PRODUCTO" class="form-control" name="VCH_NOMBRE_PRODUCTO"
                                value="{{$producto->VCH_NOMBRE_PRODUCTO}}"
                                    required autofocus>
                            </div>
                            <div class="form-group mb-3">
                                <input type="text" placeholder="Cantidad producto" id="INT_CANTIDAD_PRODUCTO" class="form-control"
                                value="{{$producto->INT_CANTIDAD_PRODUCTO}}"
                                    name="INT_CANTIDAD_PRODUCTO" required autofocus>
                            </div>
                            <div class="form-group mb-3">
                                <input type="text" placeholder="Categoria Producto" id="VCH_CATEGORIA_PRODUCTO" class="form-control"
                                value="{{$producto->VCH_CATEGORIA_PRODUCTO}}"
                                    name="VCH_CATEGORIA_PRODUCTO" required autofocus>
                            </div>
                            <div class="form-group mb-3">
                                <input type="text" placeholder="Precio producto" id="INT_PRECIO_PRODUCTO" class="form-control"
                                value="{{$producto->INT_PRECIO_PRODUCTO}}"
                                    name="INT_PRECIO_PRODUCTO" required autofocus>
                            </div>
                            
                            <div class="d-grid mx-auto">
                                <button type="submit" class="btn btn-dark btn-block">Editar</button>
                            </div>
                            {{csrf_field()}}
                            {{method_field('PUT')}}
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection