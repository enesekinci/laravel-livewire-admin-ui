@props(['striped' => true])

<tbody {{ $attributes->class([
    'bg-white',
    $striped ? 'divide-y divide-slate-100' : '',
]) }}>
    {{ $slot }}
</tbody>
