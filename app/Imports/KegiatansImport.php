<?php

namespace App\Imports;

use App\Kegiatan;
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

class KegiatansImport implements
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
            '*.unsur' => ['required'],
            '*.sub_unsur' => ['required'],
            '*.kegiatan' => ['required'],
            '*.kode' => ['required'],
            '*.satuan_hasil' => ['required'],
            '*.angka_kredit' => ['required'],
            '*.pelaksana' => ['required']
        ])->validate();


        foreach ($rows as $row) {
            $kegiatan = Kegiatan::create([
                'unsur' => $row['unsur'],
                'sub_unsur' => $row['sub_unsur'],
                'kegiatan' => $row['kegiatan'],
                'satuan_hasil' => $row['satuan_hasil'],
                'kode' => $row['kode'],
                'angka_kredit' => $row['angka_kredit'],
                'pelaksana' => $row['pelaksana']
            ]);
        }
    }

    public function rules(): array
    {
        return [
            '*.unsur' => ['required'],
            '*.sub_unsur' => ['required'],
            '*.kegiatan' => ['required'],
            '*.satuan_hasil' => ['required'],
            '*.kode' => ['required'],
            '*.angka_kredit' => ['required'],
            '*.pelaksana' => ['required']
        ];
    }

    public function chunkSize(): int
    {
        return 1000;
    }

}
