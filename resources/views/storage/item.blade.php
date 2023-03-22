<x-layout>
    <x-header header="{{ ucwords($item->name) }}"
              href="/settings/warehouse/storage/{{$item->name}}"
              subtext="Total : {{ $storages->pluck('pivot.quantity')->sum() }}"/>


    <div class="relative overflow-x-auto shadow-md sm:rounded-lg mt-4" >
        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="px-6 py-3">
                    Warehouse
                </th>
                <th scope="col" class="px-6 py-3">
                    Storage
                </th>
                <th scope="col" class="px-6 py-3">
                    Quantity
                </th>
                <th scope="col" class="px-6 py-3">
                    Restocked
                </th>
            </tr>
            </thead>
            <tbody>
            @foreach ($storages as $storage)
                @php
                    $warehouse = $storage->warehouse->name;
                    $identifier = $storage->identifier;
                    $quantity = $storage->pivot->quantity;
                    $restocked ='';
                    if ($storage->pivot->updated_at)
                    {
                        $restocked = $storage->pivot->updated_at->format('d-m-y');
                    }
                    $safety = $storage->capacity * $storage->replenish/100;
                    $class = ($quantity <= $safety) ? "bg-red-200 text-red-700 hover:bg-red-300" : "bg-green-200 text-green-700 hover:bg-green-300";
                @endphp
                <tr class="{{ $class }} cursor-pointer">
                    <th scope="row" class="px-6 py-4 font-medium whitespace-nowrap">
                        {{ $warehouse }}
                    </th>
                    <td class="px-6 py-4">
                        {{ $identifier }}
                    </td>
                    <td class="px-6 py-4">
                        {{ $quantity }}
                    </td>
                    <td class="px-6 py-4">
                        {{ $restocked }}
                    </td>
                </tr>

            @endforeach
            </tbody>
        </table>
    </div>
</x-layout>

