@props(['storageBin', 'warehouse'])

@php
    $safety = $storageBin->capacity * $storageBin->replenish/100;
    $textColorClass = ($storageBin->items->pluck('pivot.quantity')->sum() < $safety) ? "text-red-400 group-hover:text-white" : (($storageBin->items->pluck('pivot.amount')->sum() > $safety) ? "text-green-400 group-hover:text-white" : "text-gray-900");
@endphp

@if(!$storageBin->items->isEmpty())
    <a href="{{ route('storage.show', ['storageBin' => $storageBin]) }}">
        <div class="group relative bg-transparent cursor-pointer">
            <div class="relative px-4 py-2 bg-white rounded-lg group-hover:bg-blue-500">
                <p class="font-semibold text-gray-900 group-hover:text-white {{ $textColorClass }}">
                    {{ $storageBin->identifier }}
                </p>
                <p class="text-gray-500 group-hover:text-white {{ $textColorClass }}">{{ $storageBin->items->pluck('pivot.quantity')->sum() }}
                    / {{ $storageBin->capacity}}</p>
            </div>
        </div>
    </a>
@else
    <a href="{{ route('storage.show', ['storageBin' => $storageBin]) }}">
        <div class="group relative bg-transparent cursor-pointer">
            <div class="relative px-4 py-2 bg-white rounded-lg group-hover:bg-blue-500">
                <p class="font-semibold text-gray-900 group-hover:text-white">
                    {{ $storageBin->identifier }}
                </p>
                <p class="text-gray-500 group-hover:text-white">Empty</p>
            </div>
        </div>
    </a>
@endif
