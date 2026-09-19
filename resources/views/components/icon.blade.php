@if ($name === 'test')

    <svg {{ $attributes->merge([
            'class' => 'h-6 w-6',
            'viewBox' => '0 0 24 24',
            'fill' => 'none',
            'stroke' => 'currentColor',
            'stroke-width' => '2',
        ]) }} xmlns="http://www.w3.org/2000/svg">
        <path stroke-linecap="round" stroke-linejoin="round" d="M12 3v18M3 12h18" />
    </svg>

@endif