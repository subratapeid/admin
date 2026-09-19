@props([
    'class' => 'h-5 w-5',
])

<svg
    {{ $attributes->merge([
        'class' => $class,
        'xmlns' => 'http://www.w3.org/2000/svg',
        'fill' => 'none',
        'viewBox' => '0 0 24 24',
        'stroke-width' => '1.5',
        'stroke' => 'currentColor',
    ]) }}>
    <path stroke-linecap="round" stroke-linejoin="round" d="M10.5 19.5 3 12m0 0 7.5-7.5M3 12h18" />
</svg>
