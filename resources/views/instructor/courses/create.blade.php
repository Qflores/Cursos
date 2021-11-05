<x-app-layout > <!-- : course="$course"-->
    

    <div class="container py-8">
        <div class="card">
            <div class="card-body">
                <div class="px-6 py-4 flex ">
                    <h1 class="text-2xl font-bold flex-1 justify-start">Crear nuevo Curso <i class="fas text-green-500 fa-plus-circle"></i></h1>
                </div>
                       
                <hr class="mt-2 mb-6">

                {!! Form::open(['route'=>['instructor.courses.store'],'files'=>true,'autocomplete'=>'off']) !!}
                    
                    @include('instructor.courses.partials.form')
                    {!! Form::hidden('user_id', auth()->user()->id) !!}

                    <div class="flex justify-end">
                        {!! Form::submit('Crear nuevo Curso', ['class'=>'btn btn-primary cursor-pointer']) !!}
                    </div>

                {!! Form::close() !!}

            </div>
        </div>
    </div>

    <x-slot name="js">

        <script src="https://cdn.ckeditor.com/ckeditor5/29.0.0/classic/ckeditor.js"></script>
        <script src="https://cdn.ckeditor.com/ckeditor5/29.0.0/classic/translations/es.js"></script>
        <script src="{{ asset('js/instructor/courses/form.js') }}"></script>

    </x-slot>
</x-app-layout>