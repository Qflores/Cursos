@extends('adminlte::page')

@section('title', 'Admistrador de cursos')

@section('content_header')
    <h1>Editar el precio</h1>
@stop

@section('content')

    @if (session('info'))
        <div class="alert alert-success">{{ session('info') }}</div>
    @endif

    <div class="card mb-4">
        <div class="card-body">
            {!! Form::model($price, ['route'=>['admin.prices.update',$price],'method'=>'put']) !!}
                
            <div class="form-group">
                {!! Form::label('name','Nombre de precio') !!}
                {!! Form::text('name', null, ['class'=>'form-control' , 'placeholder'=>'Ingrese nombre de precio']) !!}

                @error('name')
                    <span class="text-danger">{{ $message }}</span>                    
                @enderror
            </div>

            <div class="form-group">
                {!! Form::label('value','Ingrese el valor') !!}
                {!! Form::number('value', null, ['class'=>'form-control' , 'placeholder'=>'Ingrese el valor del precio','min'=>'0.0','step'=>'0.01']) !!}

                @error('value')
                    <span class="text-danger">{{ $message }}</span>                    
                @enderror
            </div>


            {!! Form::submit('Actualizar el precio', ['class'=>'btn btn-primary mt-2']) !!}
            {!! Form::close() !!}

        </div>
    </div>
    
@stop



