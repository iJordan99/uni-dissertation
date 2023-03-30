<x-form.field>
    <x-form.label name="{{ $name }}"></x-form.label>

    <select x-model="selectedItem" name="{{ $name }}" id="item" class="bg-gray-50 border
        border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500
         block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white
          dark:focus:ring-blue-500 dark:focus:border-blue-500">
        <option selected></option>

        @foreach($options as $option)
            <option value="{{$option->id}}">{{$option->name}}</option>
        @endforeach
    </select>

    <x-form.error name="{{ $name }}"></x-form.error>
</x-form.field>
