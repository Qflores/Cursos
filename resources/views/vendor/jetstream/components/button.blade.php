<button {{ $attributes->merge(['type' => 'submit', 'class' => 'inline-flex items-center px-4 py-2 bg-indigo-600 border bg-opacity-100 rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-green-600 active:bg-gray-900 focus:outline-none focus:border-gray-300 focus:shadow-outline-gray disabled:opacity-25 transition ease-in-out duration-150']) }}>
    {{ $slot }}
</button>
