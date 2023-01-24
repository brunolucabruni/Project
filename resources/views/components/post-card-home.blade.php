<div style="overflow:scroll;width: 100%;">
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
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
