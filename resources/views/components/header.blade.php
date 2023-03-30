<div class="bg-white rounded-lg h-32 px-4 py-2 flex flex-col">
    <div class="flex align-middle mt-4 h-10 flex-row">
            @if($url != '')
                <h2 class="text-2xl text-gray-900 font-bold py-2 hover:underline hover:text-blue-500">
                    <a href="{{ $url }}">{{ $header }}</a>
                </h2>
            @else
            <h2 class="text-2xl text-gray-900 font-bold py-2">{{$header}}</h2>
            @endif

        <a href="{{ $href }}"
           class="text-blue-500 bg-transparent
                    h-8 text-center font-bold cursor-pointer text-2xl mt-2 ml-2">
            {{ $slot }}
        </a>
    </div>
    <p class="text-gray-500">{{ $subtext }}</p>
</div>
