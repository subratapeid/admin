<nav class="space-y-1">

    @if (empty($navigation))

        <div class="px-3 py-3 text-sm text-slate-500">
            No navigation items configured.
        </div>

    @else

        @foreach ($navigation as $item)

            @php
                $hasChildren = !empty($item['children']);
                $isActive = !empty($item['active']);
            @endphp

            @if ($hasChildren)

                <div x-data="{ open: {{ $isActive ? 'true' : 'false' }} }" class="space-y-1">

                    <button type="button" @click="open = !open" @class([
                        'group flex w-full items-center justify-between gap-3 rounded-xl px-3 py-3 text-sm font-semibold transition',

                        'bg-slate-950 text-white shadow-lg shadow-slate-900/10' => $isActive,
                        'text-slate-600 hover:bg-slate-100 hover:text-slate-950' => !$isActive,
                    ])>

                        <span class="flex min-w-0 items-center gap-3">

                            @if (!empty($item['icon']))
                                <span class="shrink-0">
                                    {!! $item['icon'] !!}
                                </span>
                            @endif

                            <span class="truncate">
                                {{ $item['label'] }}
                            </span>

                        </span>

                        <svg class="h-4 w-4 shrink-0 transition-transform duration-200" :class="{ 'rotate-90': open }" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                        </svg>

                    </button>

                    <div x-show="open" x-collapse class="ml-4 space-y-1">

                        @foreach ($item['children'] as $child)

                            @php
                                $childActive = !empty($child['active']);
                            @endphp

                            @if (!empty($child['route']))

                                <a href="{{ route($child['route']) }}"
                                    class="group flex items-center gap-3 rounded-xl px-3 py-2.5 text-sm font-medium transition" @class([
                                        'bg-slate-100 text-slate-950' => $childActive,
                                        'text-slate-600 hover:bg-slate-100 hover:text-slate-950' => !$childActive,
                                    ])>

                                    @if (!empty($child['icon']))
                                        <span class="shrink-0">
                                            {!! $child['icon'] !!}
                                        </span>
                                    @endif

                                    <span class="truncate">
                                        {{ $child['label'] }}
                                    </span>

                                </a>

                            @elseif (!empty($child['url']))

                                <a href="{{ $child['url'] }}"
                                    class="group flex items-center gap-3 rounded-xl px-3 py-2.5 text-sm font-medium transition" @class([
                                        'bg-slate-100 text-slate-950' => $childActive,
                                        'text-slate-600 hover:bg-slate-100 hover:text-slate-950' => !$childActive,
                                    ])>

                                    @if (!empty($child['icon']))
                                        <span class="shrink-0">
                                            {!! $child['icon'] !!}
                                        </span>
                                    @endif

                                    <span class="truncate">
                                        {{ $child['label'] }}
                                    </span>

                                </a>

                            @endif

                        @endforeach

                    </div>

                </div>

            @else

                @if (!empty($item['route']))

                    <a href="{{ route($item['route']) }}" @class([
                        'group flex items-center gap-3 rounded-xl px-3 py-3 text-sm font-semibold transition',
                        'bg-slate-950 text-white shadow-lg shadow-slate-900/10' => $isActive,
                        'text-slate-600 hover:bg-slate-100 hover:text-slate-950' => !$isActive,
                    ])>

                        @if (!empty($item['icon']))
                            <span class="shrink-0">
                                {!! $item['icon'] !!}
                            </span>
                        @endif

                        <span class="truncate">
                            {{ $item['label'] }}
                        </span>

                    </a>

                @elseif (!empty($item['url']))

                    <a href="{{ $item['url'] }}" @class([
                        'group flex items-center gap-3 rounded-xl px-3 py-3 text-sm font-semibold transition',
                        'bg-slate-950 text-white shadow-lg shadow-slate-900/10' => $isActive,
                        'text-slate-600 hover:bg-slate-100 hover:text-slate-950' => !$isActive,
                    ])>

                        @if (!empty($item['icon']))
                            <span class="shrink-0">
                                {!! $item['icon'] !!}
                            </span>
                        @endif

                        <span class="truncate">
                            {{ $item['label'] }}
                        </span>

                    </a>

                @endif

            @endif

        @endforeach

    @endif

</nav>