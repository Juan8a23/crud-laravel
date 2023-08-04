@extends('layouts/template')

@section('titulo', 'Editar producto')

@section('contenido')

<main>
    <div class="container py-4">
        <h2>Editar producto</h2>
        <br>

        <form action="{{ url('productos/'.$producto->id) }}" enctype="multipart/form-data" method="POST">
            @method('PUT')
            @csrf

            <div class="mb-3 row">
                <label for="categoria_id" class="col-sm-2 col-form-label">Categoria</label>
                <div class="col-sm-5">
                    <select name="categoria_id" id="categoria_id" required>
                        <option value="">Seleccione una categoria</option>
                        @foreach ($categorias as $categoria)
                            <option value="{{ $categoria->id }}" @if($categoria->id == $producto->categoria_id) {{'selected'}} @endif>{{ $categoria->nombre }}</option>
                        @endforeach
                    </select>
                </div> 
            </div>

            <div class="mb-3 row">
                <label for="nombre" class="col-sm-2 col-form-label">Nombre</label>
                <div class="col-sm-5">
                    <input type="text" class="form-control" id="nombre" name="nombre" value="{{ $producto->nombre }}" required>
                </div> 
            </div>

            <div class="mb-3 row">
                <label for="precio" class="col-sm-2 col-form-label">Precio</label>
                <div class="col-sm-5">
                    <input type="number" class="form-control" id="precio" name="precio" value="{{ $producto->precio }}" required>
                </div>
            </div>

            <div class="mb-3 row">
                <label for="imagen" class="col-sm-2 col-form-label">Imagen</label>
                <div class="col-sm-5">
                    <input type="file" class="form-control" id="imagen" name="imagen" value="{{ old('imagen') }}" required>
                </div>
            </div>

            <button type="submit" class="btn btn-success"><strong>Guardar Producto</strong></button>
            <a href="{{ url('productos') }}" class="btn btn-secondary"><strong>Regresar</strong></a>

        </form>

    </div>
</main>