@props(['storage', 'warehouse'])

@php
    $quantity = $storage->item->pluck('pivot.quantity')->sum();
    $safety = $storage->capacity * $storage->replenish/100;
    $class = ($quantity < $safety) ? "bg-red-200 text-red-700 hover:bg-red-300" : "bg-green-200 text-green-700 hover:bg-green-300";
@endphp

@if(!$storage->item->isEmpty())
    <a href="{{ route('storage.show', ['storage' => $storage]) }}">
        <div class="group relative bg-transparent cursor-pointer rounded-lg {{ $class }}">
            <div class="relative px-4 py-2 ">
                <p class="font-semibold">
                    {{ ucwords($storage->identifier) }}
                </p>
                <p>{{ $storage->item->pluck('pivot.quantity')->sum() }}
                    / {{ ucwords($storage->capacity) }}</p>
            </div>
        </div>
    </a>
@else
    <a href="{{ route('storage.show', ['storage' => $storage]) }}">
        <div class="group relative bg-transparent cursor-pointer">
            <div class="relative px-4 py-2 bg-white rounded-lg group-hover:bg-blue-500">
                <p class="font-semibold text-gray-900 group-hover:text-white">
                    {{ ucwords($storage->identifier) }}
                </p>
                <p class="text-gray-500 group-hover:text-white">Empty</p>
            </div>
        </div>
    </a>
@endif
