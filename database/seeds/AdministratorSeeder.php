<?php

use Illuminate\Database\Seeder;

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
        $administrator->username = "administrator";
        $administrator->nip = "Site Administrator";
        $administrator->email = "administrator@cikal.test";
        $administrator->password = \Hash::make("cikal12345");
        $administrator->avatar = "avatars/saat-ini-tidak-ada-file.png";

        $administrator->save();
        $administrator->assignRole('super admin');
        $this->command->info("User Admin berhasil diinsert");
    }
}
