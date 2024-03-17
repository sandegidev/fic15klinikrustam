<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        \App\Models\User::factory(10)->create();

        \App\Models\User::factory()->create([
            'name' => 'Admin user',
            'email' => 'rustam@example.com',
            'role' => 'admin',
            'password' => Hash::make('12345678'),
            'phone' => '12345678',

        ]);

        //seeder profile klinik
        \App\Models\ProfileClinic::factory()->create([
            'name' => 'Klinik Sehat',
            'address' => 'Jl Moh Hatta',
            'phone' => '12345678',
            'email' => 'dr.alghazi@kliniksehat.com',
            'doctor_name' => 'Alghazi Ibrahim Sandegi',
            'doctor_code' => '123456',

        ]);
        $this->call(DoctorSeeder::class);
    }
}
