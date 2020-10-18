<?php

namespace App\Imports;

use App\User;
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

class UsersImport implements
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
            "*.name" => "required|min:5|max:100",
            "*.nip" => "required|min:17|max:19|unique:users",
            "*.email" => "required|email|unique:users",
            "*.avatar" => "required",
            "*.role" => "required",
        ])->validate();

        // if ($validator->fails()) {
        //    return back()->with('toast_error', $validator->messages()->all()[0])->withInput();
        // }


        foreach ($rows as $row) {
            $user = User::create([
                'name' => $row['name'],
                'nip' => $row['nip'],
                'email' => $row['email'],
                'avatar' => $row['avatar'],
                'password' => Hash::make($row['nip'])
            ]);

            $user->assignRole($row['role']);
        }
    }

    public function rules(): array
    {
        return [
            '*.name' => ['required'],
            '*.nip' => 'unique:users,email',
            '*.email' => 'unique:users,email',
            '*.avatar' => ['required'],
            '*.password' => ['required'],
            '*.role' => ['required'],
        ];
    }

    public function chunkSize(): int
    {
        return 1000;
    }

}
