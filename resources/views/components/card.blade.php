@props(['flush' => false, 'title' => null, 'subtitle' => null])

<div {{ $attributes->class(['overflow-hidden rounded-2xl border border-slate-200/80 bg-white shadow-[0_1px_2px_rgba(15,23,42,0.04),0_8px_24px_rgba(15,23,42,0.04)]']) }}>
    @if ($title)
        <div class="border-b border-slate-100 bg-slate-50/70 px-4 py-3.5 sm:px-5">
            <h3 class="text-sm font-semibold text-slate-900">{{ $title }}</h3>
            @if ($subtitle)
                <p class="mt-0.5 text-xs text-slate-500">{{ $subtitle }}</p>
            @endif
        </div>
    @endif
    <div @class([$flush ? '' : 'p-4 sm:p-5'])>
        {{ $slot }}
    </div>
</div>
