<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Role::create([
            'name' => 'coOrdinator'
        ]);

        Role::create([
            'name' => 'superVisor'
        ]);

        Role::create([
            'name' => 'Student'
        ]);

        Role::create([
            'name' => 'Guest'
        ]);
        
        Role::create([
            'name' => 'Chairman'
        ]);
    }
}
