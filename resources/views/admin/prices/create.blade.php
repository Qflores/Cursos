@extends('adminlte::page')

@section('title', 'Admistrador de cursos')

@section('content_header')
    <h1>Agregar nuevo Precio</h1>
@stop

@section('content')

    <div class="card">
        <div class="card-body">
            {!! Form::open(['route'=>'admin.prices.store']) !!}
                
            <div class="form-group">
                {!! Form::label('name','Nombre de Precio') !!}
                {!! Form::text('name', null, ['class'=>'form-control' , 'placeholder'=>'Ingrese el nombre del precio']) !!}
                @error('name')
                    <span class="text-danger">{{ $message }}</span>                    
                @enderror
            </div>
            
            <div class="form-group">
                {!! Form::label('value','Ingrese el valor') !!}
                {!! Form::number('value', null, ['class'=>'form-control' , 'placeholder'=>'Ingrese el valor del precio','min'=>'0.000','step'=>'0.01']) !!}

                @error('value')
                    <span class="text-danger">{{ $message }}</span>                    
                @enderror
            </div>

            {!! Form::submit('Crear Precio', ['class'=>'btn btn-primary mt-2']) !!}
            {!! Form::close() !!}

        </div>
    </div>
    
@stop



