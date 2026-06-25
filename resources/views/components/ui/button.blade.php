@props([
    'variant' => 'primary',
    'href' => null,
])

@php
    $baseClasses = "inline-flex items-center justify-center px-6 py-3 text-sm font-semibold rounded-full transition-all duration-300 transform hover:-translate-y-0.5";
    
    $variants = [
        'primary' => 'bg-cyan-500 text-white hover:bg-cyan-400 hover:shadow-[0_0_20px_rgba(6,182,212,0.4)]',
        'secondary' => 'glass text-white border border-white/10 hover:bg-white/10 hover:border-white/20',
    ];
    
    $classes = $baseClasses . ' ' . $variants[$variant];
@endphp

@if ($href)
    <a href="{{ $href }}" {{ $attributes->merge(['class' => $classes]) }}>
        {{ $slot }}
    </a>
@else
    <button {{ $attributes->merge(['class' => $classes]) }}>
        {{ $slot }}
    </button>
@endif
