@props(['label' => null])

<label class="block space-y-1.5">
    @if ($label)
        <span class="text-sm font-medium text-slate-600">{{ $label }}</span>
    @endif
    <select {{ $attributes->class(['w-full rounded-xl border border-slate-300 bg-white px-3.5 py-2.5 text-sm text-slate-900 shadow-sm transition focus:border-[#0b5cab] focus:outline-none focus:ring-4 focus:ring-[#0b5cab]/15']) }}>
        {{ $slot }}
    </select>
</label>
