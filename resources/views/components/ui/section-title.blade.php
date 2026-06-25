@props([
    'title',
    'subtitle' => null,
    'alignment' => 'center'
])

<div class="mb-16 {{ $alignment === 'center' ? 'text-center' : 'text-left' }}">
    <h2 class="text-3xl md:text-4xl lg:text-5xl font-bold font-display tracking-tight text-white mb-4">
        {{ $title }}
    </h2>
    @if($subtitle)
        <p class="text-lg text-slate-400 max-w-2xl {{ $alignment === 'center' ? 'mx-auto' : '' }}">
            {{ $subtitle }}
        </p>
    @endif
</div>
