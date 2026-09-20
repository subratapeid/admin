<div class="shrink-0 border-t border-slate-200 p-4">

    <div class="flex items-center gap-3 rounded-xl bg-slate-50 p-3">

        <div class="flex h-10 w-10 shrink-0 items-center justify-center rounded-full bg-slate-950 text-sm font-bold text-white">
            {{ strtoupper(substr(auth()->user()->name ?? 'A', 0, 1)) }}
        </div>

        <div class="min-w-0 flex-1">

            <div class="truncate text-sm font-bold text-slate-900">
                {{ auth()->user()->name ?? 'Administrator' }}
            </div>

            <div class="truncate text-xs text-slate-400">
                {{ auth()->user()->email ?? '' }}
            </div>

        </div>

        <form
            method="POST"
            action="{{ route('admin.logout') }}"
        >
            @csrf

            <button
                type="submit"
                class="flex h-9 w-9 items-center justify-center rounded-lg text-slate-400 transition hover:bg-white hover:text-red-600"
            >
                <x-admin::icons.logout />
            </button>
        </form>

    </div>

</div>