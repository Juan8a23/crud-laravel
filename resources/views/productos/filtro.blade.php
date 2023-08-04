@extends('layouts/template')

@section('titulo', 'Productos Filtrados')

@section('contenido')

<main>

    @if(session()->has('message'))
        <div class="alert alert-success">
            {{ session()->get('message') }}
        </div>
    @endif

    <div class="container py-4">
        <h2>Listado de productos filtrados</h2>
        <br>

        <a href="{{ url('productos/create') }}" class="btn btn-primary"><strong>Agregar nuevo producto</strong></a>
        <br><br>
        <a href="{{ url('categorias') }}" class="btn btn-warning"><strong>Categorias</strong></a>
        <br><br>
        <form action="productos/show">

            <label for="filtrar">Filtrar por: </label>
            <select name="id_categoria" id="id_categoria">
                @foreach ($categorias as $categoria)
                    <option value="{{ $categoria->id }}">{{ $categoria->id }} - {{ $categoria->nombre }}</option>
                @endforeach
                    <option value="todos">Todos</option>
            </select>
            <button type="submit" class="btn btn-primary">Filtrar</button>
        </form>

            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>Categoria</th>
                        <th>Código</th>
                        <th>Nombre</th>
                        <th>Precio</th>
                        <th>Imagen</th>
                        <th>Opciones</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($productos as $producto)
                        <tr>
                            <td>{{ $producto->categoria_id }}</td>
                            <td>{{ $producto->id }}</td>
                            <td>{{ $producto->nombre }}</td>
                            <td>{{ $producto->precio }}</td>
                            <td><img src="{{ asset('storage').'/'.$producto->imagen }}" alt="" width="200"></td>
                            <td>
                                <a class="btn btn-warning" href="{{url('productos/'.$producto->id.'/edit')}}">Editar</a>
                                <form action="{{url('productos/'.$producto->id)}}" method="POST">
                                    @method('DELETE')
                                    @csrf
                                    <button type="submit" class="btn btn-danger"><strong>Eliminar</strong></button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>

            </table>
    </div>
</main>