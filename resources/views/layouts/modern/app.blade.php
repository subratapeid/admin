<div class="min-h-screen bg-slate-950 text-white">

    @include('admin::layouts.modern.sidebar')

    <div>

        <main class="p-8">
            {{ $slot }}
        </main>

    </div>

</div>