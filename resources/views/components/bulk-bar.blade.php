@props([
    'count' => 0,
    'label' => null,
])

@php
    $count = (int) $count;
    $label = $label ?? ($count.' kayıt seçili');
@endphp

@if ($count > 0)
    <div {{ $attributes->class(['mb-3 flex flex-col gap-2 rounded-xl border border-[#0b5cab]/20 bg-[#0b5cab]/5 px-3 py-2.5 sm:flex-row sm:items-center sm:justify-between']) }}>
        <div class="text-sm font-medium text-[#0b5cab]">{{ $label }}</div>
        <div class="flex flex-wrap items-center gap-2">
            {{ $slot }}
            @isset($clear)
                {{ $clear }}
            @else
                <button
                    type="button"
                    wire:click="clearBulkSelection"
                    class="rounded-lg px-2.5 py-1.5 text-xs font-medium text-slate-600 hover:bg-white/80"
                >Seçimi temizle</button>
            @endisset
        </div>
    </div>
@endif
