@props([
    'variant' => 'primary',
    'type' => 'button',
    'href' => null,
])

@php
    $classes = match ($variant) {
        'secondary' => 'border border-slate-700 bg-slate-800 text-white hover:bg-slate-900',
        'danger' => 'border border-red-700 bg-red-700 text-white hover:bg-red-800',
        'light' => 'border border-slate-200 bg-white text-slate-700 hover:bg-slate-50',
        default => 'border border-[#0b5cab] bg-[#0b5cab] text-white shadow-sm shadow-[#0b5cab]/25 hover:bg-[#094a8c]',
    };
    $base = 'inline-flex items-center justify-center gap-1.5 rounded-xl px-3.5 py-2 text-sm font-semibold transition disabled:opacity-50';
@endphp

@if ($href)
    <a href="{{ $href }}" {{ $attributes->class([$base, $classes]) }}>{{ $slot }}</a>
@else
    <button type="{{ $type }}" {{ $attributes->class([$base, $classes]) }}>{{ $slot }}</button>
@endif
