<?php

namespace App\Exports;

use App\Models\Post;
use Illuminate\Support\Facades\DB;
//use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithHeadings;

class ExportPost implements FromQuery, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */

    use Exportable;

    public function __construct(string $start, string $stop)
    {
        $this->start = $start;
        $this->stop = $stop;
    }

    public function headings(): array
    {
        return [
            'Data',
            'Cognome',
            'Nome',
            'Azienda',
            'Motivo visita',
            'Ora [E]',
            'Ora [U]',
        ];
    }

    public function query()
    {
        //dd($this->start);
        return DB::table('posts')
        ->selectRaw("DATE_FORMAT(data,'%d/%m/%Y') as data ,cognome, nome, azienda, note, SUBSTR(ora_e,1,5) as ora_e, SUBSTR(ora_u,1,5) as ora_u")
        ->where('data', '>=', "{$this->start}")
        ->where('data', '<=', "{$this->stop}")
        ->orderByDesc('data')
        ->orderByDesc('ora_e')
        ->orderByRaw("IFNULL( `ora_u`, '23:59' ) DESC");

    }
    /*
    public function collection()
    {
        return Post::all();
    }
    */
}
