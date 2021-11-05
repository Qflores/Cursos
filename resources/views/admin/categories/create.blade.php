@extends('adminlte::page')

@section('title', 'Admistrador de cursos')

@section('content_header')
    <h1>Crear categoria</h1>
@stop

@section('content')

    <div class="card">
        <div class="card-body">
            {!! Form::open(['route'=>'admin.categories.store']) !!}
                
            <div class="form-group">
                {!! Form::label('name','Nombre de categoria') !!}
                {!! Form::text('name', null, ['class'=>'form-control' , 'placeholder'=>'Ingrese nombre de la categoría']) !!}

                @error('name')
                    <span class="text-danger">{{ $message }}</span>                    
                @enderror
            </div>

            {!! Form::submit('Crear Categoría', ['class'=>'btn btn-primary mt-2']) !!}
            {!! Form::close() !!}

        </div>
    </div>
    
@stop



