<x-layout>
    <x-header header="{{ ucwords($storage->identifier) }}"
              subtext="{{ $storage->warehouse->name }}"
              url="{{ route('storage.show', ['storage' => $storage]) }}"
              href=""/>

    <section class="mt-6">
        <x-form.layout title="Settings" action="{{ route('storage.update', ['storage' => $storage->identifier]) }}">
            <x-form.input name="identifier" value="{{ $storage->identifier }}" disabled></x-form.input>
            <x-form.input name="capacity" value="{{ $storage->capacity }}"></x-form.input>
            <x-form.input name="replenish" value="{{ $storage->replenish }}"></x-form.input>

            <x-form.button>Update</x-form.button>
        </x-form.layout>
    </section>

</x-layout>
