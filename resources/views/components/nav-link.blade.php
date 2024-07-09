@props(['active'])

@php
    $classes =
        $active ?? false
            ? 'inline-flex items-center px-1 pt-1 border-b-4 border-indigo-200 dark:border-indigo-300  text-base font-medium leading-8 text-gray-200 dark:text-gray-100 focus:outline-none focus:border-indigo-500 transition duration-150 ease-in-out'
            : 'inline-flex items-center px-1 pt-1 border-b-4 border-transparent text-base font-medium leading-5 text-gray-500 dark:text-gray-100 hover:text-gray-200 dark:hover:text-gray-300 hover:border-gray-300 dark:hover:border-gray-500 focus:outline-none focus:text-gray-500 dark:focus:text-gray-300 focus:border-gray-300 dark:focus:border-gray-500 transition duration-150 ease-in-out';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}


</a>
