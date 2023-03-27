<x-layout>
    <x-header header="{{ ucwords($storage->identifier) }}"
              href="{{ route('storage.settings', ['storage' => $storage]) }}"
              url=""
              subtext="{{ ucwords($warehouse->name) }}">
        <x-settings-icon></x-settings-icon>
    </x-header>

    <section class="mt-6">
        @if($items->count() == 1)
        <div class="lg:grid lg:grid-cols-4 rounded-lg gap-x-4 gap-y-10">
            @foreach ($items as $item)
                <x-item :item="$item" :storage="$storage"></x-item>
            @endforeach
        </div>
        <div class="flex flex-row gap-x-3">
            <x-form.storage-remove-item-header>
                <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded"
                        @click="removeItemModel = true">-</button>
                            <x-form.storage-remove-item-body>
                                <x-form.layout title="Remove Items" action="{{ route('storage.item.remove', ['storage' => $storage]) }}">
                                    <input type="numeric" name="item" value="{{$item->id}}" hidden>
                                    <x-form.input name="quantity" type="number" required></x-form.input>
                                    <x-form.button>Remove Quantity</x-form.button>
                                </x-form.layout>
                            </x-form.storage-remove-item-body>
            </x-form.storage-remove-item-header>
            <x-form.storage-add-item-header>
                <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded"
                        @click="addItemModel = true">+</button>
                            <x-form.storage-add-item-body>
                                <x-form.layout title="Add Items" action="{{ route('storage.item.add', ['storage' => $storage]) }}">
                                    <input type="numeric" name="item" value="{{$item->id}}" hidden>
                                    <x-form.input name="quantity" type="number" required></x-form.input>
                                    <x-form.button>Add Quantity</x-form.button>
                                </x-form.layout>
                            </x-form.storage-add-item-body>
            </x-form.storage-add-item-header>
        </div>
        @else
            <div class="w-full h-80 bg-blue-200 flex justify-center items-center rounded-lg text-blue-400 flex-col">
                <h1 class="text-2xl">Empty</h1>
                <x-form.storage-add-item-header>
                    <a class="text-blue-500 bg-transparent h-8 text-center font-bold cursor-pointer text-2xl"
                       @click="addItemModel = true">+</a>
                    <x-form.storage-add-item-body>
                        <x-form.layout title="Add Items" action="{{ route('storage.item.add', [
                        'storage' => $storage,
                    ]) }}">
                            <x-form.dropdown name="item" selected="Choose an item to add" :options="$items" />
                            <x-form.input name="quantity" type="number" required></x-form.input>
                            <x-form.button>Add Item</x-form.button>
                        </x-form.layout>
                    </x-form.storage-add-item-body>
                </x-form.storage-add-item-header>
            </div>
        @endif
    </section>
</x-layout>
