@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Lista de Productos</h1>
@stop

@section('content')
<a href="productos/create" class="btn btn-primary mb-3">Crear Producto</a>

<table id="productos" class="table table-striped table-bordered shadow-lg mt-4" style="width:100%">
    <thead class="bg-primary text-white">
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Nombre</th>
            <th scope="col">Característica</th>
            <th scope="col">Género</th>
            <th scope="col">Stock</th>
            <th scope="col">Precio</th>
            <th scope="col">Imagen</th>
            <th scope="col">Categoría</th>
            <th scope="col">Acciones</th>
        </tr>
    </thead>
    <tbody>
            @foreach ($productos as $producto)
            <tr>
                <td>{{$producto->id}}</td>
                <td>{{$producto->nombre}}</td>
                <td>{{$producto->caracteristica}}</td>
                <td>{{$producto->genero}}</td>
                <td>{{$producto->stock}}</td>
                <td>{{$producto->precio}}</td>
                <td><img src="/img/{{$producto->imagen}}" width="100"></td>
                <td>{{$producto->categoria}}</td>
                <td>
                <form action="{{ route('productos.destroy',$producto->id) }}" method="POST">
                    <a href="/productos/{{$producto->id}}/edit" class="btn btn-info">Editar</a>
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>  
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.2.0/css/bootstrap.min.css">
    <link href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap5.min.css">
@stop

@section('js')

    <script src="https://code.jquery.com/jquery-3.5.1.js"></script> 
    <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script> 
    <script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap5.min.js"></script> 

    <script> $(document).ready(function () {
    $('#productos').DataTable({
            "lengthMenu": [[5, 10 , 50, -1],[5, 10, 50, "All"]]
    });

});
    </script>

@stop