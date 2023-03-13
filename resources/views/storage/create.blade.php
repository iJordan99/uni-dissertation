<x-layout>
    <x-form.layout title="Create Storage Bin" action="{{ route('storage.create', ['warehouse' => $warehouse->name]) }}">
        <x-form.input name="identifier"></x-form.input>
        <x-form.input name="capacity"></x-form.input>
        <x-form.input name="replenish"></x-form.input>

        <x-form.button>Create</x-form.button>
    </x-form.layout>
</x-layout>
