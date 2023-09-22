@props(['active'])

@php
    $classes = $active ?? false ? 'inline-flex items-center px-5  py-3 border-b-2 border-green-400 text-base  leading-5 text-green-500 font-semibold focus:outline-none focus:border-white transition duration-150 ease-in-out' : 'inline-flex items-center px-1 py-3 border-b-2 border-transparent text-base font-bold leading-5 text-gray-500 hover:text-gray-700 hover:border-gray-50 focus:outline-none focus:text-gray-50 focus:border-white transition duration-150 ease-in-out';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
