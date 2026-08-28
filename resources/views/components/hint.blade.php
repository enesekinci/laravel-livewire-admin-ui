@props(['size' => 'xs'])

<p {{ $attributes->class([
    'text-slate-500',
    'text-xs' => $size === 'xs',
    'text-sm' => $size === 'sm',
]) }}>
    {{ $slot }}
</p>
