@include('partials.head')
<main class="w-4/12 mx-auto">
    <x-form.layout title="Login" action="{{ route('login') }}">
        <x-form.input name="email" type="email" required></x-form.input>
        <x-form.input name="password" type="password" required></x-form.input>
        <x-form.button>Log In</x-form.button>
    </x-form.layout>
</main>
