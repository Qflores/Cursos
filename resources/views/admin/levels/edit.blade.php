@extends('adminlte::page')

@section('title', 'Admistrador de cursos')

@section('content_header')
    <h1>Editar categoria</h1>
@stop

@section('content')

    @if (session('info'))
        <div class="alert alert-success">{{ session('info') }}</div>
    @endif

    <div class="card mb-4">
        <div class="card-body">
            {!! Form::model($level, ['route'=>['admin.levels.update',$level],'method'=>'put']) !!}
                
            <div class="form-group">
                {!! Form::label('name','Nombre de nivel') !!}
                {!! Form::text('name', null, ['class'=>'form-control' , 'placeholder'=>'Ingrese nombre de nivel']) !!}

                @error('name')
                    <span class="text-danger">{{ $message }}</span>                    
                @enderror
            </div>

            {!! Form::submit('Actualizar nivel', ['class'=>'btn btn-primary mt-2']) !!}
            {!! Form::close() !!}

        </div>
    </div>
    
@stop



