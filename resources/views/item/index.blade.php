<x-layout>
    <x-search-header title="Items" route="{{ route('item.create') }}" resource="Items">
        <x-create-icon href="{{ route('item.create')}}" ></x-create-icon>
    </x-search-header>
    <section class="mt-6">
        @if($items->count() > 0)
        <div class="lg:grid lg:grid-cols-4 md:grid md:grid-cols-3 rounded-lg gap-x-4 gap-y-4">
            @foreach ($items as $item)
                <x-item :item="$item" style="margin: 10px !important;"></x-item>
            @endforeach
        </div>
        {{ $items->links() }}
        @else
            <x-empty route="{{ route('item.create') }}"/>
        @endif
    </section>
</x-layout>

