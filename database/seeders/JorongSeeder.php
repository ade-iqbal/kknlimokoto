<?php

namespace Database\Seeders;

use App\Models\Jorong;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class JorongSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Jorong::create([
            'name' => 'Batu Balang'
        ]);
        Jorong::create([
            'name' => 'Koto Panjang'
        ]);
        Jorong::create([
            'name' => 'Aur Gading'
        ]);
        Jorong::create([
            'name' => 'Tanjung Ampalu'
        ]);
        Jorong::create([
            'name' => 'Pasar'
        ]);
        Jorong::create([
            'name' => 'Mangkudu Kodok'
        ]);
        Jorong::create([
            'name' => 'Batu Gandang'
        ]);
        Jorong::create([
            'name' => 'Solok Badak'
        ]);
        Jorong::create([
            'name' => 'Taratak Malintang'
        ]);
        Jorong::create([
            'name' => 'Sawah Gadang'
        ]);
    }
}
