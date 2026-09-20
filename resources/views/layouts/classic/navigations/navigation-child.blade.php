@php
    $isActive = !empty($item['active']);
@endphp

@if (!empty($item['route']))

    <a href="{{ route($item['route']) }}" @class([
        'group flex items-center gap-3 rounded-lg px-3 py-2 text-sm transition',
        'bg-slate-100 text-slate-950 font-medium' => $isActive,
        'text-slate-500 hover:bg-slate-100 hover:text-slate-950' => !$isActive,
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
        'group flex items-center gap-3 rounded-lg px-3 py-2 text-sm transition',
        'bg-slate-100 text-slate-950 font-medium' => $isActive,
        'text-slate-500 hover:bg-slate-100 hover:text-slate-950' => !$isActive,
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