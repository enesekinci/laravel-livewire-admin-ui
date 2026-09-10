@props([
    'item' => [],
    'brand' => '#16a34a',
    'active' => false,
])

<a
    href="{{ route($item['route']) }}"
    wire:navigate
    @class([
        'group flex items-center gap-3 rounded-xl px-3 py-2.5 font-medium transition',
        'text-white shadow-md' => $active,
        'text-slate-300 hover:bg-white/5 hover:text-white' => ! $active,
    ])
    @if ($active) style="background: {{ $brand }}; box-shadow: 0 4px 6px -1px color-mix(in srgb, {{ $brand }} 25%, transparent);" @endif
>
    @if (isset($item['icon']))
        <span @class([
            'flex h-8 w-8 items-center justify-center rounded-lg',
            'bg-white/15' => $active,
            'bg-white/5 text-slate-400 group-hover:text-emerald-300' => ! $active,
        ])>
            <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="{{ $item['icon'] }}"/></svg>
        </span>
    @endif
    <span>{{ $item['label'] }}</span>
</a>
