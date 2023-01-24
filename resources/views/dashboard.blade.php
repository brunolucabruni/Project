<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
        {{ __('Presenze di oggi') }}
        </h2>
    </x-slot>

    @if (count($posts)>0)
    <!--
    -->

    <x-post-card-home :posts="$posts"/>

    @else
        <h2 class="text-gray-800 dark:text-gray-200">Nessuna presenza inserita</h2>
    @endif
</x-app-layout>
