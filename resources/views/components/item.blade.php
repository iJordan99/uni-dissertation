@props(['item'])
<div class="group relative bg-transparent">
    <div class="relative w-50 h-75 bg-white rounded-lg overflow-hidden group-hover:bg-gray-100 sm:aspect-w-2 sm:aspect-h-1 sm:h-64 lg:aspect-w-1 lg:aspect-h-1 flex justify-center items-center ">
{{--        https://iconscout.com/icon/box-package-parcels-logistic-delivery-packed-shipping-11--}}
            <img src="{{ asset('Images/box.svg') }}" alt="" style="width: 35%">
    </div>
    <p class="mt-6 text-base font-semibold text-gray-900">
        {{ $item->reference }}
    </p>
    <h3 class="text-sm text-gray-500">
        <a href="">
            <span class="absolute inset-0"></span>
            {{ $item->name }}
        </a>
    </h3>
</div>
