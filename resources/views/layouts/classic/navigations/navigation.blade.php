<nav class="space-y-1">

    @foreach ($navigation as $item)

        @if (!empty($item['children']))

            @include('admin::layouts.classic.navigations.navigation-group')

        @else

            @include('admin::layouts.classic.navigations.navigation-item')

        @endif

    @endforeach

</nav>