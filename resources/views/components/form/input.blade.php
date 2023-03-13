<x-form.field>
    <x-form.label name="{{ $name }}"></x-form.label>

    <input class="border border-gray-200 p-2 w-full rounded"
           name="{{ $name }}"
           id="{{ $name }}"
        {{ $attributes(['value' => old($name)]) }}
    >

    <x-form.error name="{{ $name }}"></x-form.error>
</x-form.field>
