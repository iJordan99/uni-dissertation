@props(['storage'])

@php
    $maxCapacity = $storage->max_capacity;
    $safety = $maxCapacity * 0.2;
@endphp

@foreach($storage->items as $item)
    @php
        $pivotAmount = $item->pivot->amount;
        $textColorClass = ($pivotAmount < $safety) ? "text-red-400 group-hover:text-white" : (($pivotAmount > $safety) ? "text-green-400 group-hover:text-white" : "text-gray-900");
    @endphp
    <div class="group relative bg-transparent cursor-pointer">
        <div class="relative px-4 py-2 bg-white rounded-lg group-hover:bg-blue-500">
            <p class="font-semibold {{ $textColorClass }}">
                {{ $storage->identifier }}
            </p>
            @if($pivotAmount)
                <div class="{{ $textColorClass }}">
                    <div class="flex text-right justify-between">
                        <p class="group-hover:text-white">{{ $item->name }}</p>
                        <p>
                            {{ $pivotAmount }}
                            <span class="{{ $textColorClass }}"> / {{ $maxCapacity}}</span>
                        </p>
                    </div>
                </div>
            @endif
        </div>
    </div>
@endforeach

@if($storage->items->isEmpty())
    <div class="group relative bg-transparent cursor-pointer">
        <div class="relative px-4 py-2 bg-white rounded-lg group-hover:bg-blue-500">
            <p class="font-semibold text-gray-900 group-hover:text-white">
                {{ $storage->identifier }}
            </p>
            <p class="text-gray-500">Empty</p>
        </div>
    </div>
@endif
