@props([
    'wireModel' => 'selectAllPage',
])

<th {{ $attributes->class(['w-10 px-3 py-2.5']) }}>
    <input
        type="checkbox"
        wire:model.live="{{ $wireModel }}"
        class="rounded border-slate-300 text-[#0b5cab] focus:ring-[#0b5cab]"
        aria-label="Sayfadaki tümünü seç"
    >
</th>
