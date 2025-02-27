@extends('loginsuccess')
@section('content')
<main class="login-form"> 
    <div class="cotainer"> 
        <div class="row justify-content-center"> 
            <div class="col-md-4"> 
                <div class="card"> 
                    <h3 class="card-header text-center">Buscar producto</h3> 
                    <div class="card-body"> 
                        <form method="POST" action="{{ route('Search.producto') }}"> 

                            @csrf 
                            <div class="form-group mb-3"> 
                                <input type="text" placeholder="Nombre" id="name" class="form-control" name="name" required autofocus> 
                                @if ($errors->has('name')) 
                                <span class="text-danger">{{ $errors->first('name') }}
                                </span> 
                                @endif 
                            </div> 

                                <div class="d-grid mx-auto"> 
                                        <button type="submit" class="btn btn-dark btn-block">Enviar</button> 
                            </div> 
                        </form> 
                        <table class="table test">
                        <thead>
                            <td>ID</td>
                            <td>Nombre</td>
                            <td>Cantidad</td>
                            <td>Categoria</td>
                            <td>Precio</td>
                        </thead>
                        @if(!empty($producto))
                            @foreach ($producto as $productos)
                                <tr>
                                    <td>{{$productos->ID_PRODUCTO}}</td>
                                    <td>{{$productos->VCH_NOMBRE_PRODUCTO}}</td>
                                    <td>{{$productos->INT_CANTIDAD_PRODUCTO}}</td>
                                    <td>{{$productos->VCH_CATEGORIA_PRODUCTO}}</td>
                                    <td>{{$productos->INT_PRECIO_PRODUCTO}}</td>
                                    <td>
                                        <a href="{{route('producto.edit',$productos->ID_PRODUCTO)}}"
                                            class="btn btn-warning">Editar</a>
                                            <a href="{{route('producto.show',$productos->ID_PRODUCTO)}}"
                                                class="btn btn-danger">Borrar</a>
                                    </td>
                                    
                                </tr>
                            @endforeach
                            @else
                            <thead><td>Productos no encontrados</td></thead>
                            @endif
                        </table>
                    </div> 
                 </div> 
            </div> 
        </div> 
    </div> 
</main> 
@endsection