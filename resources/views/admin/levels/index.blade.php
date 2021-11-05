@extends('adminlte::page')

@section('title', 'Admistrador de cursos')

@section('content_header')
    <a href="{{ route('admin.levels.create') }}" class="btn btn-primary float-right">Crear Nivel</a>
    <h1>Lista de Niveles</h1>
@stop

@section('content')

    @if (session('info'))
        <div class="alert alert-success">{{ session('info') }}</div>
    @endif

    <div class="card">
        <div class="card-body">
            <table class="table table-striped table-responsive-sm table-bordered">
                <thead class="bg-primary">
                    <tr>
                        <th>Id</th>
                        <th>Nombre</th>
                        <th colspan="2">Opciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($levels as $level)
                        
                    
                    <tr>
                        <th>{{ $level->id }}</th>
                        <th>{{ $level->name }}</th>
                        <td class="inline-block " width="10px"><a class="btn btn-success" href="{{ route('admin.levels.edit',$level)}}" >Editar</a></td>
                            <td class="inline-block " width="10px">                                
                                <form action="{{route('admin.levels.destroy',$level)}}" method="POST">
                                    @method("delete")
                                    @csrf
                                    <button class="btn btn-danger" type="submit">Eliminar</button>
                                </form>                                
                            </td>
                    </tr>

                    @endforeach

                </tbody>
            </table>
        </div>
    </div>
@stop


