<x-layout>
    <x-form.layout title="Create Storage Bin" action="{{ route('storage.create', ['warehouse' => $warehouse->uuid]) }}">
        <x-form.input name="Identifier"></x-form.input>
        <x-form.input name="Max Capacity"></x-form.input>
        <x-form.input name="Replenishment Percent"></x-form.input>

        <x-form.button>Create</x-form.button>
    </x-form.layout>
</x-layout>
