@extends('layouts/template')

@section('titulo', 'Actualizar categoria')

@section('contenido')

<main>
    <div class="container py-4">
        <h2>Actualizar categoria</h2>
        <br>

        <form action="{{ url('categorias/'.$categoria->id) }}" enctype="multipart/form-data" method="POST">
            @method('PUT')
            @csrf

            <div class="mb-3 row">
                <label for="nombre" class="col-sm-2 col-form-label">Nombre de la categoria</label>
                <div class="col-sm-5">
                    <input type="text" class="form-control" id="nombre" name="nombre" value="{{ $categoria->nombre }}" required>
                </div> 
            </div>

            <button type="submit" class="btn btn-success"><strong>Guardar Categoria</strong></button>
            <a href="{{ url('categorias') }}" class="btn btn-secondary"><strong>Regresar</strong></a>

        </form>

    </div>
</main>