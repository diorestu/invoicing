<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->user();
    }

    private function user()
    {
        // Create Roles
        $role  = Role::create(['name' => 'Admin']);
        $role2 = Role::create(['name' => 'Management']);
        Role::create(['name' => 'Commercial']);
        Role::create(['name' => 'Finance']);
        Role::create(['name' => 'Invoice']);
        // Create User
        $user = User::create([
            'id_smartwork' => 1,
            'nama'         => 'Administrator',
            'username'     => 'masteradmin',
            'email'        => 'masteradmin@asta.co.id',
            'password'     => Hash::make('password123'),
        ]);
        $user2 = User::create([
            'id_smartwork' => 1,
            'nama'         => 'Putu Swesty Prahayani, S.E., Ak.',
            'username'     => 'swesty',
            'email'        => 'swesty@asta.co.id',
            'password'     => Hash::make('rahasia'),
        ]);
        // Assign Roles to User
        $user->assignRole([$role->id]);
        $user2->assignRole([$role2->id]);
    }
}
