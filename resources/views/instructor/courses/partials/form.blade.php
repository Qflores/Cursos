<div class="mb-4">
    {!! Form::label('title', 'Título del curso') !!}
    {!! Form::text('title', null, ['class'=>'form-input block w-full mt-1' . ($errors->has('title') ? ' border-red-600':'')]) !!}
    @error('title')
        <strong class="text-sm text-red-600">{{ $message }}</strong>        
    @enderror

</div>

<div class="mb-4">
    {!! Form::label('slug', 'Slug del curso') !!}
    {!! Form::text('slug', null, [ 'readonly'=>'readonly' ,'class'=>'form-input block w-full mt-1 border-green-300' . ($errors->has('slug') ? ' border-red-600':'')]) !!}
    @error('slug')
        <strong class="text-sm text-red-600">{{ $message }}</strong>        
    @enderror
</div>

<div class="mb-4">
    {!! Form::label('subtitle', 'Subtitulo del curso') !!}
    {!! Form::text('subtitle', null, ['class'=>'form-input block w-full mt-1'.($errors->has('subtitle') ? ' border-red-600':'')]) !!}
    @error('subtitle')
        <strong class="text-sm text-red-600">{{ $message }}</strong>        
    @enderror

</div>

<div class="mb-4">
    {!! Form::label('description', 'Descriptión del curso') !!}
    {!! Form::textarea('description', null, ['class'=>'form-input block w-full mt-1 border rounded-md '.($errors->has('description') ? ' border: 1px':'')]) !!}
    @error('description')
        <strong class="text-sm text-red-600">{{ $message }}</strong>        
    @enderror
</div>

<div class="mb-4">
    {!! Form::label('credito', 'Ingrese Créditos del curso') !!}
    {!! Form::text('credito', null, ['class'=>'form-input block w-full mt-1 border rounded-md '.($errors->has('credito') ? ' border: 1px':'')]) !!}
    @error('credito')
        <strong class="text-sm text-red-600">{{ $message }}</strong>        
    @enderror
</div>
<div class="mb-4">
    {!! Form::label('hora', 'Duración del curso') !!}
    {!! Form::number('hora', null, ['min'=>'0.01','step'=>'0.01','class'=>'form-input block w-full mt-1 border rounded-md '.($errors->has('hora') ? ' border: 1px':'')]) !!}
    @error('hora')
        <strong class="text-sm text-red-600">{{ $message }}</strong>        
    @enderror
</div>
<div class="mb-4">
    {!! Form::label('registro', 'Registro del curso') !!}
    {!! Form::text('registro', null, ['class'=>'form-input block w-full mt-1 border rounded-md '.($errors->has('registro') ? ' border: 1px':'')]) !!}
    @error('registro')
        <strong class="text-sm text-red-600">{{ $message }}</strong>        
    @enderror
</div>

<div class="mb-4">
    {!! Form::label('libro', 'Libro del curso') !!}
    {!! Form::text('libro', null, ['class'=>'form-input block w-full mt-1 border rounded-md '.($errors->has('libro') ? ' border: 1px':'')]) !!}
    @error('libro')
        <strong class="text-sm text-red-600">{{ $message }}</strong>        
    @enderror
</div>


<!--'course','categories','level','price'-->
<div class="grid grid-cols-3 gap-4">
    <div class="">
        {!! Form::label('category_id', 'Categoría:') !!} 
        {!! Form::select('category_id', $categories,null,['class'=>'form-input block w-full mt-1']) !!} 

    </div>
    <div class=""> 
        {!! Form::label('level_id', 'Niveles:') !!}
        {!! Form::select('level_id', $levels,null,['class'=>'form-input block w-full mt-1']) !!} 
    </div>
    <div class=""> 
        {!! Form::label('price_id', 'Precio:') !!} 
        {!! Form::select('price_id', $prices,null,['class'=>'form-input block w-full mt-1']) !!} 
    </div>
</div>

<h1 class="text-2xl font-bold mt-8 mb-2"> Imagen del curso</h1>
<div class="grid grid-cols-2 gap-4">
    <figure>       
        @isset($course->image) 
            <img id="picture" class="h-full w-full rounded-lg  object-cover object-center" src="{{ Storage::url($course->image->url) }}" alt="">
        @else
            <img id="picture" class="h-full w-full rounded-lg object-cover  object-center" src="{{ asset('img/home/default-cover.jpg') }}" alt="">
        @endisset
    </figure>
    <div class="mb-2">
        <p class="mb-4"> aut veniam nipsa.</p>
        {!! Form::file('file', ['class'=>'form-input w-full'.($errors->has('file') ? ' border-red-600':''), 'id'=>'file','accept'=>'image/*']) !!}
        @error('file')
            <strong class="text-sm text-red-600">{{ $message }}</strong>        
        @enderror
    </div>
</div>
