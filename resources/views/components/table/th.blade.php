@props(['align' => 'left'])

<th {{ $attributes->class([
    'px-3 py-2.5 font-semibold',
    'text-left' => $align === 'left',
    'text-center' => $align === 'center',
    'text-right' => $align === 'right',
]) }}>
    {{ $slot }}
</th>
