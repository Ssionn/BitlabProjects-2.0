@props(['active'])

@php

$classes = ($active ?? false)
            ? 'border-b-2 border-indigo-700 text-md'
            : 'hover:border-b-2 text-md';

@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
