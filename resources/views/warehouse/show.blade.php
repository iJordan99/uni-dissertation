<x-layout>
    <x-search-header title=" {{ ucwords($warehouse->name) }} Storages"
                     route="{{ route('warehouse.show', ['warehouse' => $warehouse]) }}"
                     resource="Storages">
    </x-search-header>

    <section class="px-2 py-2 mt-6 flex flex-row">
        <h2 class="text-xl text-gray-500 font-bold py-2">Storage Bins</h2>
        <div class="h-14 w-8 mt-1 ml-2">
            <a href="{{ route('storage.create', ['warehouse' => $warehouse->name]) }}"
               class="text-blue-500 bg-transparent
                    h-8 text-center font-bold cursor-pointer text-2xl">+</a>
        </div>
    </section>


    <section>
        @if($storages->count() > 0)
        <div class="lg:grid lg:grid-cols-5 xl:grid-cols-6 md:grid md:grid-cols-3 rounded-lg gap-x-4 gap-y-4">
            @foreach ($storages as $storage)
                <x-storage :storage="$storage" :warehouse="$warehouse"/>
            @endforeach
        </div>
        {{ $storages->links() }}
        @else
        <x-empty route="{{ route('storage.create', ['warehouse' => $warehouse->name]) }}"/>
        @endif
    </section>
</x-layout>

