@props(['storage', 'warehouse'])

@php
    $safety = $storage->capacity * $storage->replenish/100;
    $textColorClass = ($storage->items->pluck('pivot.quantity')->sum() < $safety) ? "text-red-400 group-hover:text-white" : (($storage->items->pluck('pivot.amount')->sum() > $safety) ? "text-green-400 group-hover:text-white" : "text-gray-900");
@endphp

@if(!$storage->items->isEmpty())
    <a href="{{ route('storage.show', ['storage' => $storage]) }}">
        <div class="group relative bg-transparent cursor-pointer">
            <div class="relative px-4 py-2 bg-white rounded-lg group-hover:bg-blue-500">
                <p class="font-semibold text-gray-900 group-hover:text-white {{ $textColorClass }}">
                    {{ $storage->identifier }}
                </p>
                <p class="text-gray-500 group-hover:text-white {{ $textColorClass }}">{{ $storage->items->pluck('pivot.quantity')->sum() }}
                    / {{ $storage->capacity}}</p>
            </div>
        </div>
    </a>
@else
    <a href="{{ route('storage.show', ['storage' => $storage]) }}">
        <div class="group relative bg-transparent cursor-pointer">
            <div class="relative px-4 py-2 bg-white rounded-lg group-hover:bg-blue-500">
                <p class="font-semibold text-gray-900 group-hover:text-white">
                    {{ $storage->identifier }}
                </p>
                <p class="text-gray-500 group-hover:text-white">Empty</p>
            </div>
        </div>
    </a>
@endif
