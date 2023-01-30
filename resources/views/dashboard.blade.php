<x-app-layout>
    <x-slot name="header">

        <div class="row">
            <div class="col-12 col-md-9 col-lg-9">
                <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('Presenze di oggi') }}
                </h2>
            </div>
            <div class="col-12 col-md-3 col-lg-3 text-right ">
                <form action="{{route('posts.create')}}" method="GET">
                    <!--
                    {{ csrf_field() }}
                    {{ method_field('GET') }}
                    -->
                    <button class="btn btn-success form-control"><i class="fas fa-calendar-plus"></i></button>
                </form>
            </div>
        </div>
    </x-slot>

    @if (count($posts)>0)
    <!--
    -->

    @auth
    <x-post-card :posts="$posts"/>
    @else
    <x-post-card-home :posts="$posts"/>
    @endauth
    @else
        <h2 class="text-gray-800 dark:text-gray-200">Nessuna presenza inserita</h2>
    @endif
</x-app-layout>
