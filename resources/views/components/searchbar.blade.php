<div class="relative flex lg:inline-flex items-center border-b-2 h-10 ml-1">
    <form method="GET" action="#" class="w-full">
        <input  type="text"
                name="search"
                placeholder="Search {{ $resource }} ..."
                class="bg-transparent placeholder-grey font-semibold text-sm w-96 w-full"
                value="{{ request('search') }}"/>
    </form>
</div>
