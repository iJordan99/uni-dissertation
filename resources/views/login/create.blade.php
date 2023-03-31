@include('partials.head')
<main class="flex flex-col sm:flex-row h-screen items-center justify-center md:p-36 lg:p-0">
    <div class="w-full md:w-full lg:w-1/2 xl:w-1/3">
        <x-form.layout title="Login" action="{{ route('login') }}">
            <x-form.input name="email" type="email" required></x-form.input>
            <x-form.input name="password" type="password" required></x-form.input>
            <p class="flex mt-2 space-x-3 text-sm">Not got an account?
                <a class="underline text-blue-500" href="{{ route('register') }}">Register!</a>
            </p>
            <x-form.button>Log In</x-form.button>
        </x-form.layout>
    </div>
</main>
