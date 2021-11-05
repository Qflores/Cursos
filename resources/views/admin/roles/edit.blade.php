@extends('adminlte::page')

@section('title', 'Admistrador de cursos')

@section('content_header')
    <h1>Editar Rol</h1>
@stop

@section('content')    

    @if(session('info'))
        <div class="alert alert-success" role="alert">
            <strong> {{session('info')}} </strong>
        </div>
    @endif()

    <div class="card">
        <div class="card-body">
            
            {!! Form::model($role, ['route'=>['admin.roles.update',$role],'method'=>'PUT']) !!}
                
            @include('admin.roles.partials.form')

            {!! Form::submit('Actualizar Role', ['class'=>'btn btn-warning font-bold mt-2']) !!}
            {!! Form::close() !!}

        </div>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop
