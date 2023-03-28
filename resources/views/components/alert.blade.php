<div class="{{ $class  }}" role="alert">
    <div class="flex flex-row">
        <div class="w-8">
            <form method="post" action="{{ route('alert.remove', ['alert' => $alert]) }}">
                @csrf
                <button type="submit" class="mt-1">
                    <span>
                        <svg class="fill-current h-6 w-6 text-red-500" role="button" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><title>Close</title><path d="M14.348 14.849a1.2 1.2 0 0 1-1.697 0L10 11.819l-2.651 3.029a1.2 1.2 0 1 1-1.697-1.697l2.758-3.15-2.759-3.152a1.2 1.2 0 1 1 1.697-1.697L10 8.183l2.651-3.031a1.2 1.2 0 1 1 1.697 1.697l-2.758 3.152 2.758 3.15a1.2 1.2 0 0 1 0 1.698z"/></svg>
                  </span>
                </button>
            </form>
        </div>
        <div class="w-full">
            @if($alert->warehouse)
                <x-alert-body alert="{{ ucwords(str_replace('_', ' ' , $alert->type)) . ' : ' }}"
                            href="{{ route('warehouse.show', ['warehouse' => $alert->warehouse]) }}"
                            name="{{ ucwords($alert->warehouse->name) }}"/>
            @endif
            @if($alert->storage && !$alert->item)
                <x-alert-body alert="{{ ucwords(str_replace('_', ' ' , $alert->type)) . ' : ' }}"
                              href="{{ route('storage.show', ['storage' => $alert->storage]) }}"
                              name="{{ ucwords($alert->storage->identifier) }}"/>
            @endif
            @if($alert->item && !$alert->storage)
                <x-alert-body alert="{{ ucwords(str_replace('_', ' ' , $alert->type)) . ' : ' }}"
                              href="{{ route('item.locations', ['item' => $alert->item]) }}"
                              name="{{ ucwords($alert->item->name) }}"/>
            @endif
            @if($alert->storage && $alert->item)
                <x-group-alert-body :alert="$alert"/>
            @endif
            <p>[{{ $alert->created_at->format('d-m-Y H:i') }}]</p>
        </div>
        <div class="flex justify-end mt-2">
            {{ $alert->user->username }}
        </div>
    </div>
</div>


