<?php

use App\User;
use App\Outlet;
use Illuminate\Database\Seeder;
use Database\Seeders\AdminUserSeeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Outlet::create([
            'nama' => 'HamsSkie Laundry',
            'alamat' => 'Jl Raden Wijaya no 18B, Gedangan, Sidoarjo, Jawa Timur',
            'no_telp' => '081233075477',
        ]);

        // User::create([
        //     'name' => 'Super',
        //     'last_name' => 'Administrator',
        //     'email' => 'admin@mail.com',
        //     'role' => 'admin',
        //     'id_outlet' => '1',
        //     'email_verified_at' => now(),
        //     'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
        // ]);
        User::create([
            'name' => 'HamsSkie The',
            'last_name' => 'Admin',
            'email' => 'Ilham@gmail.com',
            'role' => 'admin',
            'id_outlet' => '1',
            'email_verified_at' => now(),
            'password' => Hash::make('hamskie'), // password
        ]);
    }
}
