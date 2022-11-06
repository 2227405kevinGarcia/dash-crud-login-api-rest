@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Crear Producto</h1>
@stop

@section('content')

<form action="/productos" method="POST">
    @csrf
    <div class="mb-3">
        <label for="nombre" class="form-label">Nombre</label>
        <input id="nombre" name="nombre" type="text" class="form-control" >
    </div>

    <div class="mb-3">
        <label for="caracteristica" class="form-label">Característica</label>
        <input id="caracteristica" name="caracteristica" type="text" class="form-control" >
    </div>

    <div class="mb-3">
        <label for="" class="form-label">Género</label>
            <select class="form-control" name="genero" id="genero">
                    <option value="Hombre">Hombre</option>
                    <option value="Mujer">Mujer</option>
            </select>
    </div>

    <div class="mb-3">
        <label for="stock" class="form-label">Stock</label>
        <input id="stock" name="stock" type="text" class="form-control" >
    </div>

    <div class="mb-3">
        <label for="precio" class="form-label">Precio</label>
        <input id="precio" name="precio" type="number" step="any" value="0.00" class="form-control" tabindex="3">
    </div>

    <div class="mb-3">
        <label for="imagen" class="form-label">Imagen</label>
        <input id="imagen" name="imagen" type="file" class="form-control" >
    </div>

    <div class="mb-3">
        <label for="categoria_id" class="form-label">Categoría</label>
            <select class="form-control" name="categoria_id" id="categoria_id">
                    @foreach ($categorias as $item)
                    <option value="{{$item->id}}"> {{$item}}</option>
                    @endforeach
                </select>
    </div>

    <a href="/productos" class="btn btn-secundary" >Cancelar</a>
    <button type="submit" class="btn btn-primary" >Guardar</button>
</form>


@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
@stop