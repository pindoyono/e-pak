<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class AdministratorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $administrator = new \App\User;
        $administrator->nip = "administrator";
        $administrator->name = "Site Administrator";
        $administrator->email = "administrator@cikal.test";
        $administrator->password = \Hash::make("cikal12345");
        $administrator->avatar = "avatars/saat-ini-tidak-ada-file.png";

        $administrator->save();
        $role = Role::create(['name' => 'super admin']);
        $administrator->assignRole('super admin');
        $this->command->info("User Admin berhasil diinsert");
    }
}
