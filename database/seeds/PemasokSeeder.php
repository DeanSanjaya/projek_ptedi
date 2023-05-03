<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PemasokSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('pemasoks')->insert([
            [
            'name'    => 'PT. Indofood',
            'email'   => 'Indofood@gmail.com',
            'phone'   => '087123456789',
            'address' => 'Sidoarjo',
            // 'status'=>'active'
        ],
        [
            'name'    => 'CV. Sayur Segar',
            'email'   => 'sayursegar@gmail.com',
            'phone'   => '087632654876',
            'address' => 'Malang',
        ]
        ]);
    }
}
