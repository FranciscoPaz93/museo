<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class CollectionsExport implements FromCollection, WithHeadings
{
    public function collection()
    {
        return collect([
            ['name', 'description'],
            ['Maatwebsite', 'The PHP Excel'],
            ['Laravel', 'The PHP Framework'],
        ]);
    }

    public function headings(): array
    {
        return [
            'Name',
            'Description',
        ];
    }
}
