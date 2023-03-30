<x-layout>
    <x-header header="{{ ucwords($item->name) }}"
              subtext=""
              url="{{ route('item.locations', ['item' => $item]) }}"
              href=""/>

    <section class="mt-6">
        <x-form.layout title="Settings" action="{{ route('item.update', ['item' => $item]) }}">
            <x-form.input class="cursor-not-allowed bg-gray-200" name="name" placeholder="Item name" value="{{ $item->name }}" disabled/>
            <x-form.input name="sku" placeholder="Item sku" value="{{ $item->sku }}" disabled/>
            <x-form.input name="weight" type="number" value="{{ $item->weight }}"/>
            <x-form.input name="height" type="number" value="{{ $item->height }}"/>
            <x-form.input name="width" type="number"  value="{{ $item->width }}"/>
            <x-form.input name="length" type="number" value="{{ $item->length }}"/>
            <div x-data="{ checked: {{ $item->perishable ? 'true' : 'false' }} }">
                <x-form.checkbox-input name="perishable" {{ $item->perishable ? 'checked' : '' }} disabled/>
                <div x-show="checked">
                    <x-form.input name="shelf" type="number" value="{{ $item->perishable }}"/>
                </div>
            </div>
            <x-form.input name="reorder" value="{{ $item->reorder }}"/>
            <x-form.input name="cost" value="{{ $item->cost }}"/>
            <x-form.input name="price" value="{{$item->price}}"/>
{{--            <x-form.input name="{{ str_replace('_', ' ' ,'selling_price')}}" value="{{$item->selling_price}}"/>--}}
            <x-form.button>Update</x-form.button>
        </x-form.layout>
    </section>
</x-layout>
