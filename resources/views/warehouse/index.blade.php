<x-layout>
    <x-search-header title="Warehouse Locations" route="{{ route('location.create') }}" resource="Warehouse locations">
        <x-create-icon href="{{ route('location.create')}}"></x-create-icon>
    </x-search-header>

    <section class="mt-6">
        @if($warehouses->count() > 0)
        <div class="lg:grid lg:grid-cols-4 md:grid md:grid-cols-3 rounded-lg mt-2 gap-4">
            @foreach ($warehouses as $warehouse)
                <x-warehouse-item :warehouse="$warehouse" style="margin: 10px !important;"></x-warehouse-item>
            @endforeach
        </div>
        {{ $warehouses->links() }}
        @else
           <x-empty route="{{ route('location.create') }}"/>
        @endif
    </section>
</x-layout>
