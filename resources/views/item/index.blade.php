<x-layout>
    <x-header title="Items" route="{{ route('item.create') }}" resource="Items">
        <x-header-create route="{{ route('item.create')}}" ></x-header-create>
    </x-header>
    <section class="mt-6">
        <div class="lg:grid lg:grid-cols-3 rounded-lg mt-2 gap-x-4 gap-y-4">
            @foreach ($items as $item)
                <x-item :item="$item" style="margin: 10px !important;"></x-item>
            @endforeach
        </div>
        {{ $items->links() }}
</section>
</x-layout>

