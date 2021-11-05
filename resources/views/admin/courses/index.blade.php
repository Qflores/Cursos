@extends('adminlte::page')

@section('title', 'Admistrador de cursos')

@section('content_header')
    <h1>Cursos pendientes por aprobación</h1>
@stop

@section('content')

    @if (session('info'))
        <div class="alert alert-success">
            {{ session('info') }}
        </div>
        
    @endif
    <div class="card">
        <div class="card-body">
            <table class="table table-striped table-responsive-sm table-bordered">
                <thead class="bg-primary">
                    <tr>
                        <td>ID</td>
                        <td>Nombre</td>
                        <td>Categoría</td>
                        <td>Opciones</td>
                    </tr>
                </thead>
                <tbody>
                    
                    @foreach ($courses as $course )
                        <tr>
                            <td>{{ $course->id }}</td>
                            <td>{{ $course->title }}</td>
                            <td>{{ $course->category->name }}</td>
                            <td>
                                <a href="{{ route('admin.courses.show',$course) }}" class="btn btn-primary">Revisar</a>
                            </td>
                        </tr>
                        
                    @endforeach
                </tbody>
            </table>
        </div>

        <div class="card-footer">
            {{ $courses->links('vendor.pagination.bootstrap-4') }}
        </div>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop
