@props(['value'])

<label {{ $attributes->merge(['class' => 'block font-medium text-md  font-bolt text-gray-100']) }}>
    {{ $value ?? $slot }}
</label>
