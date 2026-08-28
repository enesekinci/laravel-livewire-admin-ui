@props(['subtitle' => null])

<div {{ $attributes->class(['flex flex-col gap-3 sm:flex-row sm:items-end sm:justify-between']) }}>
    @if ($subtitle)
        <div>
            <p class="text-sm text-slate-500">{{ $subtitle }}</p>
        </div>
    @endif
    @isset($actions)
        <div class="flex flex-wrap gap-2">{{ $actions }}</div>
    @endisset
</div>
