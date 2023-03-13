<x-layout>
    <x-form.layout title="Create Warehouse Location" action="{{ route('location.store') }}">
        <x-form.input name="name"></x-form.input>
        <x-form.input name="street"></x-form.input>
        <x-form.input name="city"></x-form.input>
        <x-form.input name="postcode"></x-form.input>
        <x-form.input name="country"></x-form.input>

        <x-form.button>Create</x-form.button>
    </x-form.layout>
</x-layout>
