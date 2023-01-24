<div style="overflow:scroll">
    <table class="table table-striped table-hover table-bordered dark:text-gray-200">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Data</th>
            <th scope="col">Persona</th>
            <th scope="col">Azienda</th>
            <th scope="col">Motivo</th>
            <th scope="col">Ora [E]</th>
            <th scope="col">Ora [U]</th>
            <th scope="col" colspan="2">&nbsp;</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($posts as $post)
            <tr>
                <td>{{ $loop->index + 1 }}</td>
                <td>{{ $post->data }}</td>
                <td>{{ $post->cognome }} {{ $post->nome }}</td>
                <td>{{ $post->azienda }}</td>
                <td>{{ $post->note }}</td>
                <td>{{ $post->ora_e }}</td>
                <td>{{ $post->ora_u }}</td>
                <td style="text-align:center">
                    <form action="{{route('posts.destroy',$post->id)}}" method="POST" onsubmit="return confirm('Sicuro di voler eliminare questa presenza?');">
                        {{ csrf_field() }}
                        {{ method_field('DELETE') }}

                        <button class="btn btn-danger">Elimina</button>
                    </form>
                </td>
                <td style="text-align:center">
                    <form action="{{route('posts.edit',$post->id)}}" method="POST">
                        {{ csrf_field() }}
                        {{ method_field('GET') }}

                        <button class="btn btn-primary">Modifica</button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
