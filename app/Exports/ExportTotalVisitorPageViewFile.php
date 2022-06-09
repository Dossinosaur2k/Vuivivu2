<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromArray;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Config;

class ExportTotalVisitorPageViewFile implements FromArray, ShouldAutoSize, WithHeadings
{

    /**
    * @return \Illuminate\Support\Collection
    */

    public $data;

    public function __construct(array $data)
    {
        $this->data = $data;
    }

    public function array(): array
    {
        return $this->data;
    }
    public function headings(): array
    {
        $headings = [
            'STT',
           'Time',
           'Visitors',
           'Page Views',
        ];
        return $headings;
    }
}
