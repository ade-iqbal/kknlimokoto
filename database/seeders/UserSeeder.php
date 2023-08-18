<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = [
            [
                'name' => 'Amrizal',
                'username' => 'batubalang',
                'password' => Hash::make('batubalang'),
                'jorong_id' => 1,
            ],
            [
                'name' => 'Anggi Kurniawan',
                'username' => 'kotopanjang',
                'password' => Hash::make('kotopanjang'),
                'jorong_id' => 2,
            ],
            [
                'name' => 'AM. Gunuang Lobieh',
                'username' => 'aurgading',
                'password' => Hash::make('aurgading'),
                'jorong_id' => 3,
            ],
            [
                'name' => 'Rully Basri',
                'username' => 'tanjung ampalu',
                'password' => Hash::make('tanjung ampalu'),
                'jorong_id' => 4,
            ],
            [
                'name' => 'Harfa Diandra',
                'username' => 'pasar',
                'password' => Hash::make('pasar'),
                'jorong_id' => 5,
            ],
            [
                'name' => 'Idil Fitri',
                'username' => 'mangkudukodok',
                'password' => Hash::make('mangkudukodok'),
                'jorong_id' => 6,
            ],
            [
                'name' => 'Suhatri',
                'username' => 'batugandang',
                'password' => Hash::make('batugandang'),
                'jorong_id' => 7,
            ],
            [
                'name' => 'Syamsuriadi',
                'username' => 'solokbadak',
                'password' => Hash::make('solokbadak'),
                'jorong_id' => 8,
            ],
            [
                'name' => 'Yusril Fitri',
                'username' => 'taratakmalintang',
                'password' => Hash::make('taratakmalintang'),
                'jorong_id' => 9,
            ],
            [
                'name' => 'Fili',
                'username' => 'sawahgadang',
                'password' => Hash::make('sawahgadang'),
                'jorong_id' => 10,
            ]
        ];
        
        foreach ($users as $key => $value) {
            $user = User::create($value);
        }
    }
}
