@props(['label' => null, 'hint' => null])

<label class="block space-y-1.5">
    @if ($label)
        <span class="text-sm font-medium text-slate-600">{{ $label }}</span>
    @endif
    <input
        type="file"
        {{ $attributes->class(['block w-full text-sm text-slate-600 file:mr-3 file:rounded-lg file:border-0 file:bg-slate-100 file:px-3 file:py-2 file:text-sm file:font-medium']) }}
    >
    @if ($hint)
        <span class="block text-xs text-slate-500">{{ $hint }}</span>
    @endif
</label>
