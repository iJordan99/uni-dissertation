<x-layout>
    <x-form.layout title="Create Item" action="{{ route('item.create') }}">
        <x-form.input name="name" placeholder="Item name" required></x-form.input>
        <x-form.input name="reference" placeholder="Item reference" required></x-form.input>
        <x-form.input name="weight" type="number" placeholder="Weight (Kg)" required></x-form.input>
        <x-form.input name="height" type="number" placeholder="Height (Cm)" required></x-form.input>
        <x-form.input name="width" type="number" placeholder="Width (Cm)" required></x-form.input>
        <x-form.input name="length" type="number" placeholder="Length (Kg)" required></x-form.input>
        <div x-data="{ checked: false }">
            <x-form.checkbox-input name="perishable" @click="checked = !checked"></x-form.checkbox-input>
            <div x-show="checked">
                <x-form.input name="shelf" type="number" value="0" ></x-form.input>

            </div>
        </div>


        <x-form.button>Create</x-form.button>
    </x-form.layout>
</x-layout>
