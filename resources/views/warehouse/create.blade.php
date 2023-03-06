<x-layout>
    <section>
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="max-w-2xl mx-auto py-16 sm:py-24 lg:py-10 lg:max-w-none">
                <div class="bg-white rounded-lg px-4 py-2 flex flex-col">
                    <div class="flex align-middle mt-4 h-10">
                        <h2 class="text-xl font-bold py-2 text-gray-700 px-1">Create Warehouse Location</h2>
                    </div>
                    <form action="/location" method="POST">
                        @csrf
                        <div class="mt-4 w-4/6">
                            <label class="block mb-2 font-bold text-sm text-gray-700 px-1" for="name">
                                Location Name
                            </label>
                            <input class="border border-gray-400 p-2 w-full rounded-lg"
                                   type="text"
                                   name="name"
                                   id="name"
                                   required
                            >
                        </div>
                        <div class="w-4/6 mt-4">
                            <label class="block mb-2 font-bold text-sm text-gray-700 px-1" for="street">
                                Street
                            </label>
                            <input class="border border-gray-400 p-2 w-full rounded-lg"
                                   type="text"
                                   name="street"
                                   id="street"
                                   required
                            >
                        </div>
                        <div class="w-4/6 mt-4">
                            <label class="block mb-2 font-bold text-sm text-gray-700 px-1" for="city">
                                City
                            </label>
                            <input class="border border-gray-400 p-2 w-full rounded-lg"
                                   type="text"
                                   name="city"
                                   id="city"
                                   required
                            >
                        </div>
                        <div class="w-4/6 mt-4 ">
                            <label class="block mb-2 font-bold text-sm text-gray-700 px-1" for="postcode">
                                Postal Code
                            </label>
                            <input class="border border-gray-400 p-2 w-full rounded-lg"
                                   type="text"
                                   name="postcode"
                                   id="postcode"
                                   required
                            >
                        </div>
                        <div class="mt-4 w-4/6">
                            <label class="block mb-2 font-bold text-sm text-gray-700 px-1" for="country">
                                Country
                            </label>
                            <input class="border border-gray-400 p-2 w-full rounded-lg"
                                   type="text"
                                   name="country"
                                   id="country"
                                   required
                            >
                        </div>
                        <button class="mt-4 bg-transparent hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded">
                            <input type="submit" value="Create"/>
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </section>
</x-layout>
