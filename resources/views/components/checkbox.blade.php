@props([
    'label' => null,
    'variant' => 'radio',
])

@php
    $variant = in_array($variant, ['radio', 'switch', 'native'], true) ? $variant : 'radio';
@endphp

@if ($variant === 'native')
    <label {{ $attributes->only('class')->class(['inline-flex cursor-pointer items-center gap-2 text-sm text-slate-600']) }}>
        <input
            type="checkbox"
            {{ $attributes->except('class')->class(['rounded border-slate-300 text-[#0b5cab] focus:ring-[#0b5cab]']) }}
        >
        @if ($label)
            <span>{{ $label }}</span>
        @else
            {{ $slot }}
        @endif
    </label>
@elseif ($variant === 'switch')
    <label {{ $attributes->only('class')->class(['group inline-flex cursor-pointer items-center gap-3 select-none']) }}>
        <input type="checkbox" class="sr-only" {{ $attributes->except('class') }}>
        <span
            class="relative h-6 w-11 shrink-0 rounded-full bg-slate-200 transition group-has-[:checked]:bg-[#0b5cab] group-has-[:focus-visible]:ring-2 group-has-[:focus-visible]:ring-[#0b5cab]/35 group-has-[:focus-visible]:ring-offset-2 group-has-[:disabled]:opacity-50"
            aria-hidden="true"
        >
            <span
                class="absolute left-0.5 top-0.5 h-5 w-5 rounded-full bg-white shadow-sm transition group-has-[:checked]:translate-x-5"
            ></span>
        </span>
        @if ($label)
            <span class="text-sm font-medium text-slate-700 group-has-[:disabled]:opacity-50">{{ $label }}</span>
        @else
            <span class="text-sm font-medium text-slate-700 group-has-[:disabled]:opacity-50">{{ $slot }}</span>
        @endif
    </label>
@else
    {{-- Radio görünümlü checkbox (varsayılan) --}}
    <label {{ $attributes->only('class')->class(['group inline-flex cursor-pointer items-center gap-2.5 select-none']) }}>
        <input type="checkbox" class="sr-only" {{ $attributes->except('class') }}>
        <span
            class="relative flex h-5 w-5 shrink-0 items-center justify-center rounded-full border-2 border-slate-300 bg-white transition group-has-[:checked]:border-[#0b5cab] group-has-[:checked]:bg-[#0b5cab] group-has-[:focus-visible]:ring-2 group-has-[:focus-visible]:ring-[#0b5cab]/35 group-has-[:focus-visible]:ring-offset-2 group-has-[:disabled]:opacity-50"
            aria-hidden="true"
        >
            <span
                class="h-2 w-2 scale-0 rounded-full bg-white transition group-has-[:checked]:scale-100"
            ></span>
        </span>
        @if ($label)
            <span class="text-sm font-medium text-slate-700 transition group-hover:text-slate-900 group-has-[:disabled]:opacity-50">{{ $label }}</span>
        @else
            <span class="text-sm font-medium text-slate-700 transition group-hover:text-slate-900 group-has-[:disabled]:opacity-50">{{ $slot }}</span>
        @endif
    </label>
@endif
