<div {{ $attributes->merge([
    'class' => $variantClass()
]) }}>
    {{ $slot }}
</div>