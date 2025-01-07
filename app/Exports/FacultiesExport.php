<?php

namespace App\Exports;

use App\Models\Faculty;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class FacultiesExport implements FromCollection, WithMapping, WithHeadings
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        return Faculty::select(['id', 'name', 'gender', 'email', 'phone_number'])->get();
    }

    public function map($faculty): array
    {
        return [
            $faculty->id,
            $faculty->name,
            $faculty->gender,
            $faculty->email,
            $faculty->phone_number,
        ];
    }

    public function headings(): array
    {
        return [
            'ID',
            'Name',
            'Gender',
            'Email',
            'Phone Number',
        ];
    }
}
