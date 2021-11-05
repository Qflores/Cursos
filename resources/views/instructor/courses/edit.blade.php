<x-instructor-layout :course="$course">
 
    <!-- informacion variable delc curso -->
    
    <h1 class="text-2xl font-bold  ">INFORMACION DEL CURSO </h1>               
    <hr class="mt-2 mb-6">
    {!! Form::model($course, ['route'=>['instructor.courses.update',$course], 'method'=>'put','files'=>true,'autocomplete'=>'off']) !!}
        
        @include('instructor.courses.partials.form')

        <div class="flex justify-end">
            {!! Form::submit('Actualizar Curso', ['class'=>'btn btn-danger cursor-pointer']) !!}
        </div>

    {!! Form::close() !!}

    <x-slot name="js">       
            
        <script src="https://cdn.ckeditor.com/ckeditor5/29.0.0/classic/ckeditor.js"></script>
        <script src="https://cdn.ckeditor.com/ckeditor5/29.0.0/classic/translations/es.js"></script>

        <script src="{{ asset('js/instructor/courses/form.js') }}"></script>
        
    </x-slot>

</x-instructor-layout>