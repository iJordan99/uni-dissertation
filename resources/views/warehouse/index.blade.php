<x-layout>
    <x-header title="Warehouse Locations" route="{{ route('location.create') }}" resource="Warehouse locations">
        <x-header-create route="{{ route('location.create')}}"></x-header-create>
    </x-header>

    <section class="mt-6">
        <div class="lg:grid lg:grid-cols-3 rounded-lg mt-2 gap-x-4 gap-y-4">
            @foreach ($warehouses as $warehouse)
                <x-warehouse-item :warehouse="$warehouse" style="margin: 10px !important;"></x-warehouse-item>
            @endforeach
        </div>
        {{ $warehouses->links() }}
    </section>
</x-layout>
