@props(['gap' => 4])

<div {{ $attributes->class([
    'space-y-4' => (int) $gap === 4,
    'space-y-6' => (int) $gap === 6,
]) }}>
    {{ $slot }}
</div>
