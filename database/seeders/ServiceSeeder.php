<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Service;

class ServiceSeeder extends Seeder
{
    public function run(): void
    {
        $services = [
            'Bratabandha',
            'Bihe (Marriage)',
            'Bel Puja',
            'Pasni',
            'Nwaran',
            'Annaprashan',
            'Chhewar (Hair Cutting)',
            'Bartaman',
            'Shradha (Pitri Karma)',
            'Graha Pravesh',
            'Satyanarayan Puja',
            'Bishnu Puja',
            'Lakshmi Puja',
            'Kuldevata Puja',
            'Rudri / Rudri Anusthan',
            'Homa / Havana',
            'Naming Ceremony (Naamkaran)',
            'Bhai Tika Puja',
            'Brata Puja',
            'Kaag Puja',
            'Tihar Laxmi Puja',
            'Mha Puja',
            'Bhumi Puja',
            'Navagraha Puja',
            'Kaal Sarp Dosh Puja',
        ];

        foreach ($services as $service) {
            Service::create([
                'name'        => $service,
                'description' => $service . ' service in Nepal.',
                'status'      => 1,
                'created_by'  => 1, // You can change this to auth user ID
                'updated_by'  => 1,
            ]);
        }
    }
}