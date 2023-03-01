{{--@props(['storage'])--}}
<div class="group relative bg-transparent cursor-pointer">
    <div class="relative px-4 py-2 bg-white rounded-lg group-hover:bg-blue-500">
        <p class="font-semibold text-gray-900 group-hover:text-white">
            {{ $storage->identifier }}
        </p>
        <div class="group-hover:text-white">
            @foreach($storage->items as $item)
                <div class="flex text-right justify-between">
                    <p class="text-gray-500 group-hover:text-white">{{ $item->name }}</p>
                    <p>{{ $item->pivot->amount }}
                        <span class="text-gray-900 group-hover:text-white"> / {{ $storage->max_capacity }}</span>
                    </p>
                </div>
            @endforeach
        </div>
    </div>
</div>
