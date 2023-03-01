<x-layout>
    <main class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 m:py-24 lg:py-10 lg:max-w-none">
        <div class="bg-white rounded-lg h-32 px-4 py-2 flex flex-col">
            <div class="flex align-middle mt-4 h-10">
                <h2 class="text-2xl text-gray-900 font-bold py-2">Warehouse Locations</h2>
                <div class="h-14 w-8 mt-2 ml-2">
                    <a href="create"
                       class="text-blue-500 bg-transparent
                        h-8 text-center font-bold cursor-pointer text-2xl">+</a>
                </div>
            </div>
            <div class="relative flex lg:inline-flex items-center border-b-2 h-10 ml-1">
                <form method="GET" action="#" class="w-full">
                    <input  type="text"
                            name="search"
                            placeholder="Find Warehouse..."
                            class="bg-transparent placeholder-grey font-semibold text-sm w-96 w-full"
                            value="{{ request('search') }}"/>
                </form>
            </div>
        </div>
        <section class="mt-6">
            <div class="lg:grid lg:grid-cols-3 rounded-lg mt-2 gap-x-4 gap-y-4">
                @foreach ($warehouses as $warehouse)
                    <x-warehouse-item :warehouse="$warehouse" style="margin: 10px !important;"></x-warehouse-item>
                @endforeach
            </div>
            {{ $warehouses->links() }}
        </section>
    </main>
</x-layout>
