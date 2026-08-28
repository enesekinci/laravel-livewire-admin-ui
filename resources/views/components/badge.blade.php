@props(['tone' => 'slate'])

@php
    $classes = match ($tone) {
        'emerald' => 'bg-emerald-100 text-emerald-700',
        'amber' => 'bg-amber-100 text-amber-700',
        'red' => 'bg-red-100 text-red-700',
        'blue' => 'bg-blue-100 text-blue-700',
        'brand' => 'bg-[#0b5cab]/10 text-[#0b5cab]',
        default => 'bg-slate-100 text-slate-700',
    };
@endphp

<span {{ $attributes->class(['inline-flex rounded-full px-2 py-0.5 text-xs font-medium', $classes]) }}>
    {{ $slot }}
</span>
