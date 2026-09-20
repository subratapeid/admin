<!DOCTYPE html>

<html lang="en" class="h-full">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ $title ?? config('app.name') }}</title>

    @vite([
        'resources/css/app.css',
        'resources/js/app.js'
    ])

    <link rel="stylesheet" href="{{ $assets->layoutCss($layout->key()) }}">
    <script type="module" src="{{ $assets->layoutJs($layout->key()) }}"></script>

    {{ $head ?? '' }}

</head>

<body {{ $attributes->merge([
    'class' => 'h-dvh overflow-hidden antialiased'
]) }}>

    <div class="admin-{{ $layout->key() }}-test">
        @include($layout->view(), ['slot' => $slot])
    </div>
</body>

</html>