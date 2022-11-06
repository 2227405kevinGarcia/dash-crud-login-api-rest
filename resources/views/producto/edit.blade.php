@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Editar Producto</h1>
@stop

@section('content')


<form action="/productos/{{$producto->id}}" method="POST">

    @csrf
    @method('PUT')

    <div class="mb-3">
        <label for="nombre" class="form-label">Nombre</label>
        <input id="nombre" name="nombre" type="text" class="form-control" value="{{$producto->nombre}}">
    </div>
    <div class="mb-3">
        <label for="caracteristica" class="form-label">Característica</label>
        <input id="caracteristica" name="caracteristica" type="text" class="form-control" value="{{$producto->característica}}">
    </div>
    <div class="mb-3">
        <label for="genero" class="form-label">Género</label>
            <select class="form-control" name="genero" value="{{$producto->genero}}">
                <option value="Hombre" selected>Hombre</option>
                <option value="Mujer">Mujer</option>   
            </select>
    </div>
    <div class="mb-3">
        <label for="stock" class="form-label">Stock</label>
        <input id="stock" name="stock" type="text" class="form-control" value="{{$producto->stock}}">
    </div>
    <div class="mb-3">
        <label for="precio" class="form-label">Precio</label>
        <input id="precio" name="precio" type="number" step="any" class="form-control" value="{{$producto->precio}}">    
    </div>
    <div class="mb-3">
        <label for="imagen" class="form-label">Imagen</label>
        <input id="imagen" name="imagen" type="file" class="form-control" value="{{$producto->imagen}}">
    </div>
    <div class="mb-3">
        <label for="categoria_id" class="form-label">Categoría</label>
        <select class="form-control @error('categoria_id') is-invalid @enderror" name="categoria_id">
                    @foreach ($categorias as $item)
                    @if($item->id == $producto->categoria_id)
                    <option value="{{$item->id}}" selected> {{$item}}</option>
                    @else
                    <option value="{{$item->id}}"> {{$item}}</option>
                    @endif
                    @endforeach
                </select> 
    </div>

    <a href="/productos" class="btn btn-secundary">Cancelar</a>
    <button type="submit" class="btn btn-primary">Guardar</button>
    </form>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
@stop