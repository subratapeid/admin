<x-admin-panel::layout.app title="Dashboard">

    <div class="space-y-6">

        <div>
            <h1 class="text-2xl font-bold">
                Dashboard Package
            </h1>

            <p class="mt-2 text-gray-600">
                This dashboard is provided by the Admin Panel package.
            </p>
        </div>

        <div class="rounded-lg border border-gray-200 bg-white p-6">

            <div class="flex items-center gap-3">

                <x-admin-panel::icon name="test" class="h-8 w-8" />

                <div>
                    <div class="font-semibold">
                        Admin Panel Package
                    </div>

                    <div class="text-sm text-gray-500">
                        Controller, route, layout and component
                        are all coming from the package.
                    </div>
                </div>

            </div>

        </div>

    </div>

</x-admin-panel::layout.app>