<?php

namespace App\Imports;

use App\Mapel;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\RegistersEventListeners;
use Maatwebsite\Excel\Concerns\SkipsErrors;
use Maatwebsite\Excel\Concerns\SkipsFailures;
use Maatwebsite\Excel\Concerns\SkipsOnError;
use Maatwebsite\Excel\Concerns\SkipsOnFailure;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithBatchInserts;
use Maatwebsite\Excel\Concerns\WithChunkReading;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithValidation;
use Maatwebsite\Excel\Events\AfterImport;
use Maatwebsite\Excel\Validators\Failure;
use Illuminate\Support\Facades\Validator;
use Throwable;
use RealRashid\SweetAlert\Facades\Alert;


use Illuminate\Foundation\Auth\User as Authenticatable;
use Spatie\Permission\Traits\HasRoles;

class MapelImport implements
    ToCollection,
    WithHeadingRow,
    SkipsOnError,
    WithValidation,
    SkipsOnFailure,
    WithChunkReading,
    ShouldQueue,
    WithEvents
{
    use Importable, SkipsErrors, SkipsFailures, RegistersEventListeners, HasRoles;
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */

    public function collection(Collection $rows)
    {
        $validator = Validator::make($rows->toArray(), [
            '*.nama' => ['required'],
            '*.jenis' => ['required'],
            '*.keterangan' => ['required'],
        ])->validate();


        foreach ($rows as $row) {
            $mapel = Mapel::create([
                'nama' => $row['nama'],
                'jenis' => $row['jenis'],
                'keterangan' => $row['keterangan']
            ]);
        }
    }

    public function rules(): array
    {
        return [
            '*.nama' => ['required'],
            '*.jenis' => ['required'],
            '*.keterangan' => ['required'],
        ];
    }

    public function chunkSize(): int
    {
        return 1000;
    }

}
