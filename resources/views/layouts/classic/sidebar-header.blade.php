<div class="flex h-[72px] shrink-0 items-center justify-between border-b border-slate-200 px-6">

    <a href="{{ route('admin.dashboard') }}" class="flex items-center gap-3">

        <div
            class="flex h-10 w-10 items-center justify-center rounded-xl bg-slate-950 text-sm font-bold text-white shadow-lg">
            AD
        </div>

        <div>

            <div class="text-sm font-bold tracking-tight text-slate-950">
                Admin Panel
            </div>

            <div class="mt-0.5 text-xs font-medium text-slate-400">
                Management Portal
            </div>

        </div>

    </a>

    <button type="button" @click="sidebarOpen = false"
        class="flex h-9 w-9 items-center justify-center rounded-lg text-slate-500 transition hover:bg-slate-100 hover:text-slate-900 lg:hidden">
        <x-admin::icons.close />
    </button>

</div>