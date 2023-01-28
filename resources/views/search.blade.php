<x-app-layout>
    <x-slot name="header">
        <div class="row">
            <div class="col-8 col-md-6 col-lg-6">
                <form action="{{ route('search') }}" method="GET">
                    <div class="row">
                        <div class="col-md-5 col-lg-5">
                            <label for="start">Da data:</label>
                            <input type="date" name="start"  class="form-control dark:bg-gray-700 dark:text-gray-100" value="@if (isset($_GET['start']))<?=$_GET['start']?>@else{{old('data', Carbon\Carbon::today()->format('Y-m-d'))}}@endif"  required/>
                        </div>
                        <div class="col-md-5 col-lg-5">
                            <label for="stop">A data:</label>
                            <input type="date" name="stop"  class="form-control dark:bg-gray-700 dark:text-gray-100" value="@if (isset($_GET['stop']))<?=$_GET['stop']?>@else{{old('data', Carbon\Carbon::today()->format('Y-m-d'))}}@endif"  required/>
                        </div>
                        <div class="col-md-2 col-lg-2">
                            <label>&nbsp;</label>
                            <x-primary-button class="ml-3" type="submit">
                                <i class="fas fa-search"></i>
                            </x-primary-button>
                        </div>
                    </div>
                    <!-- <button type="submit">Search</button> -->
                </form>
            </div>
            <div class="col-4 col-md-6 col-lg-6 text-right ">
                <label>&nbsp;</label>
                <form action="{{route('posts.create')}}" method="GET">
                    <!--
                    {{ csrf_field() }}
                    {{ method_field('GET') }}
                    -->
                    <button class="btn btn-success"><i class="fas fa-calendar-plus"></i></button>
                </form>
            </div>
        </div>
    </x-slot>

    @if (count($posts)>0)
    <!--
    -->

    <x-post-card :posts="$posts"/>

    @else
        <h2 class="text-gray-800 dark:text-gray-200">Nessuna presenza inserita</h2>
    @endif
</x-app-layout>
