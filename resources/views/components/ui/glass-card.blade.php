@props([
    'hoverEffect' => true,
])

<div {{ $attributes->merge(['class' => 'glass rounded-2xl p-6 lg:p-8 ' . ($hoverEffect ? 'glass-hover' : '')]) }}>
    {{ $slot }}
</div>
