<div class="flex h-dvh overflow-hidden" x-data="{ sidebarOpen: false }">

    @include('admin::layouts.basic.mobile-overlay')

    @include('admin::layouts.basic.sidebar')

    <div class="flex min-w-0 flex-1 flex-col overflow-hidden">

        @include('admin::layouts.basic.topbar')

        <main class="flex-1 overflow-y-auto bg-slate-50">

            <div class="mx-auto w-full max-w-[1600px] px-4 py-6 sm:px-6 lg:px-8 lg:py-8">

                {{ $slot }}
                <img src="{{ $assets->image('user.jpg') }}" alt="User">
            </div>

        </main>

    </div>

</div>