@props(['active'])

@php
    $classes = $active ?? false ? 'inline-flex items-center px-1  py-1 border-b-4 border-[#f67623] text-sm leading-5 text-green-50 font-medium focus:outline-none focus:border-white transition duration-150 ease-in-out' : 'inline-flex items-center px-1 py-1 border-b-4 border-transparent text-sm  leading-5 text-white hover:text-gray-200 hover:border-gray-50 focus:outline-none focus:text-gray-50 focus:border-white transition duration-150 ease-in-out';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
