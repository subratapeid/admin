<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>
        {{ $title ?? config('admin-panel.name', 'Admin Panel') }}
    </title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    @stack('styles')
</head>

<body class="min-h-screen bg-gray-100 text-gray-900">

    <div class="min-h-screen">

        {{-- Test Header --}}
        <header class="border-b border-gray-200 bg-white">
            <div class="mx-auto flex max-w-7xl items-center justify-between px-6 py-4">

                <div class="flex items-center gap-3">

                    <x-admin-panel::icon name="test" />

                    <div>
                        <div class="font-semibold">
                            {{ config('admin-panel.name', 'Admin Panel') }}
                        </div>

                        <div class="text-xs text-gray-500">
                            Package Test
                        </div>
                    </div>

                </div>

                <div class="text-sm text-gray-500">
                    v{{ config('admin-panel.version') }}
                </div>

            </div>
        </header>

        {{-- Main Content --}}
        <main class="mx-auto max-w-7xl px-6 py-8">
            {{ $slot }}
        </main>

    </div>

    @stack('scripts')

</body>

</html>