<div class="bg-white rounded-lg h-32 px-4 py-2 flex flex-col">
    <div class="flex align-middle mt-4 h-10">
        <h2 class="text-2xl text-gray-900 font-bold py-2">{{ $title }}</h2>
        <div class="h-14 w-8 mt-2 ml-2">
            {{ $slot }}
        </div>
    </div>
    <x-search resource="{{$resource}}"></x-search>
</div>
