<x-layout>
    <x-search-header title="Alerts" route="{{ route('location.create') }}" resource="Alerts"/>
    <section class="mt-6">
        <div class="bg-white rounded-lg p-4 mt-4 max-h-screen overflow-y-scroll">
            @foreach($alerts as $alert)
                @php
                    $class = '';
                    if (str_starts_with($alert->type, 'created_') || $alert->type === 'increased_storage_item_quantity' |
                        str_starts_with($alert->type,'added_'))
                    {
                        $class = 'bg-green-100 border-t-4 border-green-500 rounded-b text-green-900 px-4 py-3 shadow-md m-4';
                    }
                    elseif (str_starts_with($alert->type, 'deleted_') || $alert->type === 'reduced_storage_item_quantity')
                    {
                        $class = 'bg-red-100 border-t-4 border-red-500 rounded-b text-red-900 px-4 py-3 shadow-md m-4';
                    }
                    elseif (str_starts_with($alert->type, 'updated_'))
                    {
                        $class = 'bg-blue-100 border-t-4 border-blue-500 rounded-b text-blue-900 px-4 py-3 shadow-md m-4';
                    }
                    elseif($alert->type == 'reorder_item' || $alert->type == 'storage_reorder_item')
                    {
                        $class = 'bg-purple-100 border-t-4 border-purple-500 rounded-b text-purple-900 px-4 py-3 shadow-md m-4';
                    }
                @endphp
                <x-alert :alert="$alert" :class="$class"></x-alert>
            @endforeach
            {{ $alerts->links() }}
        </div>
    </section>

</x-layout>
