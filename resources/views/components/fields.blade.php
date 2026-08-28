@props(['cols' => 2])

<div {{ $attributes->class(['grid gap-4', 'sm:grid-cols-2' => (int) $cols >= 2, 'lg:grid-cols-3' => (int) $cols >= 3, 'lg:grid-cols-4' => (int) $cols >= 4, 'lg:grid-cols-5' => (int) $cols >= 5]) }}>
    {{ $slot }}
</div>
