@props(['warehouse'])
<div class="group relative bg-transparent">
    <div class="relative w-full h-80 bg-white rounded-lg overflow-hidden group-hover:bg-gray-100 sm:aspect-w-2 sm:aspect-h-1 sm:h-64 lg:aspect-w-1 lg:aspect-h-1 flex justify-center">
    {{-- image src = https://iconscout.com/icon/warehouse-1450805 --}}
        <img src="{{ asset('Images/warehouse.svg') }}" alt="" style="max-height: 100%" >
    </div>
    <p class="mt-6 text-base font-semibold text-gray-900">
        {{ $warehouse->name }}
    </p>
  <h3 class="text-sm text-gray-500">
    <a href="{{ route('warehouse.show', ['warehouse' => $warehouse->uuid]) }}">
      <span class="absolute inset-0"></span>
        {{ $warehouse->location }}
    </a>
  </h3>
</div>
