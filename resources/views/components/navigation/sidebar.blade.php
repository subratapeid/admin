@php
    $navigation = app(\Pagelyne\Admin\Navigation\NavigationManager::class)->items();
@endphp

<aside class="w-64 min-h-screen border-r bg-white">

    <div class="flex items-center h-16 px-4 border-b">
        <h2 class="text-lg font-semibold text-gray-900">Admin</h2>
    </div>

    <nav class="p-3">

        @if (empty($navigation))

            <div class="px-3 py-2 text-sm text-gray-500">
                No navigation items configured.
            </div>
        @else
            <ul class="space-y-1">

                @foreach ($navigation as $item)
                    @php
                        $hasChildren = !empty($item['children']);
                        $isActive = !empty($item['active']);
                    @endphp

                    <li @if ($hasChildren) x-data="{ open: {{ $isActive ? 'true' : 'false' }} }" @endif>

                        @if ($hasChildren)
                            <button type="button" @click="open = !open"
                                class="w-full flex items-center justify-between gap-3 px-3 py-2 rounded-lg text-sm font-medium transition-colors {{ $isActive ? 'bg-gray-100 text-gray-900' : 'text-gray-700 hover:bg-gray-100 hover:text-gray-900' }}">

                                <span class="flex items-center gap-3 min-w-0">

                                    @if (!empty($item['icon']))
                                        <span class="shrink-0">{{ $item['icon'] }}</span>
                                    @endif

                                    <span class="truncate">{{ $item['label'] }}</span>

                                </span>

                                <svg class="w-4 h-4 shrink-0 transition-transform duration-200"
                                    :class="{ 'rotate-90': open }" fill="none" viewBox="0 0 24 24"
                                    stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M9 5l7 7-7 7" />
                                </svg>

                            </button>

                            <ul x-show="open" x-collapse class="mt-1 ml-4 space-y-1">

                                @foreach ($item['children'] as $child)
                                    @php
                                        $childActive = !empty($child['active']);
                                    @endphp

                                    <li>

                                        @if (!empty($child['route']))
                                            <a href="{{ route($child['route']) }}"
                                                class="flex items-center gap-3 px-3 py-2 rounded-lg text-sm transition-colors {{ $childActive ? 'bg-gray-100 text-gray-900 font-medium' : 'text-gray-600 hover:bg-gray-100 hover:text-gray-900' }}">

                                                @if (!empty($child['icon']))
                                                    <span class="shrink-0">{{ $child['icon'] }}</span>
                                                @endif

                                                <span class="truncate">{{ $child['label'] }}</span>

                                            </a>
                                        @elseif (!empty($child['url']))
                                            <a href="{{ $child['url'] }}"
                                                class="flex items-center gap-3 px-3 py-2 rounded-lg text-sm transition-colors {{ $childActive ? 'bg-gray-100 text-gray-900 font-medium' : 'text-gray-600 hover:bg-gray-100 hover:text-gray-900' }}">

                                                @if (!empty($child['icon']))
                                                    <span class="shrink-0">{{ $child['icon'] }}</span>
                                                @endif

                                                <span class="truncate">{{ $child['label'] }}</span>

                                            </a>
                                        @endif

                                    </li>
                                @endforeach

                            </ul>
                        @else
                            @if (!empty($item['route']))
                                <a href="{{ route($item['route']) }}"
                                    class="flex items-center gap-3 px-3 py-2 rounded-lg text-sm transition-colors {{ $isActive ? 'bg-red-100 text-gray-900 font-medium' : 'text-gray-600 hover:bg-gray-100 hover:text-gray-900' }}">

                                    @if (!empty($item['icon']))
                                        <span class="shrink-0">{{ $item['icon'] }}</span>
                                    @endif

                                    <span class="truncate">{{ $item['label'] }}</span>

                                </a>
                            @elseif (!empty($item['url']))
                                <a href="{{ $item['url'] }}"
                                    class="flex items-center gap-3 px-3 py-2 rounded-lg text-sm transition-colors {{ $isActive ? 'bg-red-300 text-gray-900 font-medium' : 'text-gray-600 hover:bg-gray-100 hover:text-gray-900' }}">

                                    @if (!empty($item['icon']))
                                        <span class="shrink-0">{{ $item['icon'] }}</span>
                                    @endif

                                    <span class="truncate">{{ $item['label'] }}</span>

                                </a>
                            @endif
                        @endif

                    </li>
                @endforeach

            </ul>

        @endif

    </nav>

</aside>
