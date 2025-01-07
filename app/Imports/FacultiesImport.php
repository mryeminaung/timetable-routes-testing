<?php

namespace App\Imports;

use App\Models\Faculty;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class FacultiesImport implements ToCollection, WithHeadingRow
{
    public function collection(Collection $rows)
    {
        foreach ($rows as $row) {
            $faculty = Faculty::where('email', $row['email'])->first();

            if ($faculty) {
                $faculty->update([
                    'name' => $row['name'],
                    'gender' => $row['gender'],
                    'phone_number' => $row['phone_number'],
                    'password' => $row['password'],
                ]);
            } else {
                Faculty::create([
                    'name' => $row['name'],
                    'gender' => $row['gender'],
                    'email' => $row['email'],
                    'phone_number' => $row['phone_number'],
                    'password' => $row['password'],
                ]);
            }
        }
    }

    // /**
    //  * @param array $row
    //  *
    //  * @return \Illuminate\Database\Eloquent\Model|null
    //  */
    // public function model(array $row)
    // {
    //     return new Faculty([
    //         //
    //     ]);
    // }
}
