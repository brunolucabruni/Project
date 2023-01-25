<x-app-layout>
    <x-slot name="header">
        <div class="row">
            <div class="col-8 col-md-6 col-lg-6">
                <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('Nuova presenza') }}
                </h2>
            </div>
            <div class="col-4 col-md-6 col-lg-6 text-right">
                <a class="btn btn-secondary" href="@auth{{route('search')}}@else{{route('dashboard')}}@endauth">Indietro</a>
            </div>
        </div>
    </x-slot>
<div class="card dark:border-gray-700">
    <div class="card-body bg-grey-100 dark:bg-gray-800 dark:text-gray-200">
      <form name="post" id="post" method="post" action="{{ route('posts.store') }}">
       @csrf
        <div class="row">
            <div class="col-12 col-md-6 col-lg-6">
                <div class="form-group">
                    <label for="exampleInputEmail1">Cognome</label>
                    <input type="text" id="cognome" name="cognome" class="form-control dark:bg-gray-700 dark:text-gray-100" value="{{old('cognome')}}" required="true">
                </div>
            </div>
            <div class="col-12 col-md-6 col-lg-6">
                <div class="form-group">
                    <label for="exampleInputEmail1">Nome</label>
                    <input type="text" id="nome" name="nome" class="form-control dark:bg-gray-700 dark:text-gray-100" value="{{old('nome')}}" required="true">
                </div>
            </div>
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">Azienda</label>
            <input type="text" id="azienda" name="azienda" class="form-control dark:bg-gray-700 dark:text-gray-100" value="{{old('azienda')}}" required="true">
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">Motivo visita</label>
            <textarea id="note" name="note" class="form-control dark:bg-gray-700 dark:text-gray-100" value="{{old('note')}}" required="true"></textarea>
        </div>
        <div class="row">
            <div class="col-6 col-md-4 col-lg-4">
                <div class="form-group">
                    <label for="exampleInputEmail1">Data</label>
                    <input type="date" id="data" name="data" class="form-control dark:bg-gray-700 dark:text-gray-100" value="{{old('data', Carbon\Carbon::today()->format('Y-m-d'))}}" required="true">
                </div>
            </div>
            <div class="col-6 col-md-4 col-lg-4">
                <div class="form-group">
                    <label for="exampleInputEmail1">Ora entrata</label>
                    <input type="time" id="ora_e" name="ora_e" class="form-control dark:bg-gray-700 dark:text-gray-100" value="{{old('ora_e', Carbon\Carbon::now()->format('H:i'))}}" required="true">
                </div>
            </div>
            <div class="col-6 col-md-4 col-lg-4">
                <div class="form-group">
                    <label for="exampleInputEmail1">Ora uscita</label>
                    <input type="time" id="ora_u" name="ora_u" class="form-control dark:bg-gray-700 dark:text-gray-100" value="{{old('ora_u', Carbon\Carbon::now()->addHour()->format('H:i'))}}">
                </div>
            </div>
       </div>
        <button class="btn btn-primary">Crea</button>
      </form>
    </div>
  </div>
</x-app-layout>
