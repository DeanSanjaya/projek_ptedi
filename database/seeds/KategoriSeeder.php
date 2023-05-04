<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KategoriSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('kategoris')->insert([
            [
                'name'    => 'Makanan',
            ],
            [
                'name'    => 'Minuman',
            ],
            [
                'name'    => 'Sayur',
            ],
            [
                'name'    => 'Buah',
            ],
            [
                'name'    => 'Bumbu Dapur',
            ],
            [
                'name'    => 'Alat Masak',
            ]
        ]);
    }
}
