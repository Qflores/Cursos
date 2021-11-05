@extends('adminlte::page')

@section('title', 'Admistrador de cursos')

@section('content_header')
    <h1>Asignar un Role</h1>
@stop

@section('content')
    @if(session('sms'))
        <div class="alert alert-success">
            <strong>{{session('sms')}}</strong>
        </div>
    @endif

    
    <div class="card">
        <div class="card-body">
            <h5>Editar Usuario: </h5>
            <hr>
            <p class="form-control text-bold">{{ $user->name }}</p>
           
            <div class="h5">Lista de roles</div>

            {!! Form::model($user, ['route' => ['admin.users.update', $user], 'method'=>'put']) !!}
                @foreach ($roles as $role)
                    <div>
                        <label>
                            {!! Form::checkbox('roles[]', $role->id, null, ['class'=>'mr-1']) !!}
                            {{ $role->name }}
                        </label>
                    </div>
                @endforeach

                {!! Form::submit('Asignar Rol', ['class'=>'btn btn-success mt-2']) !!}

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