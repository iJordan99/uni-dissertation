<x-layout>
    <x-header header="{{ ucwords($item->name) }}"
              href="/settings/warehouse/storage/{{$item->name}}"
              subtext="Total : {{ $storages->pluck('pivot.quantity')->sum() }}"/>


    <div class="relative overflow-x-auto shadow-md sm:rounded-lg mt-4">
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
                    Stocked
                </th>
                <th scope="col" class="px-6 py-3">
                    restocked
                </th>
                @if($item->perishable == 1)
                    <th scope="col" class="py-3 text-right">
                        expires
                    </th>
                @endif
            </tr>
            </thead>
            <tbody>
            @foreach ($storages as $storage)
                @php
                    $warehouse = $storage->warehouse->name;
                    $identifier = $storage->identifier;
                    $quantity = $storage->pivot->quantity;
                    $restocked ='';
                    $stocked ='';
                    if ($storage->pivot->created_at)
                    {
                        $shelfDate = date_add($storage->pivot->created_at,new DateInterval('P' . $item->shelf . 'D'))->format('d-m-y');
                        $stocked = $storage->pivot->created_at->format('d-m-Y');
                    }
                    if ($storage->pivot->updated_at)
                    {
                        $restocked = $storage->pivot->updated_at->format('d-m-Y');
                    }

                    $safety = $storage->capacity * $storage->replenish/100;
                    $quantityClass = ($quantity <= $safety) ? "bg-red-200 text-red-700 hover:bg-red-300" : "bg-green-200 text-green-700 hover:bg-green-300";

                @endphp
                <tr class="{{ $quantityClass }} cursor-pointer">
                    <th scope="row" class="px-6 py-4 font-medium whitespace-nowrap">
                        <a href="{{ route('warehouse.show', ['warehouse' => $warehouse]) }}">{{ $warehouse }}</a>
                    </th>
                    <td class="px-6 py-4">
                        <a href="{{ route('storage.show', ['storage' => $identifier]) }}"> {{ $identifier }}</a>
                    </td>
                    <td class="px-6 py-4">
                        {{ $quantity }}
                    </td>
                    <td class="px-6 py-4">
                        {{ $stocked }}
                    </td>
                    <td class="px-6 py-4">
                        {{ $restocked }}
                    </td>
                    @if ($item->perishable == 1)
                        @php
                            $shelfDate = Carbon\Carbon::parse($storage->pivot->created_at)->addDays($item->shelf);
                            $expiryClass = $shelfDate->isPast() ? 'bg-red-200 text-red-700' : ($shelfDate->diffInDays() <= 7 ? 'bg-orange-200 text-orange-700' : 'bg-green-200 text-green-700');
                        @endphp
                        <td class="{{ $expiryClass }} text-right">
                            {{ $shelfDate->format('d-m-Y') }}
                        </td>
                    @endif
                </tr>

            @endforeach
            </tbody>
        </table>
    </div>
</x-layout>

