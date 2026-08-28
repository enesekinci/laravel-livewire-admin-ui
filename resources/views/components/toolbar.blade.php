<div {{ $attributes->class(['mb-4 flex flex-col gap-3 sm:flex-row sm:items-end sm:justify-between']) }}>
    @isset($filters)
        <div class="min-w-0 flex-1">{{ $filters }}</div>
    @endisset
    @isset($actions)
        <div class="flex shrink-0 flex-wrap gap-2">{{ $actions }}</div>
    @endisset
</div>
