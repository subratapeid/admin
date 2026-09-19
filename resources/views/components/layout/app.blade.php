@php

    if (!Auth::guard('web')->check()) {

        header(
            'Location: ' . route('admin.login')
        );

        exit;

    }

@endphp
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

</head>

<body class="h-dvh overflow-hidden bg-slate-50 antialiased" x-data="{ sidebarOpen: false }" x-cloak>

    <div class="flex h-dvh overflow-hidden">


        {{-- ======================================================
        MOBILE SIDEBAR OVERLAY
        ======================================================= --}}

        <div x-show="sidebarOpen" x-transition.opacity @click="sidebarOpen = false"
            class="fixed inset-0 z-40 bg-slate-950/50 backdrop-blur-sm lg:hidden"></div>


        {{-- ======================================================
        SIDEBAR
        ======================================================= --}}

        <aside class="fixed inset-y-0 left-0 z-50 flex w-[280px]
                   -translate-x-full flex-col
                   border-r border-slate-200
                   bg-white
                   shadow-2xl
                   transition-transform duration-300 ease-out
                   lg:static
                   lg:z-30
                   lg:translate-x-0
                   lg:shadow-none" :class="{
                'translate-x-0': sidebarOpen,
                '-translate-x-full': !sidebarOpen
            }">


            {{-- ==================================================
            SIDEBAR HEADER
            =================================================== --}}

            <div class="flex h-[72px] shrink-0 items-center justify-between
                       border-b border-slate-200 px-6">

                <a href="{{ route('admin.dashboard') }}" class="flex items-center gap-3">

                    <div class="flex h-10 w-10 items-center justify-center
                               rounded-xl
                               bg-slate-950
                               text-sm font-bold text-white
                               shadow-lg">
                        AD
                    </div>


                    <div>

                        <div class="text-sm font-bold tracking-tight
                                   text-slate-950">
                            Admin Panel
                        </div>

                        <div class="mt-0.5 text-xs font-medium
                                   text-slate-400">
                            Management Portal
                        </div>

                    </div>

                </a>


                {{-- Mobile Close Button --}}

                <button type="button" @click="sidebarOpen = false" class="flex h-9 w-9 items-center justify-center
                           rounded-lg
                           text-slate-500
                           transition
                           hover:bg-slate-100
                           hover:text-slate-900
                           lg:hidden">

                    <x-admin::icons.close />

                </button>

            </div>


            {{-- ==================================================
            SIDEBAR CONTENT
            THIS AREA SCROLLS SEPARATELY
            =================================================== --}}

            <div class="flex-1 overflow-y-auto px-4 py-5
                       [scrollbar-width:thin]">


                {{-- Main Menu --}}

                <div class="mb-3 px-3 text-[11px]
                           font-bold uppercase tracking-[0.14em]
                           text-slate-400">
                    Main Menu
                </div>


                <nav class="space-y-1">


                    {{-- Dashboard --}}

                    <a href="{{ route('admin.dashboard') }}" class="group flex items-center gap-3
                               rounded-xl px-3 py-3
                               text-sm font-semibold
                               transition" @class([
                                'bg-slate-950 text-white shadow-lg shadow-slate-900/10'
                                => request()->routeIs('admin.dashboard'),

                                'text-slate-600 hover:bg-slate-100 hover:text-slate-950'
                                => !request()->routeIs('admin.dashboard'),
                            ])>

                        <x-admin::icons.dashboard />

                        <span>
                            Dashboard
                        </span>

                    </a>


                    {{-- BCAs --}}

                    <a href="{{ route('admin.bcas.index') }}" class="group flex items-center gap-3
                               rounded-xl px-3 py-3
                               text-sm font-semibold
                               text-slate-600
                               transition
                               hover:bg-slate-100
                               hover:text-slate-950">

                        <x-admin::icons.users />

                        <span>
                            BCA Management
                        </span>

                    </a>


                    {{-- Consents --}}

                    <a href="{{ route('admin.consents.index') }}" class="group flex items-center gap-3
                               rounded-xl px-3 py-3
                               text-sm font-semibold
                               text-slate-600
                               transition
                               hover:bg-slate-100
                               hover:text-slate-950">

                        <x-admin::icons.document />

                        <span>
                            Consents
                        </span>

                    </a>

                    {{-- Device Submitted --}}

                    <a href="{{ route('admin.devices.index') }}" class="group flex items-center gap-3
                               rounded-xl px-3 py-3
                               text-sm font-semibold
                               text-slate-600
                               transition
                               hover:bg-slate-100
                               hover:text-slate-950">

                        <x-admin::icons.device />

                        <span>
                            Submitted Devices
                        </span>

                    </a>


                    {{-- Reports --}}

                    {{-- <a href="#" class="group flex items-center gap-3
                               rounded-xl px-3 py-3
                               text-sm font-semibold
                               text-slate-600
                               transition
                               hover:bg-slate-100
                               hover:text-slate-950">

                        <x-admin::icons.chart />

                        <span>
                            Reports
                        </span>

                    </a> --}}

                    {{-- Import --}}

                    <a href="{{ route('imports.create') }}" class="group flex items-center gap-3
                               rounded-xl px-3 py-3
                               text-sm font-semibold
                               text-slate-600
                               transition
                               hover:bg-slate-100
                               hover:text-slate-950">

                        <x-admin::icons.bulk-import />

                        <span>
                            Bulk Import
                        </span>

                    </a>


                </nav>


                {{-- Administration --}}

                <div class="mb-3 mt-8 px-3
                           text-[11px]
                           font-bold uppercase
                           tracking-[0.14em]
                           text-slate-400">
                    Administration
                </div>


                <nav class="space-y-1">


                    {{-- Users --}}

                    <a href="#" class="group flex items-center gap-3
                               rounded-xl px-3 py-3
                               text-sm font-semibold
                               text-slate-600
                               transition
                               hover:bg-slate-100
                               hover:text-slate-950">

                        <x-admin::icons.users />

                        <span>
                            Admin Users
                        </span>

                    </a>


                    {{-- Settings --}}

                    <a href="#" class="group flex items-center gap-3
                               rounded-xl px-3 py-3
                               text-sm font-semibold
                               text-slate-600
                               transition
                               hover:bg-slate-100
                               hover:text-slate-950">

                        <x-admin::icons.settings />

                        <span>
                            Settings
                        </span>

                    </a>


                </nav>


            </div>


            {{-- ==================================================
            SIDEBAR USER AREA
            =================================================== --}}

            <div class="shrink-0 border-t
                       border-slate-200
                       p-4">

                <div class="flex items-center gap-3
                           rounded-xl bg-slate-50 p-3">

                    <div class="flex h-10 w-10 shrink-0
                               items-center justify-center
                               rounded-full
                               bg-slate-950
                               text-sm font-bold text-white">
                        {{ strtoupper(substr(auth()->user()->name ?? 'A', 0, 1)) }}
                    </div>


                    <div class="min-w-0 flex-1">

                        <div class="truncate text-sm font-bold
                                   text-slate-900">
                            {{ auth()->user()->name ?? 'Administrator' }}
                        </div>

                        <div class="truncate text-xs
                                   text-slate-400">
                            {{ auth()->user()->email ?? '' }}
                        </div>

                    </div>


                    <form method="POST" action="{{ route('admin.logout') }}">

                        @csrf

                        <button type="submit" class="flex h-9 w-9 items-center
                                   justify-center rounded-lg
                                   text-slate-400
                                   transition
                                   hover:bg-white
                                   hover:text-red-600">

                            <x-admin::icons.logout />

                        </button>

                    </form>

                </div>

            </div>

        </aside>



        {{-- ======================================================
        MAIN APPLICATION AREA
        ======================================================= --}}

        <div class="flex min-w-0 flex-1 flex-col
                   overflow-hidden">


            {{-- ==================================================
            TOPBAR
            =================================================== --}}

            <header class="flex h-[72px] shrink-0 items-center
                       justify-between
                       border-b border-slate-200
                       bg-white px-4
                       lg:px-8">


                {{-- Left Area --}}

                <div class="flex items-center gap-3">


                    {{-- Hamburger --}}

                    <button type="button" @click="sidebarOpen = true" class="flex h-10 w-10 items-center
                               justify-center
                               rounded-xl
                               text-slate-600
                               transition
                               hover:bg-slate-100
                               hover:text-slate-950
                               lg:hidden">

                        <x-admin::icons.menu />

                    </button>


                    {{-- Page Title --}}

                    <div>

                        <h1 class="text-base font-bold
                                   text-slate-950
                                   sm:text-lg">
                            {{ $heading ?? 'Dashboard' }}
                        </h1>


                        @isset($description)

                            <p
                                class="hidden text-sm
                                                                                                                   text-slate-400
                                                                                                                   sm:block">
                                {{ $description }}
                            </p>

                        @endisset

                    </div>

                </div>


                {{-- Right Area --}}

                <div class="flex items-center gap-2">


                    {{-- Notification --}}

                    <button type="button" class="relative flex h-10 w-10
                               items-center justify-center
                               rounded-xl
                               text-slate-500
                               transition
                               hover:bg-slate-100
                               hover:text-slate-950">

                        <x-admin::icons.bell />


                        <span class="absolute right-2.5 top-2.5
                                   h-2 w-2
                                   rounded-full
                                   bg-red-500"></span>

                    </button>


                    {{-- Desktop Profile --}}

                    <div class="hidden items-center gap-3
                               border-l border-slate-200
                               pl-4
                               sm:flex">

                        <div class="text-right">

                            <div class="text-sm font-semibold
                                       text-slate-900">
                                {{ auth()->user()->name ?? 'Administrator' }}
                            </div>

                            <div class="text-xs
                                       text-slate-400">
                                Administrator
                            </div>

                        </div>


                        <div class="flex h-10 w-10
                                   items-center justify-center
                                   rounded-full
                                   bg-slate-950
                                   text-sm font-bold text-white">
                            {{ strtoupper(substr(auth()->user()->name ?? 'A', 0, 1)) }}
                        </div>

                    </div>

                </div>

            </header>



            {{-- ==================================================
            MAIN CONTENT
            THIS AREA SCROLLS SEPARATELY
            =================================================== --}}

            <main class="flex-1 overflow-y-auto
                       bg-slate-50">

                <div class="mx-auto w-full max-w-[1600px]
                           px-4 py-6
                           sm:px-6
                           lg:px-8
                           lg:py-8">

                    {{ $slot }}

                </div>

            </main>

        </div>

    </div>

</body>

</html>