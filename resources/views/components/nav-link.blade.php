@props(['active'])

@php
$classes = ($active ?? false)
            ? 'inline-flex items-center text-lg px-4 py-2 bg-gray-50 rounded font-bold leading-5 text-gray-900 focus:outline-none focus:border-indigo-700 transition'
            : 'inline-flex items-center text-lg  px-4 py-2 font-medium leading-5 text-gray-500 hover:text-gray-700 hover:bg-gray-50 focus:outline-none focus:text-gray-700 focus:border-gray-300 transition';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>