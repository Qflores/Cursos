@extends('adminlte::page')

@section('title', 'Admistrador de cursos')

@section('content_header')
    <h1>Crear Nivel</h1>
@stop

@section('content')

    <div class="card">
        <div class="card-body">
            {!! Form::open(['route'=>'admin.levels.store']) !!}
                
            <div class="form-group">
                {!! Form::label('name','Nombre de Nivel') !!}
                {!! Form::text('name', null, ['class'=>'form-control' , 'placeholder'=>'Ingrese nombre de nivel']) !!}

                @error('name')
                    <span class="text-danger">{{ $message }}</span>                    
                @enderror
            </div>

            {!! Form::submit('Crear Nivel', ['class'=>'btn btn-primary mt-2']) !!}
            {!! Form::close() !!}

        </div>
    </div>
    
@stop



