<x-form.field>
    <x-form.label name="{{ $name }}"></x-form.label>

    <input class="border border-gray-200 p-2 rounded ml-1"
           type="checkbox"
           name="{{ $name }}"
           id="{{ $name }}"
           value="1"
        {{ $attributes->merge(['checked' => old($name)]) }}>

    <x-form.error name="{{ $name }}"></x-form.error>
</x-form.field>
