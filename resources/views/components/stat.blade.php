@props([
    'label',
    'value',
    'tone' => 'slate',
    'href' => null,
])

@php
    $tones = match ($tone) {
        'brand' => ['wrap' => 'from-[#0b5cab]/10 to-white', 'icon' => 'bg-[#0b5cab]/15 text-[#0b5cab]', 'value' => 'text-[#0b5cab]'],
        'amber' => ['wrap' => 'from-amber-50 to-white', 'icon' => 'bg-amber-100 text-amber-700', 'value' => 'text-amber-700'],
        'emerald' => ['wrap' => 'from-emerald-50 to-white', 'icon' => 'bg-emerald-100 text-emerald-700', 'value' => 'text-emerald-700'],
        default => ['wrap' => 'from-slate-50 to-white', 'icon' => 'bg-slate-100 text-slate-600', 'value' => 'text-slate-900'],
    };
@endphp

@if ($href)
<a href="{{ $href }}" {{ $attributes->class(['block rounded-2xl border border-slate-200/80 bg-gradient-to-br p-4 shadow-sm transition hover:-translate-y-0.5 hover:border-slate-300 hover:shadow-md sm:p-5', $tones['wrap']]) }}>
@else
<div {{ $attributes->class(['rounded-2xl border border-slate-200/80 bg-gradient-to-br p-4 shadow-sm sm:p-5', $tones['wrap']]) }}>
@endif
    <div class="flex items-start justify-between gap-3">
        <div>
            <p class="text-xs font-semibold uppercase tracking-wide text-slate-500">{{ $label }}</p>
            <p @class(['mt-2 text-3xl font-bold tracking-tight', $tones['value']])>{{ $value }}</p>
        </div>
        @isset($icon)
            <span @class(['flex h-10 w-10 items-center justify-center rounded-xl', $tones['icon']])>
                {{ $icon }}
            </span>
        @endisset
    </div>
@if ($href)
</a>
@else
</div>
@endif
