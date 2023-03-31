<x-layout>
    <x-form.layout title="Create Item" action="{{ route('item.create') }}">
        <x-form.input name="name" placeholder="Item name" required></x-form.input>
        <x-form.input name="sku" placeholder="Item sku" required></x-form.input>
        <x-form.input name="weight"  placeholder="Weight (Kg)" required></x-form.input>
        <x-form.input name="height"  placeholder="Height (Cm)" required></x-form.input>
        <x-form.input name="width"  placeholder="Width (Cm)" required></x-form.input>
        <x-form.input name="length"  placeholder="Length (Kg)" required></x-form.input>
        <div x-data="{ checked: false }">
            <x-form.checkbox-input name="perishable" @click="checked = !checked"></x-form.checkbox-input>
            <div x-show="checked">
                <x-form.input name="shelf" type="number" value="0" ></x-form.input>

            </div>
        </div>
        <x-form.input name="reorder" placeholder="Reorder amount"/>
        <x-form.input name="cost" placeholder="Item cost"/>
        <x-form.input name="price"  placeholder="Item price"/>
        <x-form.button>Create</x-form.button>
    </x-form.layout>
</x-layout>
