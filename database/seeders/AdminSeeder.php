<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = new \App\Models\User;
        $admin->username = "admin";
        $admin->name = "Masnoer";
        $admin->email = "masnoer@sisfo.com";
        $admin->level = json_encode(["ADMIN"]);
        $admin->password = \Hash::make("12345678");
 
        $admin->save();
 
        $this->command->info("User Admin berhasil ditambahkan");

    }
}
