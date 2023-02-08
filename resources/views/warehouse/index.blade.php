<x-layout>

    <div>
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="max-w-2xl mx-auto py-16 sm:py-24 lg:py-10 lg:max-w-none">
                <div class="bg-white rounded-lg h-14 px-4 py-2 flex justify-between">
                    <h2 class="text-3xl text-gray-800 font-bold">Locations</h2>
                    {{-- https://iconscout.com/icon/add-insert-plus-new-tag --}}
                    <button class="flex justify-center text-gray-400 hover:text-gray-600 text-3xl">
                        +
                    </button>
                </div>
        
                <div class="mt-6 space-y-12 lg:space-y-0 lg:grid lg:grid-cols-3 lg:gap-x-6">
                    

                    @foreach ($warehouses as $warehouse)
						<x-warehouse-item :warehouse="$warehouse"/>
					@endforeach
        
        
                

                
                </div>
            </div>
        </div>
    
</x-layout>

