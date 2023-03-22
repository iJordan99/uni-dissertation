<div class="fixed inset-0 z-30 flex items-center justify-center overflow-auto bg-black bg-opacity-50"
     x-show="showModal">
    <div class="w-1/2 text-left bg-white rounded shadow-lg" @click.away="showModal = false"
         x-transition:enter="motion-safe:ease-out duration-300"
         x-transition:enter-start="opacity-0 scale-90"
         x-transition:enter-end="opacity-100 scale-100">
        {{ $slot }}
    </div>
</div>

