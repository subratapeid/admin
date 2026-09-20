@php
    $isActive = !empty($item['active']);
@endphp

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

    <div x-show="open" class="ml-4 space-y-1">

        @foreach ($item['children'] as $item)

            @include('admin::layouts.classic.navigations.navigation-child')

        @endforeach

    </div>

</div>