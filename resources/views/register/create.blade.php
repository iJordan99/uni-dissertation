@include('partials.head')
<main class="flex w-full h-screen justify-center items-center">
    <div class="w-1/3">
        <x-form.layout title="Register" action="{{ route('register') }}">
            <x-form.input name="name" required></x-form.input>
            <x-form.input name="username" required></x-form.input>
            <x-form.input name="email" type="email" required></x-form.input>
            <x-form.input name="password" type="password" required></x-form.input>
            <x-form.button>Register</x-form.button>
        </x-form.layout>
    </div>
</main>
