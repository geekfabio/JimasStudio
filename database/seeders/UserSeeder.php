<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        User::updateOrCreate(
            ['email' => 'admin@jimas.ao'],
            [
                'name' => 'Administrador JIMAS',
                'password' => Hash::make('jimas2026'),
                'is_admin' => true,
            ]
        );
    }
}
