<?php

use Illuminate\Database\Seeder;
use App\HasRole;

class HasRoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        HasRole::create([
            'role_id'       => 1,
            'model_type'    => 'App\User',
            'model_id'      => 1
        ]);

        HasRole::create([
            'role_id'       => 2,
            'model_type'    => 'App\User',
            'model_id'      => 2
        ]);

        HasRole::create([
            'role_id'       => 3,
            'model_type'    => 'App\User',
            'model_id'      => 3
        ]);
    }
}
