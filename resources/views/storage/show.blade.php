<x-layout>
    <x-header header="{{ ucwords($storage->identifier) }}"
              href="/settings/warehouse/storagebin/{{$storage->identifier}}"
              subtext="{{ ucwords($warehouse->name) }}"/>

    <section class="px-2 py-2 mt-6 flex flex-row">
        <h2 class="text-xl text-gray-500 font-bold py-2">Items</h2>
        <x-form.modal-form-header>
            <a class="text-blue-500 bg-transparent h-8 text-center font-bold cursor-pointer text-2xl"
               @click="showModal = true">+</a>
            <x-form.modal-form-body>
                <x-form.layout title="Add Items" action="{{ route('storage.item.add', [
                        'storage' => $storage,
                    ]) }}">

                    <x-form.dropdown name="item" selected="Choose an item to add" :options="$items"/>
                    <x-form.input name="quantity" type="number" required></x-form.input>
                    <x-form.button>Add Item</x-form.button>
                </x-form.layout>
            </x-form.modal-form-body>
        </x-form.modal-form-header>
    </section>

    <main>
        <div class="lg:grid lg:grid-cols-4 rounded-lg gap-x-4 gap-y-10">
            @foreach ($storage->items as $item)
                <x-item :item="$item" :storage="$storage"></x-item>
            @endforeach
        </div>
    </main>

</x-layout>
