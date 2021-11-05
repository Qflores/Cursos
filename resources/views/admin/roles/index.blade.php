@extends('adminlte::page')

@section('title', 'Administrador de cursos')

@section('content_header')
    <h1>Lista de Roles</h1>
@stop

@section('content')

    @if(session('info'))
        <div class="alert alert-success" role="alert">
            <strong> {{session('info')}} </strong>
        </div>
    @endif()

    <div class="card">
        <div class="card-header">
            <a href="{{route('admin.roles.create')}}" class="btn btn-info"><i class="fas fa-plus-circle"></i> Crear Rol</a>
        </div>
        
        <div class="card-body">
            <table class="table table-striped table-responsive-sm table-bordered ">
                <thead class="bg-primary">
                   <tr>
                       <th>Id</th>
                       <th>Nombre</th>
                       <th colspan="2">Acciones</th>
                   </tr>
                </thead>
                <tbody>
                    @forelse($roles as $role)
                        <tr>
                            <td>{{$role->id}}</td>
                            <td>{{$role->name}}</td>
                            <td class="inline-block " width="10px"><a class="btn btn-success" href="{{ route('admin.roles.edit',$role)}}" >Editar</a></td>
                            <td class="inline-block " width="10px">                                
                                <form action="{{route('admin.roles.destroy',$role)}}" method="POST">
                                    @method("delete")
                                    @csrf
                                    <button class="btn btn-danger" type="submit">Eliminar</button>
                                </form>
                                
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspn="3">No hay roles Registrados</td>
                        </tr>

                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop
