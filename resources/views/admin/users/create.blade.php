
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
    <h5>Crear nuevo usuairo</h5>
    
    <div class="card">
        <div class="card-body">
           
            {!! Form::open(['route' => 'admin.users.store']) !!}
                <div class="form-group">
                    {!! Form::label('name','Nombre de categoria') !!}
                    {!! Form::text('name', null, ['class'=>'form-control' , 'placeholder'=>'Ingrese nombre de la categoría']) !!}

                @error('name')
                    <span class="text-danger">{{ $message }}</span>                    
                @enderror
            </div>

                {!! Form::submit('Registrar usuario', ['class'=>'btn btn-primary mt-2']) !!}

            {!! Form::close() !!}
            
        
        </div>  
    </div>



@stop