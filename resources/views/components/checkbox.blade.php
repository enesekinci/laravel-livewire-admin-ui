@props(['label' => null])

<label class="flex items-center gap-2 text-sm text-slate-600">
    <input
        type="checkbox"
        {{ $attributes->class(['rounded border-slate-300 text-[#0b5cab] focus:ring-[#0b5cab]']) }}
    >
    @if ($label)
        <span>{{ $label }}</span>
    @else
        {{ $slot }}
    @endif
</label>
