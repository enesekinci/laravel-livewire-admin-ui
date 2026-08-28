@props(['label' => null, 'hint' => null])

<label class="block space-y-1.5">
    @if ($label)
        <span class="text-sm font-medium text-slate-600">{{ $label }}</span>
    @endif
    <textarea {{ $attributes->class(['w-full rounded-xl border border-slate-300 bg-white px-3.5 py-2.5 text-sm text-slate-900 shadow-sm transition placeholder:text-slate-400 focus:border-[#0b5cab] focus:outline-none focus:ring-4 focus:ring-[#0b5cab]/15']) }}>{{ $slot }}</textarea>
    @if ($hint)
        <span class="block text-xs text-slate-500">{{ $hint }}</span>
    @endif
</label>
