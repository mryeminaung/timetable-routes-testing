<?php

namespace App\Imports;

use App\Models\Faculty;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\ToModel;

class FacultiesImport implements ToModel, ToCollection
{
    public function collection(Collection $rows)
    {
        foreach ($rows as $row) {
            Faculty::create([
                'name' => $row['name'],
                'gender' => $row['gender'],
                'email' => $row['email'],
                'phone_number' => $row['phone_number'],
            ]);
        }
    }
    
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        return new Faculty([
            //
        ]);
    }
}
