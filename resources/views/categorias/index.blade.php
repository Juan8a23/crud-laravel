@extends('layouts/template')

@section('titulo', 'Categorias Actuales')

@section('contenido')

<main>

    @if (session()->has('message'))
        
        <div class="alert alert-success">
            {{ session()->get('message') }}
        </div>
        
    @endif

    <div class="container py-4">
        <h2>Categorias</h2>
        <br>
        <a href="{{ url('categorias/create') }}" class="btn btn-primary"><strong>Agregar nueva categoria</strong></a>
        <br><br>
        <a href="{{ url('productos') }}" class="btn btn-secondary"><strong>Regresar</strong></a>
        <br><br>
        <table class="table table-hover">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Nombre</th>
                    <th>Opciones</th>
                </tr>
            </thead>

            <tbody>
                @foreach ($categorias as $categoria)
                    <tr>
                        <td>{{ $categoria->id }}</td>
                        <td>{{ $categoria->nombre }}</td>
                        <td><a class="btn btn-warning" href="{{url('categorias/'.$categoria->id.'/edit')}}">Editar</a>
                            <form action="{{url('categorias/'.$categoria->id)}}" method="POST">
                                @method('DELETE')
                                @csrf
                                <button type="submit" class="btn btn-danger" onclick="return confirmDelete()"><strong>Eliminar</strong></button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <script>
        function confirmDelete(){
            var respuesta = confirm("¿Estas seguro de eliminar esta categoria?");
            if(respuesta == true){
                return true;
            }else{
                return false;
            }
        }
    </script>
</main>