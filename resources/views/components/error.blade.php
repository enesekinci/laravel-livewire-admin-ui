@props(['name'])

@if ($errors->has($name))
    <p {{ $attributes->class(['mt-1 text-sm text-red-600']) }}>{{ $errors->first($name) }}</p>
@endif
