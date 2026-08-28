@props(['label'])

<div {{ $attributes }}>
    <p class="text-sm text-slate-500">{{ $label }}</p>
    <div class="font-semibold text-slate-900">{{ $slot }}</div>
</div>
