@include('partials.head')
<section class="px-6 py-8">
    <main class="max-w-lg mx-auto mt-10 bg-white rounded-lg px-4 py-2">
        <form action="{{ route('login') }}" method="post">
            <div class="flex align-middle mt-4 h-10">
                <h2 class="text-xl font-bold py-2 text-gray-700 px-1 uppercase">Login</h2>
            </div>
            @csrf
            <div class="mt-4">
                <label class="uppercase block mb-2 font-bold text-sm text-gray-700 px-1" for="email">
                    email
                </label>
                <input class="border border-gray-400 p-2 w-full rounded-lg"
                       type="email"
                       name="email"
                       id="email"
                       value="{{ old('email') }}"
                       required
                >
                @error('email')
                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mt-4">
                <label class="uppercase block mb-2 font-bold text-sm text-gray-700 px-1" for="password">
                    password
                </label>
                <input class="border border-gray-400 p-2 w-full rounded-lg"
                       type="password"
                       name="password"
                       id="password"
                       required
                >
                @error('password')
                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>
            <button class="mt-4 bg-transparent hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded">
                <input type="submit" value="Login"/>
            </button>
        </form>
    </main>
</section>
