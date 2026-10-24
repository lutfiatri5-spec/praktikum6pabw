<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Faker\Factory as Faker;

class PetugasSeeder extends Seeder
{
    public function run(): void
    {
        $faker = Faker::create('id_ID');

        // Lima akun petugas dummy dengan email unik dan password ter-hash.
        for ($i = 1; $i <= 5; $i++) {
            $email = "petugas{$i}@bpbd.test";

            User::updateOrCreate(
                ['email' => $email],
                [
                    'name' => $faker->name(),
                    'password' => Hash::make('password'),
                ]
            );
        }

        // Akun admin tetap untuk pengujian praktikum.
        User::updateOrCreate(
            ['email' => 'admin@bpbd.go.id'],
            [
                'name' => 'Admin BPBD',
                'password' => Hash::make('admin123'),
            ]
        );
    }
}
