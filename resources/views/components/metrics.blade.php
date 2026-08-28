@props(['cols' => 3])

<div {{ $attributes->class([
    'grid gap-2',
    'sm:grid-cols-2' => (int) $cols >= 2,
    'lg:grid-cols-3' => (int) $cols >= 3,
]) }}>
    {{ $slot }}
</div>
