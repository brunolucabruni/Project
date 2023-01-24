<x-guest-layout>
    @if (Route::has('login'))
        <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
            @auth
                <a href="{{ url('/dashboard') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Dashboard</a>
            @else
                <a href="{{ route('login') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Log in</a>

                @if (Route::has('register'))
                    <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 dark:text-gray-500 underline">Register</a>
                @endif
            @endauth
        </div>
    @endif
    <x-slot name="header">
        <div class="row">
            <div class="col-8 col-md-6 col-lg-6">
                <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('Presenze di oggi') }}
                </h2>
            </div>
        </div>
    </x-slot>

    @if (count($posts)>0)
    <!--
    -->

    <x-post-card-home :posts="$posts"/>

    @else
        <h2 class="text-gray-800 dark:text-gray-200">Nessuna presenza inserita</h2>
    @endif
</x-guest-layout>
