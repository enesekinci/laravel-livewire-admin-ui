@props([
    'value',
    'wireModel' => 'selected',
])

<td {{ $attributes->class(['w-10 px-3 py-2.5']) }}>
    <input
        type="checkbox"
        wire:model.live="{{ $wireModel }}"
        value="{{ $value }}"
        class="rounded border-slate-300 text-[#0b5cab] focus:ring-[#0b5cab]"
        aria-label="Satırı seç"
    >
</td>
