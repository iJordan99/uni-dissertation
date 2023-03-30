<x-layout>
    <x-header header="{{ ucwords($item->name) }}"
              href="{{ route('item.settings', ['item' => $item->name]) }}"
              url=""
              subtext="Locations">

        <x-settings-icon></x-settings-icon>

    </x-header>

{{--    https://flowbite.com/docs/components/tables/--}}
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
                    Stocked
                </th>
                <th scope="col" class="px-6 py-3">
                    restocked
                </th>
                <th scope="col" class="px-6 py-3">
                    Quantity
                </th>
                <th scope="col" class="px-6 py-3">
                    Purchase value
                </th>
                <th scope="col" class="px-6 py-3">
                    Market value
                </th>
                @if($item->perishable == 1)
                    <th scope="col" class="py-3 px-2">
                        expires
                    </th>
                @endif
            </tr>
            </thead>
            <tbody>
            @foreach ($storages as $storage)
                @php
                    $warehouse = $storage->warehouse->name;
                    $sku = $storage->identifier;
                    $quantity = $storage->pivot->quantity;
                    $restocked ='';
                    $stocked ='';
                    $value = $quantity * $item->cost;
                    $marketVal = $quantity * $item->price;
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
                    <th scope="row" class="px-6 py-4 font-medium whitespace-nowrap hover:underline">
                        <a href="{{ route('warehouse.show', ['warehouse' => $warehouse]) }}">{{ $warehouse }}</a>
                    </th>
                    <td class="px-6 py-4 hover:underline">
                        <a href="{{ route('storage.show', ['storage' => $sku]) }}"> {{ $sku }}</a>
                    </td>
                    <td class="px-6 py-4">
                        {{ $stocked }}
                    </td>
                    <td class="px-6 py-4">
                        {{ $restocked }}
                    </td>
                    <td class="px-6 py-4">
                        {{ $quantity }} / {{ $storage->capacity }}
                    </td>
                    <td class="px-6 py-4">
                        {{ $value }}
                    </td>
                    <td class="px-6 py-4">
                        {{ $marketVal }}
                    </td>
                    @if ($item->perishable == 1)
                        @php
                            $shelfDate = Carbon\Carbon::parse($storage->pivot->created_at)->addDays($item->shelf);
                            $expiryClass = $shelfDate->isPast() ? 'bg-red-200 text-red-700' : ($shelfDate->diffInDays() <= 0 ? 'bg-orange-200 text-orange-700' : 'bg-green-200 text-green-700');
                        @endphp
                        <td class="{{ $expiryClass }} px-2">
                            {{ $shelfDate->format('d-m-Y') }}
                        </td>
                    @endif
                </tr>
            @endforeach
            </tbody>
            <tfoot>
            <tr class="font-semibold font-medium text-gray-900 bg-white">
                <th scope="row" class="px-6 py-3">Total</th>
                <td class="px-6 py-4"></td>
                <td class="px-6 py-4"></td>
                <td class="px-6 py-4"></td>
                <td class="px-6 py-4">{{ $storages->pluck('pivot.quantity')->sum() }}</td>
                <td class="px-6 py-3">{{ $storages->pluck('pivot.quantity')->sum() * $item->cost}}</td>
                <td class="px-6 py-3">{{ $storages->pluck('pivot.quantity')->sum() * $item->price}}</td>
                @if ($item->perishable == 1)
                    <td class="px-6 py-4"></td>
                @endif
            </tr>
            </tfoot>
        </table>
    </div>
</x-layout>

