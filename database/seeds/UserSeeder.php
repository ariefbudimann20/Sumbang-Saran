<?php

use Illuminate\Database\Seeder;
use App\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::insert([
            'username' => 'admin',
            'name' => 'Admin',
            'email' => 'admin@admin.com',
            'password' => Hash::make('admin123'),
            'hak_akses' => 1,
            'foto' => 'default.jpg',
        ]);

        User::insert([
            'username' => 'penilai',
            'name' => 'Penilai',
            'email' => 'penilai@penilai.com',
            'password' => Hash::make('penilai123'),
            'hak_akses' => 2,
            'foto' => 'default.jpg',
        ]);

        User::insert([
            'username' => 'user',
            'name' => 'User',
            'email' => 'user@user.com',
            'password' => Hash::make('user123'),
            'hak_akses' => 3,
            'foto' => 'default.jpg',
        ]);

    }
}
