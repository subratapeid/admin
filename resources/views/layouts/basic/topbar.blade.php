<header class="flex h-[72px] shrink-0 items-center justify-between border-b border-slate-200 bg-white px-4 lg:px-8">

    <div class="flex items-center gap-3">

        <button type="button" @click="sidebarOpen = true"
            class="flex h-10 w-10 items-center justify-center rounded-xl text-slate-600 transition hover:bg-slate-100 hover:text-slate-950 lg:hidden">
            <x-admin::icons.menu />
        </button>

        <div>

            <h1 class="text-base font-bold text-slate-950 sm:text-lg">
                {{ $heading ?? 'Dashboard' }}
            </h1>

            @isset($description)
                <p class="hidden text-sm text-slate-400 sm:block">
                    {{ $description }}
                </p>
            @endisset

        </div>

    </div>

    <div class="flex items-center gap-2">

        <button type="button"
            class="relative flex h-10 w-10 items-center justify-center rounded-xl text-slate-500 transition hover:bg-slate-100 hover:text-slate-950">
            <x-admin::icons.bell />

            <span class="absolute right-2.5 top-2.5 h-2 w-2 rounded-full bg-red-500"></span>
        </button>

        <div class="hidden items-center gap-3 border-l border-slate-200 pl-4 sm:flex">

            <div class="text-right">

                <div class="text-sm font-semibold text-slate-900">
                    {{ $admin->user()->name() }}
                </div>

                <div class="text-xs text-slate-400">
                    {{ $admin->user()->role() ?? 'No Role' }}
                </div>

            </div>

            <div
                class="flex h-10 w-10 items-center justify-center rounded-full bg-slate-950 text-sm font-bold text-white">
                {{ strtoupper(substr($admin->user()->name() ?? 'P', 0, 1)) }}
            </div>

        </div>

    </div>

</header>