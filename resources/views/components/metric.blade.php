@props([
    'label',
    'value' => null,
    'tone' => 'slate',
    'size' => 'md',
])

@php
    $box = match ($tone) {
        'brand' => 'bg-[#0b5cab]/10',
        default => 'bg-slate-50',
    };
    $labelClass = $tone === 'brand' ? 'text-[#0b5cab]' : 'text-slate-500';
    $valueClass = match (true) {
        $size === 'lg' && $tone === 'brand' => 'text-lg font-bold text-[#0b5cab]',
        $size === 'lg' => 'text-lg font-bold text-slate-900',
        default => 'font-semibold text-slate-900',
    };
@endphp

<div {{ $attributes->class(['rounded-lg px-3 py-2', $box]) }}>
    <p class="text-xs {{ $labelClass }}">{{ $label }}</p>
    <p class="{{ $valueClass }}">{{ $value ?? $slot }}</p>
</div>
