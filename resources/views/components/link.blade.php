@props(['href' => '#'])

<a href="{{ $href }}" {{ $attributes->class(['text-[#0b5cab] hover:underline']) }}>
    {{ $slot }}
</a>
