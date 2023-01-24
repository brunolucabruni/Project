<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            <form action="{{ route('search') }}" method="GET">
                <input type="date" name="search" class="dark:bg-gray-700 dark:text-gray-100" value="@if (isset($_GET['search']))<?=$_GET['search']?>@else{{old('data', Carbon\Carbon::today()->format('Y-m-d'))}}@endif"  required/>
                <button type="submit">Search</button>
            </form>
        </h2>
    </x-slot>

    @if (count($posts)>0)
    <!--
    -->

    <x-post-card :posts="$posts"/>

    @else
        <h2 class="text-gray-800 dark:text-gray-200">Nessuna presenza inserita</h2>
    @endif
</x-app-layout>
