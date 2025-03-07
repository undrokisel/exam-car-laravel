<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'car',
            'email' => 'carforme@example.com',
            'phone' => '8(999)-999-99-99',
            'drivers_license' => '9999999999',
            'password' => Hash::make('carforme'),
            'is_admin' => true,
        ]);
    }
}
