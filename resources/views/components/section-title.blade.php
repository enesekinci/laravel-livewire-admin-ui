@props(['subtitle' => null])

<div {{ $attributes->class(['mb-4']) }}>
    <h3 class="text-base font-semibold text-slate-900">{{ $slot }}</h3>
    @if ($subtitle)
        <p class="mt-0.5 text-sm text-slate-500">{{ $subtitle }}</p>
    @endif
</div>
