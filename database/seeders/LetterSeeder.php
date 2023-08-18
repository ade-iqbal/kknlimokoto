<?php

namespace Database\Seeders;

use App\Models\Letter;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LetterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Letter::create([
            'name' => 'Surat Keterangan Usaha'
        ]);
        Letter::create([
            'name' => 'Surat Keterangan Tidak Mampu'
        ]);
        Letter::create([
            'name' => 'Surat Keterangan Domisili'
        ]);
        Letter::create([
            'name' => 'Surat Keterangan Kehilangan'
        ]);
        Letter::create([
            'name' => 'Surat Keterangan Pindah'
        ]);
    }
}
