<div class="bg-white rounded-lg h-fit px-4 py-2 w-full">
    <div class="flex align-middle mt-4 h-10">
        <h2 class="text-xl font-bold py-2 text-gray-700 px-1">{{ $title }}</h2>
    </div>
    <form action="{{ $action }}" method="POST">
        @csrf
        {{ $slot }}
    </form>
</div>
