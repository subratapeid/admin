<!DOCTYPE html>

<html lang="en" class="h-full">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>
        {{ $title ?? config('app.name') }}
    </title>

    @vite([
        'resources/css/app.css',
        'resources/js/app.js'
    ])

    {{ $head ?? '' }}

</head>

<body {{ $attributes->merge([
    'class' => 'h-dvh overflow-hidden bg-slate-50 antialiased'
]) }}>

    @include($layout->view(), ['slot' => $slot])

</body>

</html>