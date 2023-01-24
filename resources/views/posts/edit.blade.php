<x-app-layout>
    <x-slot name="header">
        <div class="row">
            <div class="col-8 col-md-6 col-lg-6">
                <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('Modifica presenza') }}
                </h2>
            </div>
            <div class="col-4 col-md-6 col-lg-6 text-right">
                <a class="btn btn-secondary" href="{{route('posts.index')}}">Indietro</a>
            </div>
        </div>
    </x-slot>
    <div class="card dark:border-gray-700">
        <div class="card-body dark:bg-gray-800 dark:text-gray-100">
            <form name="post" id="post" method="post" action="{{ route('posts.update', $post->id) }}">
        @csrf
        @method('PUT')
                <div class="form-group">
                    <label for="exampleInputEmail1">Cognome</label>
                    <input type="text" id="cognome" name="cognome" class="form-control dark:bg-gray-700 dark:text-gray-100" value="{{ old('cognome',$post->cognome) }}" required="true">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Nome</label>
                    <input type="text" id="nome" name="nome" class="form-control dark:bg-gray-700 dark:text-gray-100" value="{{ old('nome',$post->nome) }}" required="true">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Azienda</label>
                    <input type="text" id="azienda" name="azienda" class="form-control dark:bg-gray-700 dark:text-gray-100" value="{{ old('azienda',$post->azienda) }}" required="true">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Motivo visita</label>
                    <textarea id="note" name="note" class="form-control dark:bg-gray-700 dark:text-gray-100" required="true">{{ old('note',$post->note) }}</textarea>
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Data</label>
                    <input type="date" id="data" name="data" class="form-control dark:bg-gray-700 dark:text-gray-100" value="{{ old('data',$post->data) }}" required="true">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Ora entrata</label>
                    <input type="time" id="ora_e" name="ora_e" class="form-control dark:bg-gray-700 dark:text-gray-100" value="{{ old('ora_e',$post->ora_e) }}" required="true">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Ora uscita</label>
                    <input type="time" id="ora_u" name="ora_u" class="form-control dark:bg-gray-700 dark:text-gray-100" value="{{old('ora_u', ($post->ora_u==null)?Carbon\Carbon::now()->format('H:i') : $post->ora_u)}}">
                </div>
                <button class="btn btn-primary">Modifica</button>
            </form>
        </div>
    </div>
</x-app-layout>
