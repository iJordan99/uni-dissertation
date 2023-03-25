@props(['item', 'storage'])
<a href="{{route('item.locations', ['item' => $item])}}">
<div class="group relative bg-transparent">
        <div class="relative w-full h-75 bg-white rounded-lg overflow-hidden group-hover:bg-gray-100 sm:aspect-w-2 sm:aspect-h-1 sm:h-64 lg:aspect-w-1 lg:aspect-h-1 flex justify-center items-center ">
    {{--        https://iconscout.com/icon/box-package-parcels-logistic-delivery-packed-shipping-11--}}
                <img src="{{ asset('Images/box.svg') }}" alt="" style="width: 35%">
        </div>
    <div class="mt-6 text-base font-semibold text-gray-900">
        @if($item->pivot)
            <h3>
                <span class="absolute inset-0"></span>
                <p>[{{ $item->pivot->quantity }}] {{ ucwords($item->name) }}</p>
            </h3>
        @else
            <p>{{ ucwords($item->name) }}</p>
        @endif
    </div>
    <div class="flex justify-between text-m text-gray-500">
        <h3>
            <span class="absolute inset-0"></span>
            {{ $item->reference }}
        </h3>
    </div>
</div>
</a>
