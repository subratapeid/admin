<aside {{ $attributes->merge([
    'class' => 'fixed inset-y-0 left-0 z-50 flex w-[280px] -translate-x-full flex-col border-r border-slate-200 bg-white shadow-2xl transition-transform duration-300 ease-out lg:static lg:z-30 lg:translate-x-0 lg:shadow-none',
]) }} :class="{
        'translate-x-0': sidebarOpen,
        '-translate-x-full': !sidebarOpen
    }">

    @include('admin::layouts.basic.sidebar-header')

    <div class="flex-1 overflow-y-auto px-4 py-5 [scrollbar-width:thin]">

        @include('admin::layouts.basic.navigation')

    </div>

    @include('admin::layouts.basic.sidebar-user')

</aside>