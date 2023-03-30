<x-form.field>
    <x-form.label name="{{ $name }}"></x-form.label>

    <input class="border border-gray-200 p-2 w-full rounded
           @if($attributes->has('disabled')) bg-gray-200 opacity-50 cursor-not-allowed
           @else focus:border-blue-500 focus:ring-1 focus:ring-blue-500 focus:outline-none
           @endif"
           name="{{ $name }}"
           id="{{ $name }}"
        {{ $attributes(['value' => old($name)]) }}
    >

    <x-form.error name="{{ $name }}"></x-form.error>
</x-form.field>
