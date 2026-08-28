@props(['align' => 'left', 'nowrap' => false])

<td {{ $attributes->class([
    'px-3 py-2.5',
    'text-left' => $align === 'left',
    'text-center' => $align === 'center',
    'text-right' => $align === 'right',
    'whitespace-nowrap' => $nowrap,
]) }}>
    {{ $slot }}
</td>
