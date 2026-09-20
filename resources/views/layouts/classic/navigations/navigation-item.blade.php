@php
    $isActive = !empty($item['active']);
@endphp

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