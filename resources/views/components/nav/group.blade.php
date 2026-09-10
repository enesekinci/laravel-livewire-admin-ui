@props([
    'item' => [],
    'brand' => '#16a34a',
    'active' => false,
    'expandedDefaults' => [],
])

@php
    $id = Str::slug($item['label']);
    $chevronIcon = 'M19 9l-7 7-7-7';
@endphp

<div x-data="{ open: {{ $active ? 'true' : 'false' }} }">
    <button
        type="button"
        @click="open = !open"
        @class([
            'group flex w-full items-center gap-3 rounded-xl px-3 py-2.5 font-medium transition',
            'bg-white/10 text-white' => $active,
            'text-slate-300 hover:bg-white/5 hover:text-white' => ! $active,
        ])
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
        <span class="flex-1 text-left">{{ $item['label'] }}</span>
        <svg class="h-4 w-4 transition-transform" :class="open ? 'rotate-180' : ''" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="{{ $chevronIcon }}"/></svg>
    </button>
    <div x-show="open" x-cloak class="ml-4 mt-1 space-y-1 border-l border-white/10 pl-3">
        @foreach ($item['children'] as $child)
            @php $childActive = request()->routeIs($child['match']); @endphp
            <a
                href="{{ route($child['route']) }}"
                wire:navigate
                @class([
                    'block rounded-lg px-3 py-2 font-medium transition',
                    'text-white' => $childActive,
                    'text-slate-400 hover:bg-white/5 hover:text-white' => ! $childActive,
                ])
                @if ($childActive) style="background: color-mix(in srgb, {{ $brand }} 25%, transparent);" @endif
            >{{ $child['label'] }}</a>
        @endforeach
    </div>
</div>
