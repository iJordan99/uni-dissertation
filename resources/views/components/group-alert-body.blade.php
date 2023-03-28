<p class="font-bold">{{ ucwords(str_replace('_', ' ' , $alert->type)) . ' : ' }}
    <a class="hover:underline text-blue-500 hover:text-blue-300"
       href="{{ route('storage.show',['storage' => $alert->storage]) }}">
        {{ $alert->storage->identifier }}
    </a>
    <a class="hover:underline text-blue-500 hover:text-blue-300"
        href="{{ route('item.locations', ['item' => $alert->item]) }}">
        {{ $alert->item->name }}
    </a>
</p>
